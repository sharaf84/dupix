<?php
echo $this->Javascript->link(
    array(
        'ajaxupload/jquery.html5.upload',
        //'ajaxupload/jquery.html5.upload.custom' //all code added to => 'front/jquery.galleriffic.custom'
        'front/jquery.jcarousel',
        'front/jquery.jcarousel.custom',
        'front/jquery.history',
        'front/jquery.galleriffic',
        'front/jquery.galleriffic.custom',
        'front/jquery.opacityrollover',
    )
    , false
);
?>
<script type="text/javascript">
    document.write('<style>.noscript { display: none; }</style>');
    $(document).ready(function(){
        //any code
    });
</script>
<div id="contain">
    <div id="container">

        <div class="profile-photos">
            <div class="profile-photos-left">
                <div class="profile-pesonal-img"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>personal.jpg" width="180" height="180" border="0" /></div>
                <div class="profile-pesonal-name"><?php echo $member['Member']['name']; ?></div>
            </div>
            <div class="profile-photos-right">
                <div class="profile-cover-img"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>cover.jpg" width="505" height="180" border="0" /></div>
                <div class="profile-menu">
                    <a href="#addAlbum" class="inline cboxElement">Create new Album</a> | 
                    <a href="JavaScript:void(0);" id="addImageLink2" style="position:relative;"><input type="file" multiple="multiple" id="upload_field">Upload Photo(s)</a> | 
                    <a href="#" id="removeImageByIndexLink" style="position:relative; z-index:500;">Delete Photo(s)</a> 
                </div>
            </div>
        </div>

        <?php include_once ('albums.ctp'); ?>

        <?php
        include_once ('album_imgs.ctp');
        if (($this->action == 'createProject') || ($this->action == 'editProject'))
            include_once ('create_project.ctp');
        ?>

    </div>
</div>
