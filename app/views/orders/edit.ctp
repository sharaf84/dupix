<div class="orders form">
<?php echo $this->Form->create('Order');?>
	<fieldset>
 		<legend><?php __('Edit Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('amount');
		echo $this->Form->input('payment_method');
		echo $this->Form->input('shipping_method');
		echo $this->Form->input('pickup_location');
		echo $this->Form->input('suggested_pickup');
		echo $this->Form->input('notes');
		echo $this->Form->input('status');
		echo $this->Form->input('closed');
		echo $this->Form->input('member_id');
		echo $this->Form->input('address_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Order.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Order.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('action' => 'index'));?></li>
	</ul>
</div>