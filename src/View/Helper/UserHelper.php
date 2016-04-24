<?php
namespace App\View\Helper;
use Cake\View\Helper;

class UserHelper extends Helper {
    public function inputName($obj) {
        $string = $obj->Form->input('name', [
            'label' => '名前',
            'placeholder' => '表示する名前'
        ]);
        return $string;
    }

    public function inputLoginAccount($obj) {
        $string = $obj->Form->input('login_account', [
            'label' => 'ログインID',
            'placeholder' => 'ログインする時のID'
        ]);
        return $string;
    }

    public function inputPassword($obj) {
        $string = $obj->Form->input('password', [
            'label' => 'パスワード',
            'placeholder' => '安心してください！パスワードはしらきには見えませんよ！'
        ]);
        return $string;
    }
}
