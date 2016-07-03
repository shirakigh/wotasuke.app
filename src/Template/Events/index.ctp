<?php
/* @var $this \Cake\View\View */
echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js', array('inline' => false));
$this->extend('/Layout/twitterbootstrap/dashboard');
echo $this->element('calendar');
?>

<div id="events-list"></div>
  <table ng-app="myApp" ng-controller="eventCtrl" class="table table-striped" cellpadding="0" cellspacing="0">
      <tbody>
        <tr ng-repeat-start="event in events">
          <th colspan="5">{{event.title}}<span ng-bind-html="event.FavHTML"></span></th>
        </tr>
        <tr ng-repeat-end>
          <td>{{event.range}}</td>
          <td>{{event.place}}</td>
          <td class="hidden-xs">{{event.showIsAllday}}</td>
          <td class="hidden-xs">{{event.showIsPrivate}}</td>
        </tr>
      </tbody>
  </table>
