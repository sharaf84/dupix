<div class="gals form">
<?php echo $this->Form->create('Gal');?>
	<fieldset>
 		<legend><?php __('Add Gal'); ?></legend>
	<?php
		echo $this->Form->input('caption');
		echo $this->Form->input('image');
		echo $this->Form->input('created');
		echo $this->Form->input('location');
		echo $this->Form->input('tags');
		echo $this->Form->input('crop_info');
		echo $this->Form->input('product_id');
		echo $this->Form->input('album_id');
		echo $this->Form->input('member_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Gals', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>

	</ul>
</div>