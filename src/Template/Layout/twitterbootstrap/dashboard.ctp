<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;
$this->fetch('css');
$this->fetch('meta');
$this->element('html_header');
?>
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
      <?= $this->Flash->render() ?>
      <?= $this->Flash->render('auth') ?>
      <!-- Main content -->
      <section class="content">

        <!-- Your Page Content Here -->
        <?= $this->fetch('content') ?>

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

<?php

$this->end();

$this->start('tb_body_end');
echo $this->fetch('script');
echo $this->fetch('scriptBottom');
echo $this->fetch('page_script');
echo '</body>';
$this->end();
