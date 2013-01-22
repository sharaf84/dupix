<div class="members form">
<?php echo $this->Form->create('Member');?>
	<fieldset>
 		<legend><?php __('Add Member'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('gender', array('type'=>'radio', 'options'=>array('Female', 'Male')));
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('confirm_password', array('type'=>'password'));
		//echo $this->Form->input('confirm_code');
		echo $this->Form->input('confirmed');
		echo $this->Form->input('newsletter');
                echo $this->Form->input('type', array('type'=>'radio', 'options'=>array('Normal', 'School')));
         	echo $this->Form->select('parent_id', $options = Configure::read('parentMems'),(isset ($this->data['Member'])) ? $this->data['Member']['parent_id'] : 0, array(), array(), true); 

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Members', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>