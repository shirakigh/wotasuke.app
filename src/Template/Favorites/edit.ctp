<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $favorite->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Favorites'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $favorite->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Favorites'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($favorite); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Favorite']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('nickname');
    echo $this->Form->input('birthday');
    echo $this->Form->input('events._ids', ['options' => $events]);
    echo $this->Form->input('users._ids', ['options' => $users]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
