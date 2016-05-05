<?php
namespace App\View\Helper;
use Cake\View\Helper;

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
        $string = $obj->Form->input('bgcolor', [
            'label' => false,
            'placeholder' => __('ph_bgcolor'),
            'class' => 'form-control',
            'templates' => [
                'inputContainer' => '<div class="form-group input-group my-colorpicker2"><div class="input-group-addon"><i></i></div>{{content}}</div>',
            ]
        ]);
        return $string;
    }
}
