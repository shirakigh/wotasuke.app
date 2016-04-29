<?php
namespace App\View\Helper;
use Cake\View\Helper;

class EventHelper extends Helper {
    public function inputUserName($obj, $user) {
        $string = $obj->Form->input('user_id', [
            'options' => $user,
            'label' => __('name'),
        ]);
        return $string;
    }

    public function inputTitle($obj) {
        $string = $obj->Form->input('title', [
            'label' => __('title'),
            'placeholder' => 'イベント名'
        ]);
        return $string;
    }

    public function inputPlace($obj) {
        $string = $obj->Form->input('place', [
            'label' => __('place'),
            'placeholder' => '（　´ Д ｀）＜そのうちGoogleMapと連動したいぽ'
        ]);
        return $string;
    }

    public function inputDetail($obj) {
        $string = $obj->Form->input('detail', [
            'label' => __('detail'),
        ]);
        return $string;
    }

    public function inputStart($obj) {
        $string = $obj->Form->input('start', [
            'label' => __('start'),
            'interval' => 15
        ]);
        return $string;
    }

    public function inputEnd($obj) {
        $string = $obj->Form->input('end', [
            'label' => __('end'),
            'interval' => 15
        ]);
        return $string;
    }

    public function inputIsAllday($obj) {
        $string = $obj->Form->input('is_allday', [
            'label' => __('is_allday'),
        ]);
        return $string;
    }

    public function inputIsPrivate($obj) {
        $string = $obj->Form->input('is_private', [
            'label' => __('is_private'),
        ]);
        return $string;
    }
}
