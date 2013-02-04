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
<?php //var_dump($member['Member']['type']);?>
<div class="friends form">
    <?php echo $this->Form->create('Friend', array('type' => 'file')); ?>
    <fieldset>
        <legend>
                <?php if (isset ($this->data['Friend']['parent_id']) && $this->data['Friend']['parent_id']) 
                            __('Add Class');
                      else
                            __('Add Grade'); 
                ?>
        </legend>
     
            <div class="panes">
                <!--General-->
                <div style="display: block;">
                    <?php echo $this->Form->input('title');?>
                    <?php echo $this->Form->input('parent_id', array('empty' => array(0 => 'Add as Grade')));?>
                </div>
             
            </div>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
       <li><?php echo $this->Html->link(__('List Grades', true), array('action' => 'index')); ?></li>
    </ul>
</div>