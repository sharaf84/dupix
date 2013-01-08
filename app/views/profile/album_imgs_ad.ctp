<?php if(!empty($albumImgs)){
//CSS & Scripts 
echo $this->Html->css('front/jquery.ad-gallery', null, array('inline' => false));
echo $this->Javascript->link('front/jquery.ad-gallery', false);   
?>
<script type="text/javascript">
	$(document).ready(function() {

		var galleries = $('.ad-gallery').adGallery();

		$('.albumLink a').click(function() {
			var id = $(this).parent().attr('id').substr(5);
			$.ajax({
				type: "POST",
				data: 'album_id='+id,
				url: siteUrl+'/profile/getAlbumImgs',
				dataType: "json",
				beforeSend: function(){
					//$('.ad-image-wrapper div').remove();
					$('.ad-image').remove();
					$('.ad-loader').show();
					$('ul.ad-thumb-list li').remove();
					
				},
				success:function(result){
					galleries[0].removeAllImages();
					if(result){
						var sec = 0;
						$.each(result, function(id, image){
							setTimeout(function() {
								galleries[0].addImage(siteUrl+'/app/webroot/img/upload/thumb_'+image, siteUrl+'/app/webroot/img/upload/medium_'+image);
							}, sec);
							sec = sec + 1000;
						});
						setTimeout(function() {
							galleries[0].showImage2(0);
							$('.ad-loader').hide();
						}, sec);
					}else
						alert('No img found');
				}
			});
			return false;
		});
	});
		<?php /*
		setTimeout(function() {
			galleries[0].addImage("<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>t7.jpg", "<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>7.jpg");
		}, 1000);
		setTimeout(function() {
			galleries[0].addImage("<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>t8.jpg", "<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>8.jpg");
		}, 2000);
		setTimeout(function() {
			galleries[0].addImage("<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>t9.jpg", "<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>9.jpg");
		}, 3000);
		setTimeout(function() {
			galleries[0].removeImage(1);
		}, 4000);
		
		$('#switch-effect').change(function() {
			galleries[0].settings.effect = $(this).val();
			return false;
		});
		$('#toggle-slideshow').click(function() {
			galleries[0].slideshow.toggle();
			return false;
		});
		$('#toggle-description').click(function() {
			if (!galleries[0].settings.description_wrapper) {
				galleries[0].settings.description_wrapper = $('#descriptions');
			} else {
				galleries[0].settings.description_wrapper = false;
			}
			return false;
		});
		*/?>
	

</script>

<div id="gallery" class="ad-gallery">
	<div class="ad-image-wrapper"></div>
	<div class="ad-controls"></div>
	<div class="ad-nav">
		<div class="ad-thumbs">
			<ul class="ad-thumb-list" style="height: 75px">
				<?php
				$i = 0; 
				foreach($albumImgs as $img){
				?>
				<li>
					<a href="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/medium_'.$img['Gal']['image'];?>"> 
						<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/thumb_'.$img['Gal']['image'];?>" height="60" class="image<?php $i++;?>"> 
					</a>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>

<?php }?>