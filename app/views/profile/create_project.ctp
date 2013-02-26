<script type="text/javascript">
    var imgsNo = 6; //Important for jquery.galleriffic.custom
    $(document).ready(function(){
        $('div.navigation').css({
            'width' : '730px', 
            'float' : 'left'
        });
    });
</script>
<?php
echo $this->Javascript->link(
    array(
        'front/ajax/members',
        'ajaxupload/jquery.html5.upload',
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
<div id="contain">
    <div id="container">
        <div class="profile-photos">
            <div class="profile-photos-left">
                <div class="profile-pesonal-name"><?php echo $member['Member']['name']; ?></div>
            </div>
            <div class="profile-photos-right">
                <div class="profile-menu">
                    <a href="#addAlbum" class="inlineAddAlbum">Create Album</a> |
                    <input type="file" multiple="multiple" id="multiUpload" style="display: none">
                    <a href="javascript:void(0);" onclick="$('#multiUpload').trigger('click');">Upload Photo(s)</a> | 
                    <a href="javascript:void(0);" id="deleteAlbum">Delete Album</a> |
                    <a href="javascript:void(0);" onclick="toggleRename();">Rename Album</a> |
                    <a href="javascript:void(0);" id="shareAlbum">Share Album</a>
                </div>
            </div>
        </div>
        <?php 
        include_once ('albums.ctp'); 
        include_once ('album_imgs.ctp');
        ?>
    </div>
</div>
