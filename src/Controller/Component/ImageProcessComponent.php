<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\ORM\TableRegistry;

/**
 * ImgProcess component
 */
class ImageProcessComponent extends Component
{
    function initialize(array $config) {
        $this->controller = $this->_registry->getController();
        $this->Images = TableRegistry::get('Images');
    }

    // 画像ファイルの保存とimagesテーブルの更新を行う
    function generate($request, $type) {
        $up_img = $request->data['up_img'];
        $ext =  pathinfo($up_img['name'], PATHINFO_EXTENSION);
        $name = md5(uniqid(rand(), 1)).'.'.$ext;

        $request->data['image']['ext'] = $ext;
        $request->data['image']['size'] = $up_img['size'];
        $request->data['image']['name'] = $name;
        $request->data['image']['type'] = $type;

        $this->_saveFile($up_img['tmp_name'], $request->data['image'], THUMBNAIL_WIDTH_ICON);
    }

    //オリジナルとサムネイル作成
    protected function _saveFile($tmp_name, $image, $thumb_width) {
        $save_path = UPLOAD_IMAGE_SAVE_PATH;
        $thumb_path = THUMBNAIL_IMAGE_SAVE_PATH;

        // オリジナル画像の保存
        move_uploaded_file($tmp_name, $save_path.$image['name']);
        $original_file = $save_path.$image['name'];
        list($original_width, $original_height) = getimagesize($original_file);

        // サムネイルの保存
        $thumb_height = round( $original_height * $thumb_width / $original_width );
        if($image['ext'] === 'jpg') $original_image = imagecreatefromjpeg($original_file);
        if($image['ext'] === 'jpeg') $original_image = imagecreatefromjpeg($original_file);
        if($image['ext'] === 'png') $original_image = imagecreatefrompng($original_file);
        if($image['ext'] === 'gif') $original_image = imagecreatefromgif($original_file);
        $thumb_image = imagecreatetruecolor($thumb_width, $thumb_height);
        imagecopyresized($thumb_image, $original_image, 0, 0, 0, 0,
            $thumb_width, $thumb_height,
            $original_width, $original_height);
        if($image['ext'] === 'jpg') imagejpeg($thumb_image, $thumb_path.$image['name']);
        if($image['ext'] === 'jpeg') imagejpeg($thumb_image, $thumb_path.$image['name']);
        if($image['ext'] === 'png') imagepng($thumb_image, $thumb_path.$image['name']);
        if($image['ext'] === 'gif') imagegif($thumb_image, $thumb_path.$image['name']);
    }

    //Imagesテーブルへの追加
    public function saveImages($post, $user_id, $image = null) {
        if (empty($image)) {
            $image = $this->Images->newEntity();
            $image->user_id = $user_id;
        }
        $image = $this->Images->patchEntity($image, $post);
        return $this->Images->save($image);
    }
}
