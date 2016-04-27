<?php
namespace App\View\Helper;
use Cake\View\Helper;

class UserHelper extends Helper {
    public function inputName($obj) {
        $string = $obj->Form->input('name', [
            'label' => __('name'),
            'placeholder' => '表示する名前'
        ]);
        return $string;
    }

    public function inputLoginAccount($obj) {
        $string = $obj->Form->input('login_account', [
            'label' => __('login_account'),
            'placeholder' => 'ログインする時のID'
        ]);
        return $string;
    }

    public function inputPassword($obj) {
        $string = $obj->Form->input('password', [
            'label' => __('password'),
            'placeholder' => '（　´ Д ｀）＜安心してください！暗号化してますよ！'
        ]);
        return $string;
    }
}
