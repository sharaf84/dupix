<div class="orders form">
<?php echo $this->Form->create('Order');?>
	<fieldset>
 		<legend><?php __('Add Order'); ?></legend>
	<?php
		echo $this->Form->input('amount');
		echo $this->Form->input('payment_method');
		echo $this->Form->input('shipping_method');
		echo $this->Form->input('pickup_location');
		echo $this->Form->input('suggested_pickup');
		echo $this->Form->input('notes');
		echo $this->Form->input('status');
		echo $this->Form->input('closed');
		echo $this->Form->input('member_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Orders', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
	</ul>
</div>