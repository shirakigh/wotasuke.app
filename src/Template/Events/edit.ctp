<?php
$this->extend('/Layout/twitterbootstrap/dashboard');
$this->element('datepair');
$this->element('select2');
?>
<?= $this->Form->create($event); ?>
<fieldset>
    <?php
    echo $this->Event->inputTitle($this);
    echo $this->Event->inputIsAllday($this);
    echo $this->Event->inputIsPrivate($this);
    ?>
    <div class="margin-bottom">
      <?= $this->Form->label('range', __("range")); ?>
      <div id="eventRange">
        <?= $this->Event->inputStartDate($this); ?>
        <?= $this->Event->inputStartTime($this); ?> ～
        <?= $this->Event->inputEndDate($this); ?>
        <?= $this->Event->inputEndTime($this); ?>
      </div>
    </div>
    <?php
    echo $this->Event->inputStart($this);
    echo $this->Event->inputEnd($this);
    echo $this->Event->inputPlace($this);
    echo $this->Event->inputFavorites($this, $favorites);
    echo $this->Event->inputDetail($this);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
