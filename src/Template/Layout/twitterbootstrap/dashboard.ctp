<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;
$this->prepend('css', $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'));
$this->prepend('css', $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'));
$this->prepend('css', $this->Html->css('wotasuke/AdminLTE.min'));
$this->prepend('css', $this->Html->css('wotasuke/skins/skin-blue.min'));
$this->fetch('css');

$this->prepend('tb_body_attrs', ' class="hold-transition skin-blue sidebar-mini" ');
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?= $this->start('tb_body_start'); ?>

<body <?= $this->fetch('tb_body_attrs') ?>>
  <div class="wrapper">
    <?= $this->element('header'); ?>
    <?= $this->element('sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $this->request->controller; ?>
          <?= $this->request->action; ?>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Your Page Content Here -->
        <?= $this->fetch('content') ?>

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

<?php
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
$this->end();

$this->fetch('script');

$this->start('tb_body_end');
echo $this->Html->script('wotasuke/app.min');
echo '</body>';
$this->end();
