<!--<div id="content">
    <div id="content_left">
<?php //include_once ('left_albums.ctp'); ?>
    </div>
    <div id="content_right">
<?php
//        include_once ('album_imgs.ctp');
//        if (($this->action == 'createProject') || ($this->action == 'editProject'))
//            include_once ('create_project.ctp');
?>
    </div>
</div>-->
<?php
echo $this->Javascript->link(
        array(
    'front/jquery.jcarousel.min',
    'front/jquery.history',
    'front/jquery.galleriffic',
    'front/jquery.galleriffic.custom',
    'front/jquery.opacityrollover',
    'ajaxupload/jquery.html5.upload',
    'ajaxupload/jquery.html5.upload.custom'
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
                <div class="profile-menu"><a href="#">Create new Album</a> |  <input type="file" multiple="multiple" id="upload_field"/> | <a href="#addImage" id="addImageLink2">Upload a Photo</a> |   <a href="#removeImageByIndex" id="removeImageByIndexLink">Delete Photo(s)</a> </div>
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
