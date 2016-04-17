<h1>Login</h1>
<?= $this->extend('../Layout/TwitterBootstrap/signin'); ?>
<?= $this->Form->create() ?>
<?= $this->Form->input('login_account') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
