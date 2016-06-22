<?php
/* @var $this \Cake\View\View */
$this->extend('/Layout/twitterbootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New User'), ['action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th> </th>
            <th><?= $this->Paginator->sort(__('name')); ?></th>
            <th><?= $this->Paginator->sort(__('created')); ?></th>
            <th><?= $this->Paginator->sort(__('modified')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Html->image($this->User->showUserIcon($user['images']), ['class' => 'img-circle img-sm']); ?></td>
            <td><?= $this->Html->link(h($user->name), ['action' => 'view', $user->id]); ?></td>
            <td><?= h($user->created) ?></td>
            <td><?= h($user->modified) ?></td>
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
