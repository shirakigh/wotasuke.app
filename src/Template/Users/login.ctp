<?= $this->extend('/Layout/twitterbootstrap/signin'); ?>
<div class="users form">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('LOGIN') ?></legend>
        <div class="form-group has-feedback">
            <?= $this->User->inputLoginAccount($this) ?>
        </div>
        <div class="form-group has-feedback">
            <?= $this->User->inputPassword($this) ?>
        </div>
    </fieldset>
    <div class="row">
        <div class="col-xs-8">
        </div><!-- /.col -->
        <div class="col-xs-4">
            <?php echo $this->Form->button(__('Login'), [
                'type' => 'submit',
                'class' => 'btn btn-primary btn-block btn-flat',
            ]);  ?>
        </div><!-- /.col -->
    </div>
    <?= $this->Form->end() ?>
</div>
