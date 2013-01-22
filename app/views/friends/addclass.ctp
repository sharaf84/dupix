<div class="friends form">
<?php echo $this->Form->create('Friend');?>
	<fieldset>
 		<legend><?php __('Add Class'); ?></legend>
	<?php
		echo $this->Form->input('title');
                echo '<div class"input text"><label for="FriendTitle">Parent</label>';
		echo $this->Form->select('parent_id', $options = Configure::read('parentFrns'), Configure::read('parent'), array('readonly'), array(), true).'</div>'; 


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