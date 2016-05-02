<?php
/* @var $this \Cake\View\View */
$this->extend('/Layout/twitterbootstrap/dashboard');
?>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort(__('place')); ?></th>
            <th><?= $this->Paginator->sort(__('title')); ?></th>
            <th><?= $this->Paginator->sort(__('start')); ?></th>
            <th><?= $this->Paginator->sort(__('end')); ?></th>
            <th><?= $this->Paginator->sort(__('is_allday')); ?></th>
            <th><?= $this->Paginator->sort(__('is_private')); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($events as $event): ?>
        <tr>
            <td><?= h($event->title) ?></td>
            <td><?= h($event->place) ?></td>
            <td><?= h($event->start) ?></td>
            <td><?= h($event->end) ?></td>
            <td><?= h($event->is_allday) ?></td>
            <td><?= h($event->is_private) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $event->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $event->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->title), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
