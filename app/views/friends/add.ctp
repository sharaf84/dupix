<div class="members form">
<?php echo $this->Form->create('Friend');?>
	<fieldset>
 		<legend><?php __('Add Classes and Grades'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->select('parent_id', $options = Configure::read('parentFrns'),(isset ($this->data['Member']) && $this->data['Friend']['parent_id']) ? $this->data['Friend']['parent_id'] : 0, array(), array(), true); 


	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Grads&Classes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('New Grade', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		
</div>