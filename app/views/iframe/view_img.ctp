<?php 
    //echo $this->Javascript->link('libs/jquery');
	echo $this->Javascript->link('crop/jquery.imgareaselect-0.3.min', true);
	//echo $this->Html->link(__('Crop thumb image', true), array('action' => 'view', $imageName, 'thumb'));
	//echo ' | ';
	//echo $this->Html->link(__('Crop medium image', true), array('action' => 'view', $imageName, 'medium'));
	//echo ' | ';
	//echo $this->Html->link(__('Crop large image', true), array('action' => 'view', $imageName, 'large'));
	//echo ' | ';
	//echo $this->Html->link(__('Back', true), $this->Session->read('returnUrl'));
	echo $this->Form->create('Image', array('url' => $this->Session->read('Setting.url')."/iframe/cropImg/$size/$cropWidth/$cropHeight", "enctype" => "multipart/form-data")); 
	echo $this->Form->submit('Crop', array("id"=>"save_thumb")); 
	echo $this->Cropimage->createJavaScript($imageWidth, $imageHeight, $cropWidth, $cropHeight);
	echo $this->Cropimage->createForm($imageName, $cropWidth, $cropHeight, $size, $imageDir);
   //echo $this->Session->setFlash;
   // if($this->Session->setFlash==Done) echo "<script>alert('done');</script>"; 
?>
	<script type="text/javascript">
		$(function()
		{
		var w=$('.message').text();
		if(w=='Done.'){
			$('#master').hide(1000);
			$('.showmaster').show();
		}
	  //alert('done');
		});
	</script>