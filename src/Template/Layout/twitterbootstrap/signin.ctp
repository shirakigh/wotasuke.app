<?php
/* @var $this \Cake\View\View */
$this->prepend('css', $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'));
$this->prepend('css', $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'));
$this->prepend('css', $this->Html->css('wotasuke/AdminLTE.min'));
$this->fetch('css');
?>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php
//$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->controller, $this->request->action]) . '" ');
$this->prepend('tb_body_attrs', ' class="hold-transition login-page" ');
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <div class="login-box">
      <div class="login-logo">
        <b>WOTASUKE</b>
      </div><!-- /.login-logo -->
      <?= $this->Flash->render('login_error') ?>
      <?= $this->Flash->render('auth') ?>
      <div class="login-box-body">
        <?= $this->fetch('content') ?>
        <a href="#">パスワード忘れたらこちら</a><br>
        <?= $this->Html->link(__('New User'), ['action' => 'add']) ?>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->


<?php
$this->end();
?>
<?= $this->fetch('scriptBottom'); ?>

<?php
$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->start('tb_footer');
echo ' ';
$this->end();
