<?php
/* @var $this \Cake\View\View */
$this->extend('/Layout/twitterbootstrap/dashboard');
echo $this->element('calendar');
?>

<div id="events-list"></div>
  <table ng-app="myApp" ng-controller="eventCtrl" class="table table-striped" cellpadding="0" cellspacing="0">
      <tbody>
        <tr ng-repeat-start="event in events">
          <th colspan="5"><a ng-href="{{event.url}}">{{event.title}}</a><span ng-bind-html="event.FavHTML"></span></th>
        </tr>
        <tr ng-repeat-end>
          <td>{{event.range}}</td>
          <td>{{event.place}}</td>
          <td class="hidden-xs">{{event.showIsAllday}}</td>
          <td class="hidden-xs">{{event.showIsPrivate}}</td>
        </tr>
      </tbody>
  </table>
