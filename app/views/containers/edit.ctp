<div class="containers form">
<?php echo $this->Form->create('Container');?>
	<fieldset>
 		<legend><?php __('Edit Container'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('unit_price');
		echo $this->Form->input('quantity');
		echo $this->Form->input('status');
		echo $this->Form->input('order_id');
		echo $this->Form->input('project_id');
		echo $this->Form->input('product_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Container.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Container.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Containers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>