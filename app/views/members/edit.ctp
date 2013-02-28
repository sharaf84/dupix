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
<?php echo $this->Form->create('Member', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Edit Member'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
                echo $this->Form->input('description');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('gender', array('type'=>'radio', 'options'=>array('Female', 'Male')));
                
                echo $this->element('backend/image_view', array(
                        'data' => array(
                            'image' => $this->data['Member']['logo'],
                            'caption' => $this->data['Member']['name'],
                            'size' => ''
                        ),
                        'delete' => array(
                            'model' => 'Member',
                            'id' => $this->data['Member']['id'],
                            'field' => 'logo'
                        ),
                        'crop' => false
                    ));
                    echo $this->Form->input('logo', array('type'=>'file', 'label'=>'Logo 235px × 235px'));
                    
                
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('confirm_password', array('type'=>'password'));
		//echo $this->Form->input('confirm_code');
		echo $this->Form->input('confirmed');
		echo $this->Form->input('newsletter');
                echo $this->Form->input('type', array('type'=>'hidden', 'value' => 0));
                echo $this->Form->input('parent_id', array('type'=>'hidden', 'value' => 0));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Member.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Member.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Members', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index', 0, $this->data['Member']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add', 0, $this->data['Member']['id'])); ?> </li>
	</ul>
</div>