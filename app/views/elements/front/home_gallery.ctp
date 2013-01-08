<?php if(!empty($gallery)){?>
	<?php 
        echo $this->Html->css('front/home_gallery', null, array('inline'=>false));
        //echo $this->Javascript->link('front/jquery');
    ?>
    <div style="z-index:1" id="wowslider-container1">
        <div class="ws_images">
        	<?php foreach($gallery as $product){?>
            <a href="<?php echo $this->Session->read('Setting.url').'/categories/details/'.$product['Product']['id'].'/'.Inflector::slug(strtolower($product['Exhibitor']['title']), '-').'/'.Inflector::slug(strtolower($product['Product']['title']), '-').'/Product.section_id:'.$product['Product']['section_id'].'/Product.cat_id:'.$product['Product']['cat_id'];?>">
                <img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/large_'.$product['Product']['image'];?>" alt="<?php echo $product['Product']['title'];?>" width="700" height="310" id="wows<?php echo $product['Product']['id'];?>" title="<?php echo $product['Cat']['title'].' By '.$product['Exhibitor']['title'];?>"/>
            </a>
        	<?php }?>
        </div>
        <div class="ws_bullets">
            <div>
            	<?php
				$count = 1; 
				foreach($gallery as $product){
				?>
                <a href="#wows<?php echo $product['Product']['id'];?>" title="<?php echo $product['Product']['title'];?>">
                    <img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/thumb_'.$product['Product']['image'];?>" alt="<?php echo $product['Product']['title'];?>" id="wows<?php echo $product['Product']['id'];?>" title="<?php echo $product['Product']['title'];?>"/>
                    <?php echo $count++;?>
                </a>
                <?php }?>
            </div>
        </div>
    </div>
    <?php echo $this->Javascript->link('front/script');?>
<?php }?>

	