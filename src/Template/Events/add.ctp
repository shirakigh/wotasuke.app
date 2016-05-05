<?php
$this->extend('/Layout/twitterbootstrap/dashboard');
$this->element('daterangepicker');
?>
<?= $this->Form->create($event); ?>
<fieldset>
    <?php
    echo $this->Event->inputTitle($this);
    echo $this->Form->label('range', __("range"));
    echo $this->Event->inputEventRange($this);
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
