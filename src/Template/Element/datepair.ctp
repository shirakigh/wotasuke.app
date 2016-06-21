<?php
//bootstrap color picker

$this->prepend('css', $this->Html->css('/plugins/datepair/bootstrap-datepicker.min'));
$this->prepend('css', $this->Html->css('/plugins/datepair/jquery.timepicker'));
$this->prepend('css', $this->Html->css('/plugins/datepair/datepicker-zindex'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/datepair/datepair.min'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/datepair/bootstrap-datepicker.ja.min'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/datepair/bootstrap-datepicker.min'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/datepair/jquery.timepicker.min'));
?>

<?= $this->Html->scriptStart(['block' => 'page_script']) ?>
// initialize input widgets first
$('#eventRange .time').timepicker({
  'showDuration': true,
  'timeFormat': 'H:i',
  'show2400': true
});

$('#eventRange .date').datepicker({
  'format': 'yyyy-mm-dd',
  'autoclose': true,
  'weekStart': 1,
  'language': 'ja'
});

// initialize datepair
var eventRangeEl = document.getElementById('eventRange');
var datepair = new Datepair(eventRangeEl);

// Set Start
$('#eventRange .time.start').on('selectTime', setDate);
$('#eventRange .date.start').on('change.dp', setDate);

// Set End
$('#eventRange .time.end').on('selectTime', setDate);
$('#eventRange .date.end').on('change.dp', setDate);

function setDate() {
  var start = $('#eventRange .date.start').val() + ' ' + $('#eventRange .time.start').val();
  $('input[name="start"]').val(start);
  var end = $('#eventRange .date.end').val() + ' ' + $('#eventRange .time.end').val();
  $('input[name="end"]').val(end);
}

<?= $this->Html->scriptEnd() ?>
