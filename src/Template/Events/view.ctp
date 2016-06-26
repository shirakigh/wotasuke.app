<?php
$this->extend('/Layout/twitterbootstrap/dashboard');
?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title">
          <?= h($event->title) ?>
          <?= $this->Html->link('', ['action' => 'edit', $event->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
          <?= $this->Form->postLink('', ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->title), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
        </h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('title') ?></td>
            <td><?= h($event->title) ?></td>
        </tr>
        <tr>
            <td><?= __('related_favorites') ?></td>
            <td>
              <?= $this->Favorite->showFavorite($event, true); ?>
            </td>
        </tr>
        <tr>
            <td><?= __('place') ?></td>
            <td><?= h($event->place) ?></td>
        </tr>
        <tr>
            <td><?= __('start') ?></td>
            <td><?= h($event->start) ?></td>
        </tr>
        <tr>
            <td><?= __('end') ?></td>
            <td><?= h($event->end) ?></td>
        </tr>
        <tr>
            <td><?= __('detail') ?></td>
            <td><?= $this->Text->autoParagraph(h($event->detail)); ?></td>
        </tr>
        <tr>
            <td><?= __('is_allday') ?></td>
            <td><?= $event->is_allday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('is_private') ?></td>
            <td><?= $event->is_private ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('created') ?></td>
            <td><?= h($event->created) ?></td>
        </tr>
        <tr>
            <td><?= __('modified') ?></td>
            <td><?= h($event->modified) ?></td>
        </tr>
    </table>
</div>
