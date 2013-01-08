<?php
//CSS & Scripts 
echo $this->Html->css(array('front/slide'), null, array('inline' => false));
echo $this->Javascript->link(array('rotator/stepcarousel', 'front/step1'), false);   
?>

<?php if ($this->action == 'albums'){?>
	
<script type="text/javascript">
	$(document).ready(function(){
		//get first album imgs
		getAlbumImgs(getFirstAlbumId());
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

<div id="inAlbums" class="product_image">
	<img id="imgView" src="#" />		
</div>
<?php }?>

<div id="innerRightPart_1">
	<div id="innerSlidshow">
		<div id="galleryb" class="stepcarousel">
			<div class="belt">
				<div style="width: 710px; text-align: center;">
					<div id="galLoading" class="ajaxLoading" style="width: 400px; margin-left: 310px;"></div>
					<div id="galResult" class="ajaxResult">No image found!</div>
				</div>
				<?php for($i=0; $i<40; $i++){ //Make stepcarousel build fake start ?>
				<div class="panel"><img src="#" width="100"></div>
				<?php }?>
			</div>
		</div>
		<div id="left-arrw">
			<a href="javascript:stepcarousel.stepBy('galleryb',%20-1)"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>leftArrow.png" width="23" height="23" border="0" /></a>
		</div>
		<div id="right-arrw">
			<a href="javascript:stepcarousel.stepBy('galleryb',%201)"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>rightArrow.png" width="23" height="23" border="0" /></a>
		</div>
	</div>
</div>