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
<div class="products form">
    <?php echo $this->Form->create('Product', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Add Product'); ?></legend>
        <div id="tapss">
            <ul class="tabs">
                <li><a class="current" href="#">General</a></li>
                <li><a class="current" href="#">Privacy</a></li>
                <li><a class="" href="#">Images</a></li>
                <li><a class="" href="#">Meta</a></li>
            </ul>
            <div class="panes">
                <!--General-->
                <div style="display: block;">
                    <?php
                    echo $this->Form->input('title');                    
                    echo '<lable>Body</lable>';
                    echo $this->Fck->fckeditor(array('Product', 'body'), $this->Html->base);
                    ?>
                </div>
                <!--Privacy-->
                <div style="display: none;">
                    <?php                    
                    echo $this->Form->input('price', array('default'=>0));
                    echo $this->Form->input('hits', array('default'=>0));
                    //echo $this->Form->input('min_images');
                    echo $this->Form->input('max_images', array('default'=>1));
                    echo $this->Form->input('crop_width', array('default'=>0));
                    echo $this->Form->input('crop_height', array('default'=>0));                    
                    echo $this->Form->input('home');
                    echo $this->Form->input('hot');
                    echo $this->Form->input('section_id');
                    echo $this->Form->input('parent_id', array('empty' => array(0 => 'Parent Product')));
                    ?>
                </div>
                <!--Images-->
                <div>
                    <div class="images">
		            	<div class="image">	
	                        <div style="width:15px; position:absolute; margin-top:15px; margin-left:700px; color:#F00; font-size:large; cursor:pointer;" title="Remove" onclick="removeImage($(this));">X</div>
	                    	<fieldset>
	                            <legend>Image</legend>
	                            <?php
	                            echo $this->Form->input('Gal.0.caption', array('value'=>''));
	                    		echo $this->Form->input('Gal.0.image', array('type' => 'file'));
	                    		?>
	                        </fieldset>
		                </div>
                	</div>
                	<input type="button" id="addImage" value="Add New Image" style="width: 150px; margin-left: 300px;">
                </div>
                <!--Meat-->
                <div>
                    <?php
                    echo $this->Form->input('meta_title');
                    echo $this->Form->input('meta_keywords');
                    echo $this->Form->input('meta_description');
                    ?>
                </div>
            </div>
        </div>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Products', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Sections', true), array('controller' => 'sections', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Section', true), array('controller' => 'sections', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Gals', true), array('controller' => 'gals', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Gal', true), array('controller' => 'gals', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
    </ul>
</div>