<div class="friends form">
<?php echo $this->Form->create('Friend');?>
	<fieldset>
 		<legend><?php __('Edit Friend'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->select('parent_id', $options = Configure::read('parentFrns'),(isset ($this->data['Friend']) && $this->data['Friend']['parent_id']) ? $this->data['Friend']['parent_id'] : 0, array(), array(), true); 

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Friend.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Friend.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Grads&Classes', true), array('action' => 'index'));?></li>
	</ul>
</div>