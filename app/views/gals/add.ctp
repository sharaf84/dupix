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
 		<legend><?php __('Add Gal'); ?></legend>
	<?php
		echo $this->Form->input('caption');
		echo $this->Form->input('image', array('type'=>'file', 'label'=>'Image for Schools (732px × 345px) for Grades (601px × 469px)'));
		echo $this->Form->input('created');
		echo $this->Form->input('location');
		echo $this->Form->input('tags');
		echo $this->Form->input('crop_info');
		echo $this->Form->input('product_id');
		echo $this->Form->input('album_id', array('value' => $albumId));
		echo $this->Form->input('member_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Gals', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>

	</ul>
</div>