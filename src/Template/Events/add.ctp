<?php
$this->extend('/Layout/twitterbootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($event); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Event']) ?></legend>
    <?php
    echo $this->Event->inputTitle($this);
    echo $this->Event->inputPlace($this);
    echo $this->Event->inputDetail($this);
    echo $this->Event->inputStart($this);
    echo $this->Event->inputEnd($this);
    echo $this->Event->inputIsAllday($this);
    echo $this->Event->inputIsPrivate($this);
    ?>
</fieldset>
<?= $this->Form->button(__('Add')); ?>
<?= $this->Form->end() ?>
