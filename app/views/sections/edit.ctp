<?php
//Color Picker CSS & Scripts 
echo $this->Html->css('colorpicker/colorpicker', null, array('inline' => false));
echo $this->Javascript->link(array('colorpicker/colorpicker', 'colorpicker/eye', 'colorpicker/layout.js?ver=1.0.2'), false);   
?>
<div class="sections form">
    <?php echo $this->Form->create('Section', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Edit Section'); ?></legend>
        <?php
        echo $this->Form->input('id');
		echo $this->Form->input('title');
        echo $this->Form->input('color', array('id'=>'colorpickerField1'));
        echo $this->element('backend/image_view', array(
            'data' => array(
                'image' => $this->data['Section']['image'],
                'caption' => $this->data['Section']['title'],
                'size' => ''
            ),
            'delete' => array(
                'model' => 'Section',
                'id' => $this->data['Section']['id'],
                'field' => 'image'
            ),
            'crop' => true
        ));
        echo $this->Form->input('image', array('type' => 'file', 'label'=>'Image (220px * 210px)'));
		echo $this->Form->input('photo_print');
        echo $this->Form->input('meta_title');
        echo $this->Form->input('meta_keywords');
        echo $this->Form->input('meta_description');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Section.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Section.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Sections', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
    </ul>
</div>