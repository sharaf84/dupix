<script type="text/javascript">
$(document).ready(function() {
    //
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
</div>

<div class="profile-albums" id="myAlbums">
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