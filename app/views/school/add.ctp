<script type="text/javascript">
    $(document).ready(function(){
        //Add new order
        var count = 0;
        $("#addImage").click(function(){
            var copy =$(".image:first").html().replace(/0/g, ++count);
            $(".images").append('<div class="image">'+copy+'</div>'); 
        });
        // Added for multitabs and add new content:
        //Add new album
        var albumCount = 1000;
        $("#addAlbum").click(function(){
            //var randomNum = Math.floor(Math.random()*30)+1;
            
            var copy ='<div style="width:15px; position:absolute; margin-top:10px; margin-left:720px; color:#F00; font-size:large; cursor:pointer;" title="Remove" onclick="removeAlbum($(this));">X</div><fieldset class="album"><legend>Album</legend><input type="hidden" name="data[Member][index]" id="index" value="' + ++albumCount + '"><div class="input text"><label for="Album' + albumCount + 'Title">Title</label><input name="data[Album][' + albumCount + '][title]" type="text" maxlength="255" id="Album' + albumCount + 'Title"></div><div class="input text"><label for="Album' + albumCount + 'Tags">Tags</label><input name="data[Album][' + albumCount + '][tags]" type="text" maxlength="255" id="Album' + albumCount + 'Tags"></div><div class="input text"><label for="Album' + albumCount + 'Caption">Caption</label><input name="data[Album][' + albumCount + '][caption]" type="text" maxlength="255" id="Album' + albumCount + 'Caption"></div><div class="input checkbox"><input type="hidden" name="data[Album][' + albumCount + '][access]" id="Album' + albumCount + 'Access_" value="0"><input type="checkbox" name="data[Album][' + albumCount + '][access]" value="1" id="Album' + albumCount + 'Access"><label for="Album' + albumCount + 'Access">Access</label></div><div class="input checkbox"><input type="hidden" name="data[Album][' + albumCount + '][share_type]" id="Album' + albumCount + 'ShareType_" value="0"><input type="checkbox" name="data[Album][' + albumCount + '][share_type]" value="1" id="Album' + albumCount + 'ShareType"><label for="Album' + albumCount + 'ShareType">Share Type</label></div><div class="input password"><label for="Album' + albumCount + 'Password">Password</label><input type="password" name="data[Album][' + albumCount + '][password]" id="Album' + albumCount + 'Password"></div><input type="hidden" name="data[Album][' + albumCount + '][friend_id]" value="0" id="Album' + albumCount + 'FriendId"><div class="gals-container"><div class="gals"><div class="gal"><div style="width:15px; position:absolute; margin-top:10px; margin-left:600px; color:#F00; font-size:large; cursor:pointer;" title="Remove" onclick="removeGal($(this));">X</div><fieldset><legend>Images</legend><div class="input text"><label for="Gal' + albumCount + '' + albumCount + 'Caption">Caption</label><input name="data[Gal][' + albumCount + '][' + albumCount + '][caption]" type="text" id="Gal' + albumCount + '' + albumCount + 'Caption"></div><div class="input file"><label for="Gal' + albumCount + '' + albumCount + 'Image">Image</label><input type="file" name="data[Gal][' + albumCount + '][' + albumCount + '][image]" id="Gal' + albumCount + '' + albumCount + 'Image"></div><div class="input text"><label for="Gal' + albumCount + '' + albumCount + 'Tags">Tags</label><input name="data[Gal][' + albumCount + '][' + albumCount + '][tags]" type="text" id="Gal' + albumCount + '' + albumCount + 'Tags"></div><div class="input text"><label for="Gal' + albumCount + '' + albumCount + 'Location">Location</label><input name="data[Gal][' + albumCount + '][' + albumCount + '][location]" type="text" id="Gal' + albumCount + '' + albumCount + 'Location"></div><div class="input text"><label for="Gal' + albumCount + '' + albumCount + 'CropInfo">Crop Info</label><input name="data[Gal][' + albumCount + '][' + albumCount + '][crop_info]" type="text" id="Gal' + albumCount + '' + albumCount + 'CropInfo"></div><input type="hidden" name="data[Gal][' + albumCount + '][' + albumCount + '][product_id]" value="0" id="Gal' + albumCount + '' + albumCount + 'ProductId"><input type="hidden" name="data[Gal][' + albumCount + '][' + albumCount + '][friend_id]" value="0" id="Gal' + albumCount + '' + albumCount + 'FriendId">                                        </fieldset></div></div><input type="button" id="addGal" value="Add Image" style="width: 150px; margin-left: 300px;"></div></fieldset>';
//            var copy =$(".album:first").html().replace(/1000/g, ++albumCount);
            $(".albums").append('<div class="album">'+copy+'</div>'); 
        });	
        var galCount = 1000;
        
        $("body").delegate("#addGal", "click", function(){
            var $aId = $(this).parents('fieldset.album').children('input#index').val();
            var copy = '<div style="width:15px; position:absolute; margin-top:10px; margin-left:600px; color:#F00; font-size:large; cursor:pointer;" title="Remove" onclick="removeGal($(this));">X</div><fieldset><legend>Images</legend><div class="input text"><label for="Gal'+ ++galCount +'Caption">Caption</label><input name="data[Gal]['+$aId+']['+ galCount +'][caption]" type="text" maxlength="255" id="Gal'+ galCount +'Caption"></div><div class="input file"><label for="Gal'+ galCount +'Image">Image</label><input type="file" name="data[Gal]['+$aId+']['+ galCount +'][image]" id="Gal'+ galCount +'Image"></div><div class="input text"><label for="Gal'+ galCount +'Tags">Tags</label><input name="data[Gal]['+$aId+']['+ galCount +'][tags]" type="text" maxlength="255" id="Gal'+ galCount +'Tags"></div><div class="input text"><label for="Gal'+ galCount +'Location">Location</label><input name="data[Gal]['+$aId+']['+ galCount +'][location]" type="text" maxlength="255" id="Gal'+ galCount +'Location"></div><div class="input text"><label for="Gal'+ galCount +'CropInfo">Crop Info</label><input name="data[Gal]['+$aId+']['+ galCount +'][crop_info]" type="text" maxlength="255" id="Gal'+ galCount +'CropInfo"></div><input type="hidden" name="data[Gal]['+$aId+']['+ galCount +'][product_id]" value="0" id="Gal'+ galCount +'ProductId"><input type="hidden" name="data[Gal]['+$aId+']['+ galCount +'][friend_id]" value="0" id="Gal'+ galCount +'FriendId"></fieldset>';
           $(this).parents('fieldset.album').children('.gals-container').children('.gals').append('<div class="gal">'+copy+'</div>'); 
            
        });	
        /////////////////////////////////////////////////////
    });
    //Remove Album//////////////////////////////////////
    function removeAlbum (obj){
        if(obj.parent().index() == 0)
            alert("Sorry! Can't remove first album.");
        else
            if(confirm("Confirm removing."))	
                obj.parent().remove();	
    }
    /////////////////////////////////////////////////////
    //Remove image
    function removeGal (obj){
        if(obj.parent().index() == 0)
            alert("Sorry! Can't remove first image.");
        else
            if(confirm("Confirm removing."))	
                obj.parent().remove();	
    }
