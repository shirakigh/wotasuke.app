<?php
namespace App\View\Helper;
use Cake\View\Helper;

class FavoriteHelper extends Helper {
    public function inputName($obj) {
        $string = $obj->Form->input('name', [
            'label' => __('name'),
            'placeholder' => __('ph_favorite_name'),
        ]);
        return $string;
    }

    public function inputNickname($obj) {
        $string = $obj->Form->input('nickname', [
            'label' => __('nickname'),
            'placeholder' => __('ph_nickname'),
        ]);
        return $string;
    }

    public function inputBirthday($obj) {
        $string = $obj->Form->input('birthday', [
            'type' => 'text',
            'label' => false,
            'class' => 'form-control pull-left',
            'id' => 'birthday',
            'placeholder' => __('ph_birthday'),
            'templates' => [
                'inputContainer' => '<div class="form-group input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{{content}}</div>',
            ]
        ]);
        return $string;
    }

    public function inputEvents($obj, $event) {
        $string = $obj->Form->input('events._ids', [
            'options' => $event,
            'label' => __('related_events'),
        ]);
        return $string;
    }

    public function inputBgcolor($obj) {
        $string = $obj->Form->hidden('bgcolor', [
            'id' => 'bgcolor',
            'type' => 'text',
        ]);
        return $string;
    }

    public function inputColorPicker($obj) {
        $string = $obj->Form->input('colorpicker', [
            'label' => false,
            'class' => 'my-colorpicker',
            'placeholder' => __('ph_bgcolor'),
        ]);
        return $string;
    }

    public function showFavorite($event, $isShowMsg = False) {
        $string = '';
        if (!empty($event->favorites)):
            foreach ($event->favorites as $favorites):
                $string .= "<span class='label margin' style='background-color:".h($favorites->bgcolor)."'>";
                $string .= h($favorites->nickname);
                $string .= "</span>";
            endforeach;
        else:
            if ($isShowMsg): $string = __("no_related_Favorites"); endif;
        endif;

        return $string;
    }
}
