<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Event'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => ' Users', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('user_id'); ?></th>
            <th><?= $this->Paginator->sort('title'); ?></th>
            <th><?= $this->Paginator->sort('place'); ?></th>
            <th><?= $this->Paginator->sort('start'); ?></th>
            <th><?= $this->Paginator->sort('end'); ?></th>
            <th><?= $this->Paginator->sort('is_allday'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($events as $event): ?>
        <tr>
            <td><?= $this->Number->format($event->id) ?></td>
            <td>
                <?= $event->has('user') ? $this->Html->link($event->user->name, ['controller' => 'Users', 'action' => 'view', $event->user->id]) : '' ?>
            </td>
            <td><?= h($event->title) ?></td>
            <td><?= h($event->place) ?></td>
            <td><?= h($event->start) ?></td>
            <td><?= h($event->end) ?></td>
            <td><?= h($event->is_allday) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $event->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $event->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>