<?php
$this->extend('/Layout/twitterbootstrap/dashboard');
?>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort(__('name')); ?></th>
            <th><?= $this->Paginator->sort(__('nickname')); ?></th>
            <th><?= $this->Paginator->sort(__('birthday')); ?></th>
            <th class="hidden-xs"><?= $this->Paginator->sort(__('created')); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($favorites as $favorite): ?>
        <tr>
            <td><?= h($favorite->name) ?></td>
            <td><?= $this->Favorite->showNickname($favorite); ?></td>
            <td><?= h($favorite->birthday) ?></td>
            <td class="hidden-xs"><?= h($favorite->created) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $favorite->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $favorite->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $favorite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->name), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
