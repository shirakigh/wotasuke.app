<?php
namespace App\View\Helper;
use Cake\View\Helper;

class UserHelper extends Helper {
    public function inputName($obj) {
        $string = $obj->Form->input('name', [
            'label' => __('name'),
            'placeholder' => __('ph_name'),
            'templates' => [
                'inputContainer' => '<div class="form-group has-feedback">{{content}}<span class="glyphicon glyphicon-star form-control-feedback"></span></div>'
            ]
        ]);
        return $string;
    }

    public function inputLoginAccount($obj) {
        $string = $obj->Form->input('login_account', [
            'label' => __('login_account'),
            'placeholder' => __('ph_login_account'),
            'class' => 'form-control',
            'templates' => [
                'inputContainer' => '<div class="form-group has-feedback">{{content}}<span class="glyphicon glyphicon-user form-control-feedback"></span></div>'
            ]
        ]);
        return $string;
    }

    public function inputPassword($obj) {
        $string = $obj->Form->input('password', [
            'label' => __('password'),
            'placeholder' => __('ph_password'),
            'class' => 'form-control',
            'templates' => [
                'inputContainer' => '<div class="form-group has-feedback">{{content}}<span class="glyphicon glyphicon-lock form-control-feedback"></span></div>'
            ]
        ]);
        return $string;
    }

    public function inputPasswordConfirm($obj) {
        $string = $obj->Form->input('password_confirm', [
            'label' => __('password_confirm'),
            'placeholder' => __('ph_password_confirm'),
            'class' => 'form-control',
            'templates' => [
                'inputContainer' => '<div class="form-group has-feedback">{{content}}<span class="glyphicon glyphicon-log-in form-control-feedback"></span></div>'
            ]
        ]);
        return $string;
    }
}
