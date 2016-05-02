<?php
//$this->extend('/Layout/twitterbootstrap/dashboard');

$this->prepend('css', $this->Html->css('/plugins/fullcalendar/fullcalendar.min'));
$this->prepend('css', $this->Html->css('/plugins/fullcalendar/fullcalendar.print', ['media' => 'print']));
$this->prepend('css', $this->Html->css('wotasuke/skins/_all-skins.min'));

$this->prepend('scriptBottom', $this->Html->script('http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/jquery.qtip.min.js'));
$this->prepend('scriptBottom', $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.1/lang/ja.js'));
$this->prepend('scriptBottom', $this->Html->script('wotasuke/full_calendar'));
//$this->prepend('scriptBottom', $this->Html->script('wotasuke/ready'));
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
				<h4 class="box-title">Draggable Events</h4>
			</div>
			<div class="box-body">
				<!-- the events -->
				<div id="external-events">
					<div class="external-event bg-green">ごっちん</div>
					<div class="external-event bg-yellow">さくらさん</div>
					<div class="external-event bg-aqua">パイセン</div>
					<div class="external-event bg-red">真野ちゃん</div>
					<div class="external-event bg-light-blue">艦これ</div>
					<div class="checkbox">
						<label for="drop-remove">
							<input type="checkbox" id="drop-remove">
							remove after drop
						</label>
					</div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /. box -->
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Create Event</h3>
			</div>
			<div class="box-body">
				<div class="btn-group" style="width: 100%; margin-bottom: 10px;">
					<!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
					<ul class="fc-color-picker" id="color-chooser">
						<li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
						<li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
					</ul>
				</div><!-- /btn-group -->
				<div class="input-group">
					<input id="new-event" type="text" class="form-control" placeholder="Event Title">
					<div class="input-group-btn">
						<button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
					</div><!-- /btn-group -->
				</div><!-- /input-group -->
			</div>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->
