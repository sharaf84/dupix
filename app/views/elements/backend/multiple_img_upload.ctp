<?php
echo $this->Javascript->link('libs/swfobject.js', false);
//$path = $this->Session->read('Setting.url').'/'.strtolower($this->name).'/multipleImgUpload/'.$albumId;//multipleImgUpload at appController.
$path = isset($path)?$path:$this->Session->read('Setting.url').'/profile/multipleImgUpload/';
?>
<script type="text/javascript">
	var flashvars = {};
	flashvars.path = "<?php echo $path;?>";
	var params = {};
	params.menu = "false";
	params.scale = "noscale";
	params.salign = "tm";
	var attributes = {};
	attributes.align = "middle";
	
	swfobject.embedSWF("<?php echo $this->Session->read('Setting.url').'/app/webroot/files/multipleImgUpload/imgUpload.swf';?>", "flashHolder", "100%", "100%", "10.0.0", false, flashvars, params, attributes);
</script>
<div id='mainHolder' style='width:691px; height:261px;'>
	<div id="flashHolder">
		<a href="http://www.adobe.com/go/getflashplayer">
			<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
		</a>
	</div>
</div>