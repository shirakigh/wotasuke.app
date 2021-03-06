<?php
//$this->extend('/Layout/twitterbootstrap/dashboard');

$this->prepend('css', $this->Html->css('/plugins/fullcalendar/fullcalendar.min'));
$this->prepend('css', $this->Html->css('/plugins/fullcalendar/fullcalendar.print', ['media' => 'print']));

$this->prepend('scriptBottom', $this->Html->script('http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/jquery.qtip.min.js'));
$this->prepend('scriptBottom', $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.1/lang/ja.js'));
$this->prepend('scriptBottom', $this->Html->script('wotasuke/calendar'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/fullcalendar/fullcalendar.min'));
$this->prepend('scriptBottom', $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/fastclick/fastclick.min'));
$this->prepend('scriptBottom', $this->Html->script('/plugins/slimScroll/jquery.slimscroll.min'));
$this->prepend('scriptBottom', $this->Html->script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js'));
$this->prepend('scriptBottom', $this->Html->script('https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js'));
?>

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body no-padding">
				<!-- THE CALENDAR -->
				<div id="calendar"></div>
			</div><!-- /.box-body -->
		</div><!-- /. box -->
	</div><!-- /.col -->
</div><!-- /.row -->

  <table ng-app="myApp" ng-controller="eventCtrl" class="table table-striped" cellpadding="0" cellspacing="0">
      <tbody>
        <tr ng-repeat-start="event in events">
          <th colspan="5"><span ng-bind-html="event.showIsJoin"></span><a ng-href="{{event.url}}">{{event.title}}</a><span ng-bind-html="event.FavHTML"></span></th>
        </tr>
        <tr ng-repeat-end>
          <td>{{event.range}}</td>
          <td>{{event.place}}</td>
          <td class="hidden-xs">{{event.showIsAllday}}</td>
          <td class="hidden-xs">{{event.showIsPrivate}}</td>
        </tr>
      </tbody>
  </table>
