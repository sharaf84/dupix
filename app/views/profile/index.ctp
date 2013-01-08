<script type="text/javascript">
	$(document).ready(function(){
		//$("#albumsLinks a:first").addClass('current')
	});
	
</script>

<!-- This contains the hidden content for inline calls -->
<div style='display:none'>
	
	<div id='addAlbum' style='padding:10px; background:#fff; height: 100px;'>
		<div class="albums form">
			<?php echo $this->Form->create('Album', array('url'=>$this->Session->read('Setting.url').'/profile/addAlbum', 'id'=>'addAlbumForm'));?>
			<fieldset>
		 		<legend><?php __('Add New Album');?></legend>
			<?php echo $this->Form->input('title');?>
			</fieldset>
			<?php echo $this->Form->end(__('Add', true));?>
			<div id="albumLoading" class="ajaxLoading"></div>
			<div id="albumResult" class="ajaxResult"></div>
		</div>
	</div>
	<?php 
	if($albumId){
	?>
	<div id='uploadImages' style='padding: 10px; background: #fff;'>
		<fieldset>
	 		<legend><?php __('Upload Images'); ?></legend>
			<?php echo $this->element('backend/multiple_img_upload', array('albumId'=>$albumId));?>
		</fieldset>
	</div>
	<?php }?>
</div>
<div id="content">
	<div id="content_left">

		<div class="menu_category">

			<div class="link_title_category">
				<a href="#">My Albums</a>
			</div>
			
			<div class="link_details_category">
				<div class="albumsLinks">
					<?php 
					foreach($member['Album'] as $album){
					?>
					<div class="albumLink" id="album<?php echo $album['id'];?>">
						<a href="<?php echo $this->Session->read('Setting.url').'/profile/index/album_id:'.$album['id'];?>" class="<?php echo ($albumId == $album['id'])?'current':'';?>">
							<?php echo $album['title'];?>
						</a>
						<input type="text" value="<?php echo $album['title'];?>">
						<div class="actionsIcons">
							<div class="editIcon" title="Edit" onclick="editAlbum('<?php echo $album['id'];?>', $(this));"></div>
							<div class="deleteIcon" title="Delete" onclick="deleteAlbum('<?php echo $album['id'];?>', $(this));"></div>
						</div>
					</div>
					<?php }?>
				</div>
				<div class="albumsActions">
					<br />
					<a href="#" class='showIcons' onclick="$('.actionsIcons').slideToggle();">Edit/Delete</a>
					<br />
					<a href="#addAlbum" class='inline' ><strong>Add New Album</strong></a>
					<br />
					<a href="#uploadImages" class="inline"><strong>Upload Images</strong></a>
					<br />
				</div>
			</div>

		</div>

	</div>
	<div id="content_right">
		<div id="albumImgs">
			<?php include_once ('album_imgs.ctp');?>
		</div>
	</div>
	
</div>
