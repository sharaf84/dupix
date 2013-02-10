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
<div class="friends form">
    <?php echo $this->Form->create('Friend', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php if (isset ($this->data['Friend']['parent_id']) && $this->data['Friend']['parent_id']) 
                            __('Edit Class');
                      else
                            __('Edit Grade'); 
                ?>
        </legend>
            <div class="panes">
                <!--General-->
                <div>
                    <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('title');
                    echo $this->Form->input('member_id');
                    ?>
                    <?php echo $this->Form->input('parent_id', array('empty' => array(0 => 'Edit as Grade')));?>
                </div>
            </div>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); //echo $this->element('backend/images_gallery_view', array('gallery' => $this->data['Gal'], 'delete'=>true, 'crop'=>true, 'sort'=>true));?>
    
    
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Friend.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Friend.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Classes', true), array('action' => 'index'));?></li>

	</ul>
</div>