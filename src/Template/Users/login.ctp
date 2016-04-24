<?= $this->extend('/Layout/TwitterBootstrap/signin'); ?>
<div class="users form">
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('WOTASUKE LOGIN') ?></legend>
        <?= $this->User->inputLoginAccount($this) ?>
        <?= $this->User->inputPassword($this) ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>
