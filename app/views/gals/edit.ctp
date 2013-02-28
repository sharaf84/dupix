<script type="text/javascript">
    $(document).ready(function(){
        //Add new order
        var count = 0;
        $("#addImage").click(function(){
            var copy =$(".image:first").html().replace(/0/g, ++count);
            $(".images").append('<div class="image">'+copy+'</div>'); 
        });	
    });
    //Remove image
    function removeImage (obj){
        if(obj.parent().index() == 0)
            alert("Sorry! Can't remove first image.");
        else
            if(confirm("Confirm removing."))	
                obj.parent().remove();	
    }
</script>
<div class="gals form">
<?php echo $this->Form->create('Gal', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Edit Gal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('caption');
		echo $this->element('backend/image_view', array(
                        'data' => array(
                            'image' => $this->data['Gal']['image'],
                            'caption' => $this->data['Gal']['caption'],
                            'size' => ''
                        ),
//                        'delete' => array(
//                            'model' => 'Gal',
//                            'id' => $this->data['Gal']['id'],
//                            'field' => 'image'
//                        ),
                        'crop' => false
                    ));
                    echo $this->Form->input('image', array('type'=>'file', 'label'=>'Image for Schools (732px × 345px) for Grades (601px × 469px)'));
                    
		echo $this->Form->input('created');
		echo $this->Form->input('location');
		echo $this->Form->input('tags');
		echo $this->Form->input('crop_info');
		echo $this->Form->input('member_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('album_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Gal.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Gal.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gals', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>