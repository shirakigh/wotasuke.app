<?php
//$this->extend('/Layout/twitterbootstrap/dashboard');

$this->prepend('css', $this->Html->css('/plugins/fullcalendar/fullcalendar.min'));
$this->prepend('css', $this->Html->css('/plugins/fullcalendar/fullcalendar.print', ['media' => 'print']));
$this->prepend('css', $this->Html->css('wotasuke/skins/_all-skins.min'));

$this->prepend('scriptBottom', $this->Html->script('http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/jquery.qtip.min.js'));
$this->prepend('scriptBottom', $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.1/lang/ja.js'));
$this->prepend('scriptBottom', $this->Html->script('wotasuke/calendar'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/fullcalendar/fullcalendar.min'));
$this->prepend('scriptBottom', $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/fastclick/fastclick.min'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/slimScroll/jquery.slimscroll.min'));
$this->prepend('scriptBottom', $this->Html->script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js'));
?>

<div class="row">
	<div class="col-md-9">
		<div class="box box-primary">
			<div class="box-body no-padding">
				<!-- THE CALENDAR -->
				<div id="calendar"></div>
			</div><!-- /.box-body -->
		</div><!-- /. box -->
	</div><!-- /.col -->
	<div class="col-md-3">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h4 class="box-title"><?= __('Draggable Events') ?></h4>
			</div>
			<div class="box-body">
				<!-- the events -->
				<div id="external-events">
					<div class="external-event bg-green">ごっちん</div>
					<div class="external-event bg-yellow">さくらさん</div>
					<div class="external-event bg-aqua">パイセン</div>
					<div class="external-event bg-red">真野ちゃん</div>
					<div class="external-event bg-light-blue">艦これ</div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /. box -->
	</div><!-- /.col -->
</div><!-- /.row -->
