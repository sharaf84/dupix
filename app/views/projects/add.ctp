<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
 		<legend><?php __('Add Project'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('account');
		echo $this->Form->input('place');
		echo $this->Form->input('status');
		echo $this->Form->input('quantity');
		echo $this->Form->input('unit_price');
		echo $this->Form->input('payment_type');
		echo $this->Form->input('paid');
		echo $this->Form->input('info');
		echo $this->Form->input('member_id');
		echo $this->Form->input('product_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responses', true), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response', true), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>