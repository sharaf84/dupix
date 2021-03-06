<div class="profile-gallery">
    <?php if($this->action == 'index'){?>
    <div id="gallery" class="content">
        <div class="slideshow-container">
            <div id="loading" class="loader"></div>
            <div id="slideshow" class="slideshow"></div>
            <div id="caption" class="caption-container"></div>
        </div>
        <div class="caption" style="display: block;">
            <div class="image-title">
                <a href="javascript:void(0);" onclick="carryImg('move');">MOVE</a>
                <a href="javascript:void(0);" onclick="carryImg('copy');">COPY</a>
                <a href="javascript:void(0);" id="deleteImg">DELETE</a>
                <a href="javascript:void(0);">SHARE</a>
            </div>
            <div class="image-desc"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-share.jpg" width="124" height="21" border="0" /></a></div>
        </div>
    </div>
    <?php }?>
    <div id="thumbs" class="navigation">
        <div class="album-tit-share">
            <div class="album-title" id="albumTitle">Default</div>
            <div class="album-title" style="display: none;">
                <input type="text" id="albumInput" value="" style="width: 100px; text-align: left;">
                <a href="javascript:void(0);" onclick="renameAlbum();">save</a>
            </div>
            <div class="album-share"></div>
            <div id="progress_report">
                <div id="progress_report_name"></div>
                <div id="progress_report_status" style="font-style: italic;"></div>
                <div id="progress_report_bar_container">
                    <div id="progress_report_bar"></div>
                </div>
            </div>
        </div>
        <ul class="thumbs noscript">
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>placeholder.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>placeholder.jpg" alt="Title #0" />
                </a>
            </li>
        </ul>
    </div>
</div>