<?php
$this->extend('/Layout/twitterbootstrap/dashboard');
$this->element('datepair');
$this->element('select2');
$this->element('toggle');
?>
<?= $this->Form->create($event); ?>
<fieldset>
  <?= $this->Event->inputTitle($this); ?>
  <div class="input-group margin-bottom">
    <span class="margin-r-5">
    </span>
      <?= $this->Event->inputIsPrivate($this); ?>
  </div>

  <div class="input-group margin-bottom">
    <div class="direct-chat-msg">   <!-- margin-bottom:10pxのため -->
      <span class="margin-r-5">
        <?= $this->Form->label('range', __("range")); ?>
      </span>
        <?= $this->Event->inputIsAllday($this); ?>
    </div>
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
    echo $this->Event->inputUrl($this);
    echo $this->Event->inputDetail($this);
  ?>

  <?= $this->Event->inputTicketInfo($this); ?>
  <div class="box box-default collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title"><?= $this->Event->inputIsJoin($this); ?></h3>
      <div class="box-tools pull-right">
        <button id="btn-collapse" class="btn btn-box-tool" data-widget="collapse" style="display: none;"><i class="fa fa-minus"></i></button>
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">
      <?= $this->Event->inputTicket($this); ?>
      <?= $this->Event->inputFeeling($this); ?>
    </div><!-- /.box-body -->
  </div>

</fieldset>
<?= $this->Form->button(__('Add')); ?>
<?= $this->Form->end() ?>
