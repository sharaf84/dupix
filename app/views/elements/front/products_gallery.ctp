<?php if(!empty($gallery)){?>
<div style="z-index:1" id="gallery" class="ad-gallery">
  <div class="ad-nav">
    <div class="ad-thumbs">
      <ul class="ad-thumb-list">
		<?php
		/* onclick="displayProduct('<?php echo $product['Product']['id'];?>');" */
		$imgIndex = 0; $index = -1;
		foreach($products as $product){
			$index++;
			if($product['Product']['id'] == $this->params['pass'][0])
				$imgIndex = $index;
			if(!empty($product['Product']['image'])){
		?>
        <li>
            <a href="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/medium_'.$product['Product']['image'];?>" onclick="displayProduct('<?php echo $product['Product']['id'];?>', '<?php echo $this->Session->read('Setting.title').': '.$product['Product']['title'];?>');">
                <img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/thumb_'.$product['Product']['image'];?>" width="90" height="60" class="image1">
            </a>
        </li>
        <?php }}?>
      </ul>
    </div>
  </div>
  <!--<div style="z-index:1" class="ad-image-wrapper"></div>-->
</div>
<?php
	echo $this->Html->scriptBlock("var imgIndex ='".$imgIndex."';");//Define global var siteUrl
	echo $this->Javascript->link('front/jquery.ad-gallery.pack', false); 
	echo $this->Javascript->link('front/jquery.ad-gallery', false);
	echo $this->Javascript->link('front/ajax/products', false);
	echo $this->Html->css('front/jquery.ad-gallery', null, array('inline'=>false));
?>
<script type="text/javascript">
$(function() {
	//$('img.image1').data('ad-desc', 'Whoa! This description is set through elm.data("ad-desc") instead of using the longdesc attribute.<br>And it contains <strong>H</strong>ow <strong>T</strong>o <strong>M</strong>eet <strong>L</strong>adies... <em>What?</em> That aint what HTML stands for? Man...');
	//$('img.image1').data('ad-title', 'Title through $.data');
	var galleries = $('.ad-gallery').adGallery();
	$('#switch-effect').change(	  	
	  function() {
		galleries[0].settings.effect = $(this).val();
		return false;
	  }
	);
	$('#toggle-slideshow').click(
	  function() {
		galleries[0].slideshow.toggle();
		return false;
	  }
	);
	
	
});
//Sharaf
$(document).ready(function(){
	//updateProductViewed for url product.(AJAX)
	updateProductViewed(<?php echo $this->params['pass'][0];?>);
});
function displayProduct(id, title){
	//Show_Hide products
	$(".productClass").fadeOut('slow');
	$("#product_"+id).fadeIn('slow');
	//change title tag
	$('title').text(title);
	//updateProductViewed for displayed product.(AJAX)
	updateProductViewed(id);
	
}

</script>
<?php }?>