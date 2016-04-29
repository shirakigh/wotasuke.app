<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Favorite'), ['action' => 'edit', $favorite->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Favorite'), ['action' => 'delete', $favorite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->name)]) ?> </li>
<li><?= $this->Html->link(__('List Favorites'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Favorite'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Favorite'), ['action' => 'edit', $favorite->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Favorite'), ['action' => 'delete', $favorite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->name)]) ?> </li>
<li><?= $this->Html->link(__('List Favorites'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Favorite'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($favorite->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('user') ?></td>
            <td><?= $favorite->has('user') ? $this->Html->link($favorite->user->name, ['controller' => 'Users', 'action' => 'view', $favorite->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('name') ?></td>
            <td><?= h($favorite->name) ?></td>
        </tr>
        <tr>
            <td><?= __('nickname') ?></td>
            <td><?= h($favorite->nickname) ?></td>
        </tr>
        <tr>
            <td><?= __('birthday') ?></td>
            <td><?= h($favorite->birthday) ?></td>
        </tr>
        <tr>
            <td><?= __('created') ?></td>
            <td><?= h($favorite->created) ?></td>
        </tr>
        <tr>
            <td><?= __('modified') ?></td>
            <td><?= h($favorite->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('related_events') ?></h3>
    </div>
    <?php if (!empty($favorite->events)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('title') ?></th>
                <th><?= __('place') ?></th>
                <th><?= __('start') ?></th>
                <th><?= __('end') ?></th>
                <th><?= __('is_allday') ?></th>
                <th><?= __('is_private') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($favorite->events as $events): ?>
                <tr>
                    <td><?= h($events->title) ?></td>
                    <td><?= h($events->place) ?></td>
                    <td><?= h($events->start) ?></td>
                    <td><?= h($events->end) ?></td>
                    <td><?= h($events->is_allday) ?></td>
                    <td><?= h($events->is_private) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Events', 'action' => 'view', $events->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Events', 'action' => 'edit', $events->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Events</p>
    <?php endif; ?>
</div>