</script>
<div class="members form">
    <?php echo $this->Form->create('Member', array('type' => 'file', 'url' => '/school/add')); ?>
    <fieldset>
        <legend><?php __('Add School'); ?></legend>
        <div id="tapss">
            <ul class="tabs">
                <li><a class="current" href="#">General</a></li>

                <li><a class="" href="#">Albums</a></li>

            </ul>
            <div class="panes">
                <!--General-->
                <div style="display: block;">
                    <?php
                    echo $this->Form->input('name');
                    echo $this->Form->input('description');
                    echo $this->Form->input('logo', array('type' => 'file', 'label' => 'Logo 235px × 235px'));
                    echo $this->Form->input('email');
                    echo $this->Form->input('password');
                    echo $this->Form->input('confirm_password', array('type' => 'password'));
                    echo $this->Form->input('confirmed');
                    echo $this->Form->input('newsletter');
                    echo $this->Form->input('type', array('value' => 1, 'type' => 'hidden'));
                    echo $this->Form->select('parent_id', $options = $parentMems, (isset($this->data['Member'])) ? $this->data['Member']['parent_id'] : $mainId, array(), array(), true);
                    ?>
                </div>
                <!--Albums-->
                <div style="display: none;">
                    <div class="albums">
                        <div class="album">
                            <div style="width:15px; position:absolute; margin-top:10px; margin-left:720px; color:#F00; font-size:large; cursor:pointer;" title="Remove" onclick="removeAlbum($(this));">X</div>
                            <fieldset class="album">
                                <legend>Album</legend>
                                <?php
                                echo $this->Form->input('index', array('id' => 'index', 'type' => 'hidden', 'value' => '1000'));
                                echo $this->Form->input('Album.1000.title');
                                echo $this->Form->input('Album.1000.tags');
                                echo $this->Form->input('Album.1000.caption');
                                echo $this->Form->input('Album.1000.access');
                                echo $this->Form->input('Album.1000.share_type');
                                echo $this->Form->input('Album.1000.password');
                                echo $this->Form->input('Album.1000.friend_id', array('type' => 'hidden',  'value' => 0));
                                ?>
                                <div class="gals-container">
                                <div class="gals">
                                    <div class="gal">
                                        <div style="width:15px; position:absolute; margin-top:10px; margin-left:600px; color:#F00; font-size:large; cursor:pointer;" title="Remove" onclick="removeGal($(this));">X</div>
                                        <fieldset>
                                            <legend>Images</legend>
                                            <?php
                                                echo $this->Form->input('Gal.1000.1000.caption');
                                                echo $form->input('Gal.1000.1000.image', array('type'=>'file', 'label'=>'Image for Schools (732px × 345px) for Grades (601px × 469px)'));
                                                echo $this->Form->input('Gal.1000.1000.tags');
                                                echo $this->Form->input('Gal.1000.1000.location');
                                                echo $this->Form->input('Gal.1000.1000.crop_info');
                                                echo $this->Form->input('Gal.1000.1000.product_id', array('type' => 'hidden',  'value' => 0));
                                                echo $this->Form->input('Gal.1000.1000.member_id', array('type' => 'hidden',  'value' => 0));
                                                echo $this->Form->input('Gal.1000.1000.friend_id', array('type' => 'hidden',  'value' => 0));
                                            ?>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <input type="button" id="addGal" value="Add Image" style="width: 150px; margin-left: 300px;" />
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <input type="button" id="addAlbum" value="Add album" style="width: 150px; margin-left: 300px;" />
                </div>
            </div></div>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Members', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index', 0, $member['Member']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add', 0, $member['Member']['id'])); ?> </li>
    </ul>
</div>