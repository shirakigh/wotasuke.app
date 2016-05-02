<?= $this->extend('/Layout/twitterbootstrap/signin'); ?>
<div class="users form">
<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= __('New User') ?></legend>
    <?php
    echo $this->User->inputName($this);
    echo $this->User->inputLoginAccount($this);
    echo $this->User->inputPassword($this);
    echo $this->User->inputPasswordConfirm($this);
    ?>
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
