<?php
$this->extend('/Layout/twitterbootstrap/dashboard');
?>
<?= $this->Form->create($user, array(
    'type' => 'file',
    )) ?>

<fieldset>
    <?php
    echo $this->User->inputName($this);
    echo $this->User->inputLoginAccount($this);
    echo $this->User->inputPasswordNew($this);
    echo $this->User->inputPasswordConfirm($this);
    echo $this->Form->label('image_user', __("image_user"));
    ?>
    <div class="user-panel">
      <div class="pull-left image">
        <?= $this->Html->image($this->request->session()->read('user_icon'), ['class' => 'img-circle']); ?>
      </div>
      <div class="pull-left margin">
          <?= $this->Image->inputImage($this); ?>
          <p class="help-block"><?= __('ph_image_user') ?></p>
        <?php
        echo $this->Image->inputId($this);
        echo $this->Image->inputUserId($this);
        echo $this->Image->inputType($this);
        echo $this->Image->inputName($this);
        echo $this->Image->inputExt($this);
        echo $this->Image->inputSize($this);
        echo $this->Image->inputAlt($this);
        echo $this->Image->inputComment($this);
        ?>
      </div>
    </div>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
