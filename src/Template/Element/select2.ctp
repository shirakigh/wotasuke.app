<?php
//select2
$this->prepend('css', $this->Html->css('/plugins/select2/select2.min'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/select2/select2.full.min'));
?>

<?= $this->Html->scriptStart(['block' => 'page_script']) ?>
$(function(){
  //Initialize Select2 Elements
  $(".select2").select2();
});
<?= $this->Html->scriptEnd() ?>
