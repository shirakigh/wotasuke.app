<?php
$this->extend('/Layout/twitterbootstrap/dashboard');
?>
<!-- Main content -->
<section class="content">

  <div class="row">

    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <?= $this->Html->image($this->request->session()->read('user_icon'), ['class' => 'profile-user-img img-responsive img-circle']); ?>
          <h3 class="profile-username text-center"><?= h($user->name) ?></h3>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b><?= __('name') ?></b> <a class="pull-right"><?= h($user->name) ?></a>
            </li>
            <li class="list-group-item">
              <b><?= __('login_account') ?></b> <a class="pull-right"><?= h($user->login_account) ?></a>
            </li>
            <li class="list-group-item">
              <b><?= __('created') ?></b> <a class="pull-right"><?= h($user->created) ?></a>
            </li>
          </ul>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->

    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
          <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
          <li><a href="#settings" data-toggle="tab">Settings</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <?= $this->element('calendar_readonly'); ?>
          </div><!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
          </div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
      </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->

  </div><!-- /.row -->

</section><!-- /.content -->
