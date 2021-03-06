<?php
//daterange picker
//$this->prepend('css', $this->Html->css('/plugins/daterangepicker/daterangepicker-bs3'));
$this->prepend('css', $this->Html->css('//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css'));

//bootstrap color picker
//$this->prepend('scriptBottom', $this->Html->script('/plugins/daterangepicker/daterangepicker'));
$this->prepend('scriptBottom', $this->Html->script('//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js'));
$this->prepend('scriptBottom', $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/locale/ja.js'));
$this->prepend('scriptBottom', $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js'));
?>

<?= $this->Html->scriptStart(['block' => 'page_script']) ?>
  //誕生日用 SinglePicker
  $('#birthday').daterangepicker({
    "autoUpdateInput": false,
    "showDropdowns": true,
    "singleDatePicker": true,
    "minDate": "1970/01/01",
    "maxDate": new Date(),
    "locale": {
        "format": "YYYY/MM/DD",
        "applyLabel": "決定",
        "cancelLabel": "キャンセル",
        "firstDay": 1,
    },
  });
  $('input[id="birthday"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('YYYY/MM/DD'));
  });

  // イベント日時用 SinglePicker
  $('#eventStart').daterangepicker({
    "autoUpdateInput": false,
    "showDropdowns": true,
    "singleDatePicker": true,
    "minDate": "1970/01/01",
    "timePicker": true,
    "timePickerIncrement": 15,
    "timePicker24Hour": true,
    "locale": {
        "format": "YYYY/MM/DD HH:mm",
        "applyLabel": "決定",
        "cancelLabel": "キャンセル",
        "firstDay": 1,
    },
  });
  $('input[id="eventStart"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('YYYY/MM/DD HH:mm'));
  });

  //イベント日時用 DateRangePicker
  $('#eventrangetime').daterangepicker({
    autoUpdateInput: false,
    "showDropdowns": true,
    "timePicker": true,
    "timePickerIncrement": 15,
    "timePicker24Hour": true,
    "locale": {
        "format": "YYYY/MM/DD HH:mm",
        "separator": " ～ ",
        "applyLabel": "決定",
        "cancelLabel": "キャンセル",
        "fromLabel": "開始日時",
        "toLabel": "終了日時",
        "customRangeLabel": "Custom",
        "firstDay": 1,
    },
  });
  $('input[id="eventrangetime"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('YYYY/MM/DD HH:mm') + ' ～ ' + picker.endDate.format('YYYY/MM/DD HH:mm'));
    $('input[name="start"]').val(picker.startDate.format('YYYY/MM/DD HH:mm'));
    $('input[name="end"]').val(picker.endDate.format('YYYY/MM/DD HH:mm'));
  });
<?= $this->Html->scriptEnd() ?>
