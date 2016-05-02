<!-- Left side column. contains the logo and sidebar -->
<?= $this->element('sidemenus'); ?>
<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar user panel (optional) -->
		<div class="user-panel">
			<div class="pull-left image">
				<?= $this->Html->image('thumnail/shiraki.png', ['class' => 'img-circle']); ?>
			</div>
			<div class="pull-left info">
				<p><?= $this->request->session()->read('Auth.User.name'); ?></p>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<li class="header">MENU</li>
			<!-- Optionally, you can add icons to the links -->
			<?= $this->fetch('tb_actions') ?>
		</ul><!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>
