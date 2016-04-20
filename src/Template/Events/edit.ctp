<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $event->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
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
        ['action' => 'delete', $event->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($event); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Event']) ?></legend>
    <?php
    echo $this->Form->input('user_id', ['options' => $users]);
    echo $this->Form->input('title');
    echo $this->Form->input('place');
    echo $this->Form->input('detail');
    echo $this->Form->input('start');
    echo $this->Form->input('end');
    echo $this->Form->input('is_allday');
    echo $this->Form->input('is_private');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
