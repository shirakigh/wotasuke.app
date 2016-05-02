<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="<?php echo $this->Url->build(['controller'=>'Events', 'action'=>'index']); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>WSK</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>WOTASUKE</b></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <?= $this->Html->image('thumnail/shiraki.png', ['class' => 'user-image']); ?>
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">Login：<?= $this->request->session()->read('Auth.User.name'); ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <?= $this->Html->image('thumnail/shiraki.png', ['class' => 'img-circle']); ?>
              <p>
                <?= $this->request->session()->read('Auth.User.name'); ?>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="col-xs-4 text-center">
                <?= $this->Html->link(__('Calendar'), ['controller' => 'Events', 'action' => 'index']) ?>
              </div>
              <div class="col-xs-4 text-center">
                <?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view', $this->request->session()->read('Auth.User.id')]) ?>
              </div>
              <div class="col-xs-4 text-center">
                <?= $this->Html->link(__('Favorites'), ['controller' => 'Favorites', 'action' => 'index']) ?>
              </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Change Password</a>
              </div>
              <div class="pull-right">
                <?= $this->Html->link(__('Sign out'), ['controller' => 'Users', 'action' => 'logout'],['class' => 'btn btn-default btn-flat']) ?>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
