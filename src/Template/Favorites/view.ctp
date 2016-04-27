<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Favorite'), ['action' => 'edit', $favorite->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Favorite'), ['action' => 'delete', $favorite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->id)]) ?> </li>
<li><?= $this->Html->link(__('List Favorites'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Favorite'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Favorite'), ['action' => 'edit', $favorite->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Favorite'), ['action' => 'delete', $favorite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->id)]) ?> </li>
<li><?= $this->Html->link(__('List Favorites'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Favorite'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
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
            <td><?= __('Name') ?></td>
            <td><?= h($favorite->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Nickname') ?></td>
            <td><?= h($favorite->nickname) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($favorite->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Birthday') ?></td>
            <td><?= h($favorite->birthday) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($favorite->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($favorite->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Events') ?></h3>
    </div>
    <?php if (!empty($favorite->events)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Place') ?></th>
                <th><?= __('Detail') ?></th>
                <th><?= __('Start') ?></th>
                <th><?= __('End') ?></th>
                <th><?= __('Is Allday') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Is Private') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($favorite->events as $events): ?>
                <tr>
                    <td><?= h($events->id) ?></td>
                    <td><?= h($events->user_id) ?></td>
                    <td><?= h($events->title) ?></td>
                    <td><?= h($events->place) ?></td>
                    <td><?= h($events->detail) ?></td>
                    <td><?= h($events->start) ?></td>
                    <td><?= h($events->end) ?></td>
                    <td><?= h($events->is_allday) ?></td>
                    <td><?= h($events->created) ?></td>
                    <td><?= h($events->modified) ?></td>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Users') ?></h3>
    </div>
    <?php if (!empty($favorite->users)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Login Account') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($favorite->users as $users): ?>
                <tr>
                    <td><?= h($users->id) ?></td>
                    <td><?= h($users->name) ?></td>
                    <td><?= h($users->login_account) ?></td>
                    <td><?= h($users->password) ?></td>
                    <td><?= h($users->created) ?></td>
                    <td><?= h($users->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Users', 'action' => 'view', $users->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Users', 'action' => 'edit', $users->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Users</p>
    <?php endif; ?>
</div>
