<?php if(!empty($products)){?>
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
		
		<div class="cats">			
			<?php 
			$size = 'medium_';
			$width = $this->Session->read('Setting.medium_image_width');
			$height = $this->Session->read('Setting.medium_image_height');
			$color = (!empty($products[0]['Section']['color']))?$products[0]['Section']['color']:'E1088B';
			foreach($products as $product){
				if($product['Product']['position'] > 1){
					$size = 'thumb_';
					$width = $this->Session->read('Setting.thumb_width');
					$height = $this->Session->read('Setting.thumb_height');
				}
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

	</div>
</div>
<?php }else echo 'No dat found!';?>