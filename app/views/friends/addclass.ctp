<div class="friends form">
<?php echo $this->Form->create('Friend');?>
	<fieldset>
 		<legend><?php __('Add Class'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->select('parent_id', $options = Configure::read('parentFrns'), Configure::read('parent'), array('readonly'), array(), true); 


	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Friends', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Grades', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grade', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		
</div>