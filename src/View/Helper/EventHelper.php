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
            'label' => false,
            'class' => 'toggle-bootstrap',
            'data-toggle' => 'toggle',
            'data-on' =>  __('is_allday'),
            'data-off' =>  __('no_allday'),
            'templates' => [
                'checkboxContainer' => '{{content}}',
            ]
        ]);
        return $string;
    }

    public function inputIsPrivate($obj) {
        $string = $obj->Form->input('is_private', [
            'label' => false,
            'class' => 'toggle-bootstrap',
            'data-toggle' => 'toggle',
            'data-on' =>  __('is_private'),
            'data-off' =>  __('no_private'),
            'templates' => [
                'checkboxContainer' => '{{content}}',
            ]
        ]);
        return $string;
    }

    public function inputUrl($obj) {
        $string = $obj->Form->input('url', [
            'label' => __('url'),
        ]);
        return $string;
    }

    public function inputFeeling($obj) {
        $string = $obj->Form->input('feeling', [
            'label' => __('feeling'),
        ]);
        return $string;
    }

    public function inputIsJoin($obj) {
        $string = $obj->Form->input('is_join', [
            'label' => false,
            'class' => 'toggle-bootstrap',
            'data-toggle' => 'toggle',
            'data-on' =>  __('is_join'),
            'data-off' =>  __('no_join'),
            'templates' => [
                'checkboxContainer' => '{{content}}',
            ]
        ]);
        return $string;
    }

    public function inputTicket($obj) {
        $string = $obj->Form->input('ticket', [
            'label' => __('ticket'),
            'placeholder' => __('ph_ticket'),
        ]);
        return $string;
    }

    public function inputTicketInfo($obj) {
        $string = $obj->Form->input('ticket_info', [
            'label' => __('ticket_info'),
            'placeholder' => __('ph_ticket_info'),
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

    public function showIsAllday($event) {
        return $event->is_allday ? __('is_allday') : '';
    }

    public function showIsPrivate($event) {
        return $event->is_private ? __('is_private') : '';
    }

    public function showIsJoin($event) {
        return $event->is_join ? '<span class="badge bg-red margin-r-5"><i class="fa fa-star-o"></i></span>' : '';
    }

}
