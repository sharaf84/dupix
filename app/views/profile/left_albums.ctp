<script type="text/javascript">
	$(document).ready(function(){
		$(".link_details_category a").click(function(){
			if($(this).attr('class') == 'showIcons')
				$('.actionsIcons').slideToggle();
			else
				$('.actionsIcons').hide();
		});
	});
</script>
<!-- This contains the hidden content for inline calls -->
<div style="display:none">
	
	<div id="addAlbum" style="padding:10px; background:#fff; height: 100px;">
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
	<div id="uploadImages" style="padding: 10px; background: #fff;">
		<fieldset>
	 		<legend><?php __('Upload Images'); ?></legend>
			<?php echo $this->element('backend/multiple_img_upload');?>
		</fieldset>
	</div>
</div>

<div class="menu_category">

	<div class="link_title_category">
		<a href="#">My Albums</a>
	</div>
	
	<div class="link_details_category">
		<div class="albumsLinks">
			<?php 
			$uploadImagesLinkStyle = 'display: none;';
			if(!empty($member['Album'])){
				$uploadImagesLinkStyle = 'display: block;';
				foreach($member['Album'] as $album){
			?>
			<div class="albumLink" id="album<?php echo $album['id'];?>">
				<a href="#" onclick="getAlbumImgs(<?php echo $album['id'];?>); return false;">
					<?php echo $album['title'];?>
				</a>
				<input type="text" value="<?php echo $album['title'];?>">
				<div class="actionsIcons">
					<div class="editIcon" title="Edit" onclick="editAlbum('<?php echo $album['id'];?>', $(this));"></div>
					<div class="deleteIcon" title="Delete" onclick="deleteAlbum('<?php echo $album['id'];?>', $(this));"></div>
				</div>
			</div>
			<?php }}?>
		</div>
		<div class="albumsActions">
			<br />
			<span class="link_edit_delete"><a href="#" class="showIcons"><strong>Edit/Delete</strong></a></span>
			<br />
			<a href="#addAlbum" class="inline link_add"><strong>Add New Album</strong></a>
			<br />
			<a href="#uploadImages" class="inline link_upload" id="uploadImagesLink" style="<?php echo $uploadImagesLinkStyle;?>"><strong>Upload Images</strong></a>
			<br />
		</div>
	</div>

</div>