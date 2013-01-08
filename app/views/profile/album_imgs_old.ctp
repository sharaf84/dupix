<?php if(!empty($albumImgs)){
//CSS & Scripts 
echo $this->Html->css(array('front/image-slideshow-5', 'front/jquery.fancybox-1.3.1'), null, array('inline' => false));
echo $this->Javascript->link(array('front/image-slideshow-5', 'front/jquery.mousewheel-3.0.2.pack', 'front/jquery.fancybox-1.3.1'), false);   
?>
<script type="text/javascript">
	$(document).ready(function() {

		$("a[rel=example_group]").fancybox({
			'transitionIn' : 'none',
			'transitionOut' : 'none',
			'titlePosition' : 'over',
			'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
				return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
			}
		});

		/*
		 *   Examples - various
		 */

		$("#various3").fancybox({
			'width' : '75%',
			'height' : '75%',
			'autoScale' : false,
			'transitionIn' : 'none',
			'transitionOut' : 'none',
			'type' : 'iframe'
		});
		
		initGalleryScript();
		
	});	
</script>
<div id="mainContainer">
	<!-- Start of slideshow markup -->
	<div id="DHTMLgoodies_panel_one">
		<div id="DHTMLgoodies_thumbs">
			<div id="DHTMLgoodies_thumbs_inner">
				<!-- This is where you put your small thumbnails -->
				
				<!-- This is the div for one vertical strip of images -->
				<div class="strip_of_thumbnails">
					<?php 
					$i = 1; $firstImg = '';
					foreach($albumImgs as $img){
						if($i == 1) $firstImg = $img['Gal']['image'];
					?>
					<div>
						<div class="actionsIcons">
							<div class="deleteIcon" style="position: absolute; " title="Delete" onclick="deleteImg('<?php echo $img['Gal']['id'];?>', $(this));"></div>
						</div>
						<a href="#" onclick="showPreview2('<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/thumb_'.$img['Gal']['image'];?>',this);return false;">
							<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/thumb_'.$img['Gal']['image'];?>" width="105" height="70" />
						</a>
					</div>
					<?php 
						if($i++ % 3 == 0)
							echo '</div><div class="strip_of_thumbnails">';
					}
					?>
				</div>
				<!-- End where you put your small thumbnails -->
			</div>
		</div>
		<!-- Arrow images - You can change the "src", but not the "id" -->
		<div id="DHTMLgoodies_arrows">
			<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>arrow_left.gif" name="DHTMLgoodies_leftArrow" width="22" height="18" class="leftArrow" id="DHTMLgoodies_leftArrow">
			<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>arrow_right.gif" name="DHTMLgoodies_rightArrow" width="22" height="18" class="rightArrow" id="DHTMLgoodies_rightArrow">
		</div>
	</div>
	<!-- Large image div -->
	<div id="DHTMLgoodies_largeImage">
		<!-- Table is used to get both vertical and horizontal center alignment -->
		<a rel="example_group" href="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/thumb_'.$firstImg;?>">
			<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/thumb_'.$firstImg;?>" alt="" width="450"/>
		</a>
	</div>
	<!-- End of slideshow markup -->

	<div class="clear"></div>
</div>
<?php }?>