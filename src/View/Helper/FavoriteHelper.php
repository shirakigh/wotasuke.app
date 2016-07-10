<?php
namespace App\View\Helper;
use Cake\View\Helper;
use Cake\Routing\Router;

class FavoriteHelper extends Helper {
    public function inputName($obj) {
        $string = $obj->Form->input('name', [
            'label' => __('name'),
            'placeholder' => __('ph_favorite_name'),
        ]);
        return $string;
    }

    public function inputNickname($obj) {
        $string = $obj->Form->input('nickname', [
            'label' => __('nickname'),
            'placeholder' => __('ph_nickname'),
        ]);
        return $string;
    }

    public function inputBirthday($obj) {
        $string = $obj->Form->input('birthday', [
            'type' => 'text',
            'label' => false,
            'class' => 'form-control pull-left',
            'id' => 'birthday',
            'placeholder' => __('ph_birthday'),
            'templates' => [
                'inputContainer' => '<div class="form-group input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{{content}}</div>',
            ]
        ]);
        return $string;
    }

    public function inputEvents($obj, $event) {
        $string = $obj->Form->input('events._ids', [
            'options' => $event,
            'label' => __('related_events'),
        ]);
        return $string;
    }

    public function inputBgcolor($obj) {
        $string = $obj->Form->hidden('bgcolor', [
            'id' => 'bgcolor',
            'type' => 'text',
        ]);
        return $string;
    }

    public function inputColorPicker($obj, $name) {
        $string = $obj->Form->input('colorpicker', [
            'label' => false,
            'class' => 'my-colorpicker '.$name,
        ]);
        return $string;
    }

    public function inputTextcolor($obj) {
        $string = $obj->Form->hidden('textcolor', [
            'id' => 'textcolor',
            'type' => 'text',
        ]);
        return $string;
    }

    public function showFavorite($event, $isShowMsg = False) {
        $string = '';
        if (!empty($event->favorites)):
            foreach ($event->favorites as $favorites):
                
                if ($this->request->session()->read('Auth.User.id') == $event->user_id) {
                    $action = 'view';
                } else {
                    $action = 'display';
                }
                $string .= "<a href=".Router::url(['controller' => 'Favorites', 'action' => $action, $favorites->id]).">";
                $string .= "<span class='label margin' style='background-color:".h($favorites->bgcolor)."; color:".h($favorites->textcolor)."'>";
                $string .= h($favorites->nickname);
                $string .= "</span></a>";
            endforeach;
        else:
            if ($isShowMsg): $string = __("no_related_Favorites"); endif;
        endif;

        return $string;
    }

    public function showNickname($favorite) {
        $string = '';
        if (!empty($favorite)):
            $string .= "<span class='label margin' style='background-color:".h($favorite->bgcolor)."; color:".h($favorite->textcolor)."'>";
            $string .= h($favorite->nickname);
            $string .= "</span>";
        endif;

        return $string;
    }

}
