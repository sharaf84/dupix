<div id="content">

	<div id="content_left">

		<div class="menu_category">

			<div class="link_title_category">
				<a href="#">Categories</a>
			</div>

			<div class="link_details_category">
				<?php foreach($sections as $section){?>
				<a href="<?php echo $this->Session->read('Setting.url').'/categories/products/'.$section['Section']['id'];?>"><?php echo $section['Section']['title'];?></a>
				<br />
				<?php }?>
			</div>

		</div>

	</div>

	<div id="content_right">
		
		<div class="cats">
			<?php 
			$size = '';
			$width = "343";
			$height = "250";
			foreach($sections as $section){
				$color = (!empty($section['Section']['color']))?$section['Section']['color']:'E1088B';
				if($section['Section']['position'] > 2){
					$size = 'thumb_';
					$width = "220";
					$height = "160";
				}
			?>
			<div class="cat">
				<div class="cat_image">
					<a href="<?php echo $this->Session->read('Setting.url').'/categories/products/'.$section['Section']['id'];?>">
						<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/'.$size.$section['Section']['image'];?>" width="<?php echo $width;?>" height="<?php echo $height;?>" />
					</a>
				</div>
				<div class="cat_title" style="background-color: #<?php echo $color;?>; width: <?php echo $width;?>px">
					<a href="<?php echo $this->Session->read('Setting.url').'/categories/products/'.$section['Section']['id'];?>">
						<?php echo $section['Section']['title'];?>
					</a>
				</div>
			</div>
			<?php }?>			
		</div>

	</div>
</div>
