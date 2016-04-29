<?php
namespace App\View\Helper;
use Cake\View\Helper;

class FavoriteHelper extends Helper {
    public function inputName($obj) {
        $string = $obj->Form->input('name', [
            'label' => __('name'),
            'placeholder' => '推しの名前'
        ]);
        return $string;
    }

    public function inputNickname($obj) {
        $string = $obj->Form->input('nickname', [
            'label' => __('nickname'),
            'placeholder' => 'ニックネーム'
        ]);
        return $string;
    }

    public function inputBirthday($obj) {
        $string = $obj->Form->input('birthday', [
            'label' => __('birthday'),
            'minYear' => '1970',
            'orderYear' => 'asc',
        ]);
        return $string;
    }

    //$string = $obj->Form->input('events._ids', ['options' => $events]);
    public function inputEvents($obj, $event) {
        $string = $obj->Form->input('events._ids', [
            'options' => $event,
            'label' => __('related_events'),
        ]);
        return $string;
    }
}
