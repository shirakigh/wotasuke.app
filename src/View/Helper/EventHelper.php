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
            'placeholder' => __('ph_title'),
        ]);
        return $string;
    }

    public function inputPlace($obj) {
        $string = $obj->Form->input('place', [
            'label' => __('place'),
            'placeholder' => __('ph_place'),
        ]);
        return $string;
    }

    public function inputDetail($obj) {
        $string = $obj->Form->input('detail', [
            'label' => __('detail'),
        ]);
        return $string;
    }

    public function inputEventRange($obj) {
        $string = $obj->Form->input('event_range', [
            'label' => false,
            'class' => 'form-control pull-left',
            'id' => 'eventrangetime',
            'placeholder' => __('ph_range'),
            'templates' => [
                'inputContainer' => '<div class="form-group input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{{content}}</div>',
            ]
        ]);
        return $string;
    }

    public function inputStart($obj) {
        $string = $obj->Form->hidden('start', [
            'type' => 'text'
        ]);
        return $string;
    }

    public function inputEnd($obj) {
        $string = $obj->Form->hidden('end', [
            'type' => 'text'
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
