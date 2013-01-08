<div class="videos form">
<?php echo $this->Form->create('Video', array('type'=>'file'));?>
	<fieldset>
 		<legend><?php __('Add Video'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('image', array('type'=>'file'));
		echo $this->Form->input('file', array('type'=>'file', 'label'=>'FLV File'));
		echo $this->Form->input('url');
		//echo $this->Form->input('hits');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Videos', true), array('action' => 'index'));?></li>
	</ul>
</div>