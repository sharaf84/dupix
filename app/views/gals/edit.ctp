<div class="gals form">
<?php echo $this->Form->create('Gal');?>
	<fieldset>
 		<legend><?php __('Edit Gal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('caption');
		echo $this->Form->input('image');
		echo $this->Form->input('created');
		echo $this->Form->input('location');
		echo $this->Form->input('tags');
		echo $this->Form->input('crop_info');
		echo $this->Form->input('member_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('album_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Gal.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Gal.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gals', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>