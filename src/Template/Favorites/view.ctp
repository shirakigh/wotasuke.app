<?php
$this->extend('/Layout/twitterbootstrap/dashboard');
?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($favorite->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('name') ?></td>
            <td><?= h($favorite->name) ?></td>
        </tr>
        <tr>
            <td><?= __('nickname') ?></td>
            <td><?= $this->Favorite->showNickname($favorite); ?></td>
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
                <th><?= __('range') ?></th>
                <th><?= __('title') ?></th>
                <th><?= __('place') ?></th>
                <th class="hidden-xs"><?= __('is_allday') ?></th>
                <th class="hidden-xs"><?= __('is_private') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($favorite->events as $events): ?>
                <tr>
                    <td><?= h($events->eventRange) ?></td>
                    <td><?= $this->Event->showIsJoin($events) ?><?= $this->Html->link(h($events->title), ['controller' => 'Events', 'action' => 'view', $events->id]) ?></td>
                    <td><?= h($events->place) ?></td>
                    <td class="hidden-xs"><?= $events->is_allday ? __('is_allday') : ''; ?></td>
                    <td class="hidden-xs"><?= $events->is_private ? __('is_private') : ''; ?></td>
                    <td class="actions">
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
