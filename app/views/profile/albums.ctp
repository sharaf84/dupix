<script type="text/javascript">
    $(document).ready(function(){
        //$('#tab1 .albumLink:first').addClass('current');
    });
</script>

<!-- This contains the hidden content for inline calls -->
<div style="display:none">

    <div id="addAlbum" style="padding:10px; background:#fff; height: 100px;">
        <div class="albums form">
            <?php echo $this->Form->create('Album', array('url' => $this->Session->read('Setting.url') . '/profile/addAlbum', 'id' => 'addAlbumForm')); ?>
            <fieldset>
                <legend><?php __('Add New Album'); ?></legend>
                <?php echo $this->Form->input('title'); ?>
            </fieldset>
            <?php echo $this->Form->end(__('Add', true)); ?>
            <div id="albumLoading" class="ajaxLoading"></div>
            <div id="albumResult" class="ajaxResult"></div>
        </div>
    </div>
    <div id="uploadImages" style="padding: 10px; background: #fff;">
        <fieldset>
            <legend><?php __('Upload Images'); ?></legend>
            <?php //echo $this->element('backend/multiple_img_upload'); ?>
        </fieldset>
    </div>
</div>

<div class="profile-albums">
    <div id="tab" class="secTabs">
        <ul class="tabs">
            <li><a class="my-albums" href="#tab1">MY ALBUMS</a></li>
            <li><a class="shared-albums" href="#tab2">SHARED ALBUMS</a></li>
        </ul>
        <div class="tab_container">
            
            <div style="display: none;" id="tab1" class="tab_content">
                <ul id="mycarousel" class="jcarousel-skin-tango">
                    <?php foreach ($member['Album'] as $album) {?>
                    <li class="albumLink" id="album<?php echo $album['id']; ?>">
                        <div class="album-name"><?php echo $album['title'];?></div>
                        <div class="album-option">
                            <a href="javascript:animatedcollapse.toggle('menu-stores<?php echo $album['id']; ?>')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                        </div>
                        <div class="album-pop" id="menu-stores<?php echo $album['id']; ?>">
                            <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                            <div class="album-pop-links">
                                <a href="#">Rename</a>
                                <a href="#">Delete</a>
                                <a href="#">Share public</a>
                                <a href="#">Share private</a>
                                <a href="#">Pin</a>
                            </div>
                        </div>
                    </li>
                    <?php }?>
                </ul>
            </div>

            <div style="display: none;" id="tab2" class="tab_content">
                <ul id="mycarousel2" class="jcarousel-skin-tango">
                    <?php 
                    if(!empty($sharedAlbums)){
                        foreach ($sharedAlbums as $album) {
                    ?>
                    <li class="albumLink" id="album<?php echo $album['id']; ?>">
                        <div class="album-name"><?php echo $album['title'];?></div>
                        <div class="album-option">
                            <a href="javascript:animatedcollapse.toggle('menu-stores<?php echo $album['id']; ?>')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                        </div>
                        <div class="album-pop" id="menu-stores<?php echo $album['id']; ?>">
                            <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                            <div class="album-pop-links">
                                <a href="#">Rename</a>
                                <a href="#">Delete</a>
                                <a href="#">Share public</a>
                                <a href="#">Share private</a>
                                <a href="#">Pin</a>
                            </div>
                        </div>
                    </li>
                    <?php }}else{?>
                    <li>
                        <div class="album-name"><?php echo 'Empty Album';?></div>
                    </li>
                    <?php }?>
                    
                </ul>
            </div>
        </div>
    </div>
</div>