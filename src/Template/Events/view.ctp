<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
<li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
<li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($event->title) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $event->has('user') ? $this->Html->link($event->user->name, ['controller' => 'Users', 'action' => 'view', $event->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Title') ?></td>
            <td><?= h($event->title) ?></td>
        </tr>
        <tr>
            <td><?= __('Place') ?></td>
            <td><?= h($event->place) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Start') ?></td>
            <td><?= h($event->start) ?></td>
        </tr>
        <tr>
            <td><?= __('End') ?></td>
            <td><?= h($event->end) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($event->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($event->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Is Allday') ?></td>
            <td><?= $event->is_allday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Is Private') ?></td>
            <td><?= $event->is_private ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Detail') ?></td>
            <td><?= $this->Text->autoParagraph(h($event->detail)); ?></td>
        </tr>
    </table>
</div>

