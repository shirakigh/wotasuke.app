<?php
$this->extend('/Layout/twitterbootstrap/dashboard');
$this->element('daterangepicker');
$this->element('colorpicker');
?>

<?= $this->Form->create($favorite); ?>
<fieldset>
    <?php
    echo $this->Favorite->inputName($this);
    echo $this->Favorite->inputNickname($this);
    echo $this->Form->label('birthday', __("birthday"));
    echo $this->Favorite->inputBirthday($this);
    echo $this->Form->label('bgcolor', __("bgcolor"));
    echo $this->Favorite->inputBgcolor($this);
    echo $this->Favorite->inputColorPicker($this, 'bg');
    echo $this->Form->label('textcolor', __("textcolor"));
    echo $this->Favorite->inputTextcolor($this);
    echo $this->Favorite->inputColorPicker($this, 'text');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
