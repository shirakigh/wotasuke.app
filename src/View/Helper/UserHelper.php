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
            'type' => 'password',
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
            'type' => 'password',
            'label' => __('password_confirm'),
            'placeholder' => __('ph_password_confirm'),
            'class' => 'form-control',
            'templates' => [
                'inputContainer' => '<div class="form-group has-feedback">{{content}}<span class="glyphicon glyphicon-log-in form-control-feedback"></span></div>'
            ]
        ]);
        return $string;
    }

    public function inputPasswordNew($obj) {
        $string = $obj->Form->input('password_new', [
            'type' => 'password',
            'label' => __('password_new'),
            'placeholder' => __('ph_password_new'),
            'class' => 'form-control',
            'templates' => [
                'inputContainer' => '<div class="form-group has-feedback">{{content}}<span class="glyphicon glyphicon-lock form-control-feedback"></span></div>'
            ]
        ]);
        return $string;
    }

    public function showUserIcon($image, $large = false) {
        if ($large) { $path = IMAGE_PATH; } else { $path = THUMBNAIL_PATH; };
        if (empty($image)) {
            $string = $path.'noimage_user.png';
        } else {
            $string = $path.$image[0]['name'];
        }
        return $string;
    }

}
