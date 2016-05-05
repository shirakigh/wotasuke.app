<?php
//Bootstrap Color Picker
$this->prepend('css', $this->Html->css('/plugins/colorpicker/bootstrap-colorpicker.min'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/colorpicker/bootstrap-colorpicker.min'));
?>

<?= $this->Html->scriptStart(['block' => 'page_script']) ?>
$(function(){
  //color picker with addon
  $(".my-colorpicker2").colorpicker();
});
<?= $this->Html->scriptEnd() ?>
