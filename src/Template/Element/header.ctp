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
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">7/9</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <!-- inner menu: contains the actual data -->
              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;"><ul class="menu" style="overflow: hidden; width: 100%; height: auto;">
                <li>
                  <a href="<?= $this->Url->build(['controller' => 'Html', 'action' => 'board']); ?>">
                    <i class="fa fa-rocket text-aqua"></i> 2016-07-09 WOTASUKE リリースしました！
                  </a>
                </li>
              </ul><div class="slimScrollBar" style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
            </li>
          </ul>
        </li>
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <?= $this->Html->image($this->request->session()->read('user_icon'), ['class' => 'user-image']); ?>
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">Login：<?= $this->request->session()->read('Auth.User.name'); ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <?= $this->Html->image($this->request->session()->read('user_icon'), ['class' => 'img-circle']); ?>
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
                <?= $this->Html->link(__('Change Password'), ['controller' => 'Users', 'action' => 'edit', $this->request->session()->read('Auth.User.id')],['class' => 'btn btn-default btn-flat']) ?>
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
