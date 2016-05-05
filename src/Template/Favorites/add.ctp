<?php
$this->extend('/Layout/twitterbootstrap/dashboard');
//Bootstrap Color Picker
$this->prepend('css', $this->Html->css('/plugins/colorpicker/bootstrap-colorpicker.min'));
//bootstrap color picker
$this->prepend('scriptBottom', $this->Html->script('/plugins/colorpicker/bootstrap-colorpicker.min'));
?>

<?= $this->Form->create($favorite); ?>
<fieldset>
    <?php
    echo $this->Favorite->inputName($this);
    echo $this->Favorite->inputNickname($this);
    echo $this->Favorite->inputBirthday($this);
    echo $this->Form->label('bgcolor', __("bgcolor"));
    echo $this->Favorite->inputBgcolor($this);
    echo $this->Favorite->inputEvents($this, $events);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

<?= $this->Html->scriptStart(['block' => 'page_script']) ?>
$(function(){
  //color picker with addon
  $(".my-colorpicker2").colorpicker();
});
<?= $this->Html->scriptEnd() ?>
