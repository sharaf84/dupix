<?php
//Color Picker CSS & Scripts 
echo $this->Html->css('colorpicker/colorpicker', null, array('inline' => false));
echo $this->Javascript->link(array('colorpicker/colorpicker', 'colorpicker/eye', 'colorpicker/layout.js?ver=1.0.2'), false);   
?>
<div class="sections form">
<?php echo $this->Form->create('Section', array('type'=>'file'));?>
	<fieldset>
 		<legend><?php __('Add Section'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('color', array('id'=>'colorpickerField1', 'value'=>'E1088B'));
		echo $this->Form->input('image', array('type'=>'file', 'label'=>'Image (220px * 210px)'));
		echo $this->Form->input('photo_print');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_keywords');
		echo $this->Form->input('meta_description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sections', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>