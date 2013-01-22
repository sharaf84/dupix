<?php header( 'Location: admin' ) ;echo $this->Javascript->link('front/jquery.pikachoose'); //make jquery conflict ?>
<div id="gallery_slider">
	<div class="pikachoose">
		<ul id="pikame" >
			<?php 
			foreach($gals as $gal){
				if(!empty($gal['Gal']['image'])){
			?>
			<li>
				<a href="<?php echo $this->Session->read('Setting.url').'/categories/product/'.$gal['Gal']['product_id'];?>">
					<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/large_'.$gal['Gal']['image'];?>" width="883" height="402"/>
				</a>
				<span><?php echo $gal['Gal']['caption'];?></span>
			</li>
			<?php }}?>
		</ul>
	</div>
</div>

<div id="media_offers">

	<div class="media">
		<?php 
		if(!empty($video['Video']['file']))
			echo $this->element('backend/video_player_view', array('video'=>$video['Video']));
		elseif(!empty($video['Video']['url']))
			echo $this->element('backend/tube_view', array('video'=>$video['Video']));
		?>
	</div>
	
	<div class="offers">
		<?php if(!empty($hot['Gal']['image'])){?>
		<a href="<?php echo $this->Session->read('Setting.url').'/categories/product/'.$hot['Gal']['product_id'];?>">
			<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/medium_'.$hot['Gal']['image'];?>" width="420"/>
		</a>
		<?php }?>
	</div>
</div>