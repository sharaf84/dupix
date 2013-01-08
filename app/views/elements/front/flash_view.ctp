<?php echo $this->Javascript->link('front/AC_RunActiveContent');?>
<script type="text/javascript">
	AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','<?=$width;?>','height','<?=$height;?>','src','swf/banner','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','<?=$src?>'); //end AC code
</script>
<noscript>
<object
	classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
	codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0"
	width="<?=$width;?>" height="<?=$height;?>">
	<param name="movie" value="<?=$src.'swf';?>" />
	<param name="quality" value="high" />
	<param name="wmode" value="transparent" />
	<embed src="<?=$src.'swf';?>" width="<?=$width;?>" height="<?=$height;?>" quality="high"
		pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash"
		type="application/x-shockwave-flash" wmode="transparent"></embed>
</object>
</noscript>	



