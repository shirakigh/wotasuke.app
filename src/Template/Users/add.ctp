<?= $this->extend('/Layout/twitterbootstrap/signin'); ?>
<div class="users form">
<?= $this->Form->create($user, array(
    'type' => 'file',
    )) ?>
<fieldset>
    <legend><?= __('New User') ?></legend>
    <?php
    echo $this->User->inputName($this);
    echo $this->User->inputLoginAccount($this);
    echo $this->User->inputPassword($this);
    echo $this->User->inputPasswordConfirm($this);
    echo $this->Form->label('image_user', __("image_user"));
    echo $this->Image->inputImage($this);
    ?>
    <p class="help-block"><?= __('ph_image_user') ?></p>
</fieldset>
<div class="row">
    <div class="col-xs-8">
    </div><!-- /.col -->
    <div class="col-xs-4">
        <?php echo $this->Form->button(__('Add'), [
            'type' => 'submit',
            'class' => 'btn btn-primary btn-block btn-flat',
        ]);  ?>
    </div><!-- /.col -->
</div>
<?= $this->Form->end() ?>
</div>
