<?php if ($this->action == 'albums'){?>
	
<script type="text/javascript">
	$(document).ready(function(){
		//get first album imgs
		//getAlbumImgs(getFirstAlbumId());
	});
	
	function showImg(obj){
		if(obj.length == 0){
			$('#inAlbums').hide();
		}else{
			$('#inAlbums').show();
			$('.panel img').removeClass('current');
			obj.addClass('current');
			var currentSrc = obj.attr('src').replace("upload/thumb_", "upload/medium_");
			$('#imgView').fadeOut('1000', function(){
				$(this).attr({src: currentSrc, name: obj.attr('name')}).fadeIn('1000');
			});
		}
	}
</script>

<!--<div id="inAlbums" class="product_image">
	<img id="imgView" src="#" />		
</div>


<div id="innerRightPart_1">
	<div id="innerSlidshow">
		<div id="galleryb" class="stepcarousel">
			<div class="belt">
				<div style="width: 710px; text-align: center;">
					<div id="galLoading" class="ajaxLoading" style="width: 400px; margin-left: 310px;"></div>
					<div id="galResult" class="ajaxResult">No image found!</div>
				</div>
				<?php //for($i=0; $i<40; $i++){ //Make stepcarousel build fake start ?>
				<div class="panel"><img src="#" width="100"></div>
				<?php //}?>
			</div>
		</div>
		<div id="left-arrw">
			<a href="javascript:stepcarousel.stepBy('galleryb',%20-1)"><img src="<?php //echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>leftArrow.png" width="23" height="23" border="0" /></a>
		</div>
		<div id="right-arrw">
			<a href="javascript:stepcarousel.stepBy('galleryb',%201)"><img src="<?php //echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>rightArrow.png" width="23" height="23" border="0" /></a>
		</div>
	</div>
</div>-->
<?php }?>
<div class="profile-gallery">
    <div id="gallery" class="content">
        <div class="slideshow-container">
            <div id="loading" class="loader"></div>
            <div id="slideshow" class="slideshow"></div>
            <div id="caption" class="caption-container"></div>
        </div>
        <div class="vote-select">
            <div class="img-vote">
                <div class="img-vote-tit">Vote for this picture:</div>
                <div class="img-voteing"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>vote.jpg" width="130" height="23" border="0" /></a></div>
            </div>
            <a href=""><div class="img-select">SELECT THIS PICTURE</div></a>
        </div>
    </div>
    <div id="thumbs" class="navigation">
        <div class="album-tit-share">
            <div class="album-title">Personal Pics</div>
            <div class="album-share">
                <div class="album-share-tit">Share Album</div>
                <div class="album-share-items"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-share.jpg" width="124" height="21" border="0" /></a></div>
            </div>
            <div id="progress_report">
                <div id="progress_report_name"></div>
                <div id="progress_report_status" style="font-style: italic;"></div>
                <div id="progress_report_bar_container" style="width: 90%; height: 5px;">
                    <div id="progress_report_bar" style="background-color: greenyellow; width: 0; height: 100%;"></div>
                </div>
            </div>
        </div>
        <ul class="thumbs noscript">
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                </a>
                <div class="caption">
                    <div class="image-title">
                        <a href="#">MOVE</a>
                        <a href="#">COPY</a>
                        <a href="#">DELETE</a>
                        <a href="#">SHARE</a>
                    </div>
                    <div class="image-desc"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-share.jpg" width="124" height="21" border="0" /></a></div>
                </div>
            </li>
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                </a>
                <div class="caption">
                    <div class="image-title">Title #0</div>
                    <div class="image-desc">Description</div>
                </div>
            </li>
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                </a>
                <div class="caption">
                    <div class="image-title">Title #0</div>
                    <div class="image-desc">Description</div>
                </div>
            </li>
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                </a>
                <div class="caption">
                    <div class="image-title">Title #0</div>
                    <div class="image-desc">Description</div>
                </div>
            </li>
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                </a>
                <div class="caption">
                    <div class="image-title">Title #0</div>
                    <div class="image-desc">Description</div>
                </div>
            </li>
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                </a>
                <div class="caption">
                    <div class="image-title">Title #0</div>
                    <div class="image-desc">Description</div>
                </div>
            </li>
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                </a>
                <div class="caption">
                    <div class="image-title">Title #0</div>
                    <div class="image-desc">Description</div>
                </div>
            </li>
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                </a>
                <div class="caption">
                    <div class="image-title">Title #0</div>
                    <div class="image-desc">Description</div>
                </div>
            </li>
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                </a>
                <div class="caption">
                    <div class="image-title">Title #0</div>
                    <div class="image-desc">Description</div>
                </div>
            </li>
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                </a>
                <div class="caption">
                    <div class="image-title">Title #0</div>
                    <div class="image-desc">Description</div>
                </div>
            </li>
            <li>
                <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                    <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                </a>
                <div class="caption">
                    <div class="image-title">Title #0</div>
                    <div class="image-desc">Description</div>
                </div>
            </li>
        </ul>
    </div>
        
</div>