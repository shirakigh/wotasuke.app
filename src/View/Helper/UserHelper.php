<?php
namespace App\View\Helper;
use Cake\View\Helper;

class UserHelper extends Helper {
    public function inputName($obj) {
        $string = $obj->Form->input('name', [
            'label' => __('name'),
            'placeholder' => '表示名'
        ]);
        return $string;
    }

    public function inputLoginAccount($obj) {
        $string = $obj->Form->input('login_account', [
            'label' => __('login_account'),
            'placeholder' => 'ログインID',
            'class' => 'form-control',
            'templates' => [
                'inputContainer' => '{{content}}<span class="glyphicon glyphicon-user form-control-feedback"></span>'
            ]
        ]);
        return $string;
    }

    public function inputPassword($obj) {
        $string = $obj->Form->input('password', [
            'label' => __('password'),
            'placeholder' => '安心してください！暗号化してますよ！',
            'class' => 'form-control',
            'templates' => [
                'inputContainer' => '{{content}}<span class="glyphicon glyphicon-lock form-control-feedback"></span>'
            ]
        ]);
        return $string;
    }
}
