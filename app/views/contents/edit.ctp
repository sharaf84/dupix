<div class="contents form">
<?php echo $this->Form->create('Content');?>
	<fieldset>
 		<legend><?php echo  __('Edit Content of '). $this->data['Content']['title']; ?></legend>
	<?php
		echo $this->Form->input('id');
		echo '<lable>Body</lable>';
        echo $this->Fck->fckeditor(array('Content', 'body'), $this->Html->base, $this->data['Content']['body']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Contents', true), array('action' => 'index'));?></li>
	</ul>
</div>