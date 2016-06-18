<?php
//ユーザ定義定数
//呼び出し方:    echo FOOBAR;
define("APP_NAME","WOTASUKE");

// FILE PATH
define("UPLOAD_IMAGE_SAVE_PATH","img/upload/");
define("THUMBNAIL_IMAGE_SAVE_PATH","img/thumbnail/");
define("IMAGE_PATH","upload/");
define("THUMBNAIL_PATH","thumbnail/");

//FILE WIDTH
define("THUMBNAIL_WIDTH_ICON",150);
define("THUMBNAIL_WIDTH_EVENT",300);

//IMAGE type
define("IMAGE_USER_ICON","USER_ICON");
define("IMAGE_FAVORITE_ICON","FAVORITE_ICON");
define("IMAGE_EVENT","EVENT");

//連想配列
//呼び出し方:    $hoge = Configure::read("hoge");
$config['image_type'] = array(
    "USER_ICON" => "USER_ICON",
    "FAVORITE_ICON" => "FAVORITE_ICON",
    "EVENT" => "EVENT",
);
