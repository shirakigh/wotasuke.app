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

    public function inputStartDate($obj) {
        $string = $obj->Form->input('start_date', [
            'type' => 'text',
            'label' => false,
            'class' => 'date start',
            'noclass' => true,
            'templates' => [
                'inputContainer' => '{{content}}',
            ]
        ]);
        return $string;
    }

    public function inputStartTime($obj) {
        $string = $obj->Form->input('start_time', [
            'type' => 'text',
            'label' => false,
            'class' => 'time start',
            'noclass' => true,
            'templates' => [
                'inputContainer' => '{{content}}',
            ]
        ]);
        return $string;
    }

    public function inputEndDate($obj) {
        $string = $obj->Form->input('end_date', [
            'type' => 'text',
            'label' => false,
            'class' => 'date end',
            'noclass' => true,
            'templates' => [
                'inputContainer' => '{{content}}',
            ]
        ]);
        return $string;
    }

    public function inputEndTime($obj) {
        $string = $obj->Form->input('end_time', [
            'type' => 'text',
            'label' => false,
            'class' => 'time end',
            'noclass' => true,
            'templates' => [
                'inputContainer' => '{{content}}',
            ]
        ]);
        return $string;
    }

    public function inputStart($obj) {
        $string = $obj->Form->hidden('start', [
            'type' => 'text',
        ]);
        return $string;
    }

    public function inputEnd($obj) {
        $string = $obj->Form->hidden('end', [
            'type' => 'text',
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

    public function inputFavorites($obj, $favorite) {
        $string = $obj->Form->input('favorites._ids', [
            'options' => $favorite,
            'label' => __('related_favorites'),
            'class' => 'form-control select2',
            'multiple' => 'multiple',
            'templates' => [
                'inputContainer' => '<div class="form-group">{{content}}</div>',
            ]
        ]);
        return $string;
    }
}
