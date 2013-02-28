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
<div class="members form">
<?php echo $this->Form->create('Member', array('type' => 'file', 'url' => '/school/add'));?>
	<fieldset>
 		<legend><?php __('Add School'); ?></legend>
	<?php
		echo $this->Form->input('name');
                echo $this->Form->input('description');
                echo $this->Form->input('logo', array('type'=>'file', 'label'=>'Logo 235px × 235px'));
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('confirm_password', array('type'=>'password'));
		echo $this->Form->input('confirmed');
		echo $this->Form->input('newsletter');
                echo $this->Form->input('type', array('value' => 1, 'type' => 'hidden'));
         	echo $this->Form->select('parent_id', $options = $parentMems,(isset ($this->data['Member'])) ? $this->data['Member']['parent_id'] : $mainId, array(), array(), true); 

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
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index', 0, $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add', 0, $member['Member']['id'])); ?> </li>
	</ul>
</div>