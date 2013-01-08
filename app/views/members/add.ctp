<div class="members form">
<?php echo $this->Form->create('Member');?>
	<fieldset>
 		<legend><?php __('Add Member'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('country');
		echo $this->Form->input('city');
		echo $this->Form->input('area');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		echo $this->Form->input('gender', array('type'=>'radio', 'options'=>array('Female', 'Male')));
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('confirm_password', array('type'=>'password'));
		//echo $this->Form->input('confirm_code');
		echo $this->Form->input('confirmed');
		echo $this->Form->input('newsletter');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Members', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>