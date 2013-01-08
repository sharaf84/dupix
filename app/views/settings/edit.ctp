<div class="settings form">
<?php echo $this->Form->create('Setting');?>
	<fieldset>
 		<legend><?php __('Edit Setting'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('url');
		echo $this->Form->input('email');
		echo $this->Form->input('title');
		echo $this->Form->input('footer');
		echo $this->Form->input('meta_keywords');
		echo $this->Form->input('meta_description');
		echo $this->Form->input('file_types');
		echo $this->Form->input('image_types');		
		echo $this->Form->input('max_upload_size', array('label'=>'Max Upload Size (Megas)'));
		echo $this->Form->input('max_image_width');
/*		echo '<span style="color:red; font-size:10px">resize value (3 is recommended).
			 <br /> :0 no resizing, and make a Thumb copy whith Thumb Width and Hight.
			 <br /> :1 resize image to Master Image Width and Master Image Height.
			 <br /> :2 resize image to Master Image Width and Master Image Height, and make a Thumb copy whith Thumb Width and Hight.
			 <br /> :3 resize image to Max Image Width (if image width > Max Image Width), and make a Thumb copy whith Thumb Width and Hight.
			 </span>';
		echo $this->Form->input('resize');
		echo $this->Form->input('master_image_width');
		echo $this->Form->input('master_image_height');*/
		echo $this->Form->input('large_image_width');
		echo $this->Form->input('large_image_height');
		echo $this->Form->input('medium_image_width');
		echo $this->Form->input('medium_image_height');
		echo $this->Form->input('thumb_width');
		echo $this->Form->input('thumb_height');
		echo $this->Form->input('video_width');
		echo $this->Form->input('video_height');
		//echo $this->Form->input('limit');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
