<div class="addresses form">
<?php echo $this->Form->create('Address');?>
	<fieldset>
 		<legend><?php __('Add Address'); ?></legend>
	<?php
		echo $this->Form->input('country');
		echo $this->Form->input('city');
		echo $this->Form->input('area');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		echo $this->Form->input('member_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Addresses', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>