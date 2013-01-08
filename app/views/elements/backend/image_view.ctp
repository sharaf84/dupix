<?php
	if(!empty($data['image'])){
		//echo CSS & scripts
		echo $this->Html->css('lightbox/jquery.lightbox', null, array('inline'=>false));
		echo $this->Javascript->link('lightbox/jquery.lightbox.js', false);
        //set vars        
        $title = !empty($data['caption'])?$data['caption']:'';
        $size = !empty($data['size'])?$data['size'].'_':'';               		
		echo $this->Html->link(
	        $this->Html->image('upload/'.$size.$data['image'], array('title'=> __('Click to enlarge', true), 'border' => '0')), 
	        $this->Session->read('Setting.url').'/app/webroot/img/upload/'.$data['image'],
	        array('target' => '_blank', 'escape' => false, 'class'=>'lightbox', 'title'=>$title, 'rel'=>'group1'));
		echo '<div class = "options">';
        if(!empty($delete))										
            echo $this->Html->link(__('Delete', true), array('action' => '/deleteFile/'.$delete['model'].'/'.$delete['id'].'/'.$delete['field']), null, __('Are you sure you want to delete this image?', true));
        if(!empty($crop)){
            $pass = $data['image'];
            if(!empty($crop['size'])){
                $pass.= '/'.$crop['size'];
                if(!empty($crop['width']) && !empty($crop['height']))
                    $pass.=  '/'.$crop['width'].'/'.$crop['height'];                     
            }
            echo $this->Html->link(__(' | Crop', true), array('controller' => 'images', 'action'=>'view', $pass));					
        }
		echo '</div>';
	}
	else echo __('No image', true);	 
?>
