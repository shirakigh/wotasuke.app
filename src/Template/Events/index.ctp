<?php
/* @var $this \Cake\View\View */
$this->extend('/Layout/twitterbootstrap/dashboard');
echo $this->element('calendar');
?>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <tbody>
        <?php foreach ($events as $event): ?>
        <tr>
          <th colspan="5"><?= h($event->title) ?><?= $this->Favorite->showFavorite($event); ?></th>
        </tr>
        <tr>
          <td><?= h($event->event_range) ?></td>
          <td><?= h($event->place) ?></td>
          <td class="hidden-xs"><?= h($event->is_allday) ?></td>
          <td class="hidden-xs"><?= h($event->is_private) ?></td>
          <td class=" actions">
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
