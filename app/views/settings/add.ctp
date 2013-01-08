<div class="settings form">
<?php echo $this->Form->create('Setting');?>
	<fieldset>
 		<legend><?php __('Add Setting'); ?></legend>
	<?php
		echo $this->Form->input('url');
		echo $this->Form->input('title');
		echo $this->Form->input('email');
		echo $this->Form->input('footer');
		echo $this->Form->input('meta_keywords');
		echo $this->Form->input('meta_description');
		echo $this->Form->input('file_types');
		echo $this->Form->input('image_types');
		echo $this->Form->input('max_upload_size');
		echo $this->Form->input('resize');
		echo $this->Form->input('max_image_width');
		echo $this->Form->input('master_image_width');
		echo $this->Form->input('master_image_height');
		echo $this->Form->input('large_image_width');
		echo $this->Form->input('large_image_height');
		echo $this->Form->input('medium_image_width');
		echo $this->Form->input('medium_image_height');
		echo $this->Form->input('thumb_width');
		echo $this->Form->input('thumb_height');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Settings', true), array('action' => 'index'));?></li>
	</ul>
</div>