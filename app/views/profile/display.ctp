<div id="content">
	<div id="content_left">
		<?php include_once ('left_albums.ctp');?>
	</div>
	<div id="content_right">
		<?php 
		include_once ('album_imgs.ctp');
		if(($this->action == 'createProject') || ($this->action == 'editProject'))
			include_once ('create_project.ctp');
		?>
	</div>
</div>
