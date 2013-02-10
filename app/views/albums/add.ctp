<div class="albums form">
<?php echo $this->Form->create('Album');?>
	<fieldset>
 		<legend><?php __('Add Album'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('tags');
		echo $this->Form->input('caption');
		echo $this->Form->input('access');
		echo $this->Form->input('share_type');
		echo $this->Form->input('password');
		echo $this->Form->input('owner_id');
		echo $this->Form->input('member_id');
		echo $this->Form->input('friend_id');
		echo $this->Form->input('Member');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Albums', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends', true), array('controller' => 'friends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friend', true), array('controller' => 'friends', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gals', true), array('controller' => 'gals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gal', true), array('controller' => 'gals', 'action' => 'add')); ?> </li>
	</ul>
</div>