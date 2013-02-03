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
        <legend><?php __('Edit Product'); ?></legend>
        <div id="tapss">
            <ul class="tabs">
                <li><a class="current" href="#">General</a></li>
                <li><a class="current" href="#">Privacy</a></li>
                <li><a class="" href="#">Images</a></li>
                <li><a class="" href="#">Meta</a></li>
            </ul>
            <div class="panes">
                <!--General-->
                <div>
                    <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('title');
                    echo '<label>Body</label>';
                    echo $this->Fck->fckeditor(array('Product', 'body'), $this->Html->base, $this->data['Product']['body']);
                    ?>
                </div>
                <!--Privacy-->
                <div>
                    <?php
                    echo $this->Form->input('price', array('default' => 0));
                    echo $this->Form->input('hits', array('default' => 0));
                    //echo $this->Form->input('min_images');
                    echo $this->Form->input('max_images', array('default' => 1));
                    echo $this->Form->input('crop_width', array('default' => 0));
                    echo $this->Form->input('crop_height', array('default' => 0));
                    echo $this->Form->input('home');
                    echo $this->Form->input('hot');
                    echo $this->Form->input('section_id');
                    echo $this->Form->input('parent_id', array('empty' => array(0 => 'Parent Product')));
                    ?>
                </div>
                <!--Images-->
                <div>
                    <?PHP
                    echo $this->element('backend/image_view', array(
                        'data' => array(
                            'image' => $this->data['Product']['project_image'],
                            'caption' => $this->data['Product']['title'],
                            'size' => ''
                        ),
                        'delete' => array(
                            'model' => 'Product',
                            'id' => $this->data['Product']['id'],
                            'field' => 'project_image'
                        ),
                        'crop' => false
                    ));
                    echo $this->Form->input('project_image', array('type'=>'file', 'label'=>'Project Image 700px × 350px'));
                    
                    echo $this->element('backend/image_view', array(
                        'data' => array(
                            'image' => $this->data['Product']['hot_image'],
                            'caption' => $this->data['Product']['title'],
                            'size' => ''
                        ),
                        'delete' => array(
                            'model' => 'Product',
                            'id' => $this->data['Product']['id'],
                            'field' => 'hot_image'
                        ),
                        'crop' => false
                    ));
                    echo $this->Form->input('hot_image', array('type'=>'file', 'label'=>'Hot Image (205px × 134px)'));
                    
                    echo $this->element('backend/image_view', array(
                        'data' => array(
                            'image' => $this->data['Product']['top_image'],
                            'caption' => $this->data['Product']['title'],
                            'size' => ''
                        ),
                        'delete' => array(
                            'model' => 'Product',
                            'id' => $this->data['Product']['id'],
                            'field' => 'top_image'
                        ),
                        'crop' => false
                    ));
                    echo $this->Form->input('top_image', array('type'=>'file', 'label'=>'Top Image (712px × 230px)'));
                    
                    echo $this->element('backend/image_view', array(
                        'data' => array(
                            'image' => $this->data['Product']['middle_image'],
                            'caption' => $this->data['Product']['title'],
                            'size' => ''
                        ),
                        'delete' => array(
                            'model' => 'Product',
                            'id' => $this->data['Product']['id'],
                            'field' => 'middle_image'
                        ),
                        'crop' => false
                    ));
                    echo $this->Form->input('middle_image', array('type'=>'file', 'label'=>'Middle Image (402px × 230px).'));
                    
                    echo $this->element('backend/image_view', array(
                        'data' => array(
                            'image' => $this->data['Product']['bottom_image'],
                            'caption' => $this->data['Product']['title'],
                            'size' => ''
                        ),
                        'delete' => array(
                            'model' => 'Product',
                            'id' => $this->data['Product']['id'],
                            'field' => 'bottom_image'
                        ),
                        'crop' => false
                    ));
                    echo $this->Form->input('bottom_image', array('type'=>'file', 'label'=>'Bottom Image (220px × 137px)'));
                    
                    echo $this->element('backend/image_view', array(
                        'data' => array(
                            'image' => $this->data['Product']['slide_image'],
                            'caption' => $this->data['Product']['title'],
                            'size' => ''
                        ),
                        'delete' => array(
                            'model' => 'Product',
                            'id' => $this->data['Product']['id'],
                            'field' => 'slide_image'
                        ),
                        'crop' => false
                    ));
                    echo $this->Form->input('slide_image', array('type'=>'file', 'label'=>'Slide Image (700px × 350px)'));
                    /*
                    <div class="images">
                        <div class="image">	
                            <div style="width:15px; position:absolute; margin-top:15px; margin-left:750px; color:#F00; font-size:large; cursor:pointer;" title="Remove" onclick="removeImage($(this));">X</div>
                            <fieldset>
                                <legend>Image</legend>
                                <?php
                                echo $this->Form->input('Gal.0.caption', array('value' => ''));
                                echo $this->Form->input('Gal.0.image', array('type' => 'file'));
                                ?>
                            </fieldset>
                        </div>
                    </div>
                    <input type="button" id="addImage" value="Add New Image" style="width: 150px; margin-left: 300px;">
                    <?php
                    echo '<h3>' . __('Related Images', true) . '</h3>';
                    echo $this->element('backend/images_gallery_view', array('gallery' => $this->data['Gal'], 'delete' => true, 'crop' => true, 'sort' => true));
                    ?>
                     */?>
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
    <?php echo $this->Form->end(__('Submit', true)); //echo $this->element('backend/images_gallery_view', array('gallery' => $this->data['Gal'], 'delete'=>true, 'crop'=>true, 'sort'=>true));?>


</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Product.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Product.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Products', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Sections', true), array('controller' => 'sections', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Section', true), array('controller' => 'sections', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Gals', true), array('controller' => 'gals', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Gal', true), array('controller' => 'gals', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
    </ul>
</div>