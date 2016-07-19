<?php
//select2
$this->prepend('css', $this->Html->css('/plugins/bootstrap-toggle/css/bootstrap-toggle.min'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/bootstrap-toggle/js/bootstrap-toggle.min'));
?>

<?= $this->Html->scriptStart(['block' => 'page_script']) ?>
// initialize Toggle
  $('.toggle-bootstrap').bootstrapToggle({
    size: 'small',
    width: 80,
    onstyle: 'success',
  });

$(function() {
  if ($('#is-join').prop('checked')) {
    $('#btn-collapse').click();
  }

  $('#is-join').change(function() {
    $('#btn-collapse').click();
  })
})
<?= $this->Html->scriptEnd() ?>
