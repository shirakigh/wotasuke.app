<?php
namespace App\View\Helper;
use Cake\View\Helper;

class ImageHelper extends Helper {

    public function inputImage($obj) {
        $string = $obj->Form->file('up_img');
        return $string;
    }

    public function inputId($obj) {
        $string = $obj->Form->hidden('images.0.id', [
            'type' => 'text'
        ]);
        return $string;
    }

    public function inputUserId($obj) {
        $string = $obj->Form->hidden('images.0.user_id', [
            'type' => 'text'
        ]);
        return $string;
    }

    public function inputType($obj) {
        $string = $obj->Form->hidden('images.0.type', [
            'type' => 'text'
        ]);
        return $string;
    }

    public function inputName($obj) {
        $string = $obj->Form->hidden('images.0.name', [
            'type' => 'text'
        ]);
        return $string;
    }

    public function inputExt($obj) {
        $string = $obj->Form->hidden('images.0.ext', [
            'type' => 'text'
        ]);
        return $string;
    }

    public function inputSize($obj) {
        $string = $obj->Form->hidden('images.0.size', [
            'type' => 'text'
        ]);
        return $string;
    }

    public function inputAlt($obj) {
        $string = $obj->Form->hidden('images.0.alt', [
            'type' => 'text'
        ]);
        return $string;
    }

    public function inputComment($obj) {
        $string = $obj->Form->hidden('images.0.comment', [
            'type' => 'text'
        ]);
        return $string;
    }
}
