<?= $this->start('tb_actions'); ?>
		<li>
			<a href="<?php echo $this->Url->build(['controller'=>'Events', 'action'=>'add']); ?>">
				<i class="fa fa-calendar-plus-o"></i> <span><?= __('New Event') ?></span>
			</a>
		</li>
		<li>
			<a href="<?php echo $this->Url->build(['controller'=>'Events', 'action'=>'index']); ?>">
				<i class="fa fa-calendar"></i> <span><?= __('List Events') ?></span>
			</a>
		</li>
		<li>
			<a href="<?php echo $this->Url->build(['controller'=>'Favorites', 'action'=>'index']); ?>">
				<i class="fa fa-heart"></i> <span><?= __('List Favorites') ?></span>
			</a>
		</li>
		<li>
			<a href="<?php echo $this->Url->build(['controller'=>'Favorites', 'action'=>'add']); ?>">
				<i class="fa fa-heart-o"></i> <span><?= __('Add Favorite') ?></span>
			</a>
		</li>
		<li>
			<a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'index']); ?>">
				<i class="fa fa-users"></i> <span><?= __('List Users') ?></span>
			</a>
		</li>
		<li>
			<a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'edit', $this->request->session()->read('Auth.User.id')]); ?>">
				<i class="fa fa-user"></i> <span><?= __('Edit User') ?></span>
			</a>
		</li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
