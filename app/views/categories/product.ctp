<?php
if(!empty($products)){
	$url = '#loginForm';
	$class = 'inline';
	if(!empty($memberCookie)){
		$url = $this->Session->read('Setting.url').'/profile/createProject/'.$currentProduct['Product']['id'];
		$class = null;
	}
	//CSS & Scripts 
	echo $this->Html->css('front/featured_content_slider', null, array('inline' => false));
	echo $this->Javascript->link(array('front/jquery-easing-1.3.pack', 'front/jquery-easing-compatibility.1.2.pack', 'front/coda-slider.1.1.1.pack'), false);   
?>
<script type="text/javascript">
	var theInt = null;
	var $crosslink, $navthumb;
	var curclicked = 0;

	theInterval = function(cur) {
		clearInterval(theInt);

		if ( typeof cur != 'undefined')
			curclicked = cur;

		$crosslink.removeClass("active-thumb");
		$navthumb.eq(curclicked).parent().addClass("active-thumb");
		$(".stripNav ul li a").eq(curclicked).trigger('click');

		theInt = setInterval(function() {
			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
			$(".stripNav ul li a").eq(curclicked).trigger('click');
			curclicked++;
			if (6 == curclicked)
				curclicked = 0;

		}, 3000);
	};

	$(function() {

		$("#main-photo-slider").codaSlider();

		$navthumb = $(".nav-thumb");
		$crosslink = $(".cross-link");

		$navthumb.click(function() {
			var $this = $(this);
			theInterval($this.parent().attr('href').slice(1) - 1);
			return false;
		});

		theInterval();
	});
</script>
<div id="content">

	<div id="content_left">

		<div class="menu_category">

			<div class="link_title_category">
				<a href="#"><?php echo $products[0]['Section']['title'];?></a>
			</div>

			<div class="link_details_category">
				<?php foreach($products as $product){?>
				<a href="<?php echo $this->Session->read('Setting.url').'/categories/product/'.$product['Product']['id'];?>"><?php echo $product['Product']['title'];?></a>
				<br />
				<?php }?>
			</div>

		</div>

	</div>
	<div id="content_right">
		
		<div id="page-wrap">

			<div class="slider-wrap">
				<div id="main-photo-slider" class="csw">
				    <a href="<?php echo $url;?>" class="<?php echo $class;?>">	
						<div class="panelContainer">
							<?php 
							foreach($currentProduct['Gal'] as $gal){
								if($gal['position'] == 1) continue; //skip the current iteration of a loop
							?>
							<div class="panel" title="Panel 1">
								<div class="wrapper">
									<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/medium_'.$gal['image'];?>" alt="temp" width="710" height="380" />
								</div>
							</div>
							<?php }?>
						</div>
					</a>
				</div>
				
				<div id="movers-row">
					<?php 
					$i = 1;
					foreach($currentProduct['Gal'] as $gal){
						if($gal['position'] == 1) continue; //skip the current iteration of a loop.
					?>
					<a href="#<?php echo $i++;?>" class="cross-link"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/thumb_'.$gal['image'];?>" alt="temp-thumb" width="100" class="nav-thumb" /></a>
					<?php }?>
				</div>
			</div>

		</div>

		<div class="product_description" style="float:left;">

			<div class="product_description_title">
				<?php echo $currentProduct['Product']['title'];?>
				<?php echo $currentProduct['Product']['price'];?>EGP
			</div>
			<div class="product_description_title">
				<span class="createProject"><a href="<?php echo $url;?>" class="<?php echo $class;?>">Customize</a></span>
			</div>
			<div class="product_description_data">
				<?php echo $currentProduct['Product']['body'];?>
			</div>
		</div>
		<?php if(count($products) > 1){?>
		<div class="like_this_to">
			You'll like these too
		</div>
		
		<div class="cats">			
			<?php 
			$size = 'thumb_';
			$width = $this->Session->read('Setting.thumb_width');
			$height = $this->Session->read('Setting.thumb_height');
			$color = (!empty($products[0]['Section']['color']))?$products[0]['Section']['color']:'E1088B';
			foreach($products as $product){
				if($product['Product']['id'] == $currentProduct['Product']['id']) continue;
			?>
			<div class="cat">
				<div class="cat_image">
					<a href="<?php echo $this->Session->read('Setting.url').'/categories/product/'.$product['Product']['id'];?>">
						<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/'.$size.$product['Gal'][1]['image'];?>" width="<?php echo $width;?>" height="<?php echo $height;?>"/>
					</a>
				</div>
				<div class="cat_title" style="background-color: #<?php echo $color;?>; width: <?php echo $width;?>px">
					<a href="<?php echo $this->Session->read('Setting.url').'/categories/product/'.$product['Product']['id'];?>">
						<?php echo $product['Product']['title'];?>
					</a>
				</div>
			</div>
			<?php }?>			
		</div>
		<? }?>
	</div>
</div>
<?php }else echo 'No dat found!';?>