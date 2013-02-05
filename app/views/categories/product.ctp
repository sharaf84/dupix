<?php 
if(!empty($product)){
    $color = '#'.$product['Section']['color'];
    echo $this->Javascript->link(array('front/jquery.easing', 'front/script', 'front/gallery-pro'), false); 
?>
<style>
    .img-border {
        border: solid 10px <?php echo $color;?>;
    }
    
    .lof-slidecontent ul.navigator-wrap-inner li.active img, .lof-slidecontent ul.navigator-wrap-inner li:hover img {
        border: solid 3px <?php echo $color;?>;
        padding: 0;
    }
</style>
<div id="contain">
    <div id="container">
        <div class="product-gallery">
            <div id="jslidernews1" class="lof-slidecontent" style="width:720px; height:800px;">
                <div class="preload"><div></div></div>
                <!-- MAIN CONTENT --> 
                <div class="main-slider-content" style="width:720px; height:800px;">
                    <ul class="sliders-wrap-inner">
                        <!-- Parent Product -->
                        <li>
                            <img src="<?php echo $this->Session->read('Setting.url') . '/img/upload/'.$product['Product']['slide_image'] ; ?>" class="img-border" title="Newsflash 2" >           
                            <div class="slider-description">
                                <div class="product-info">
                                    <div class="product-info-top">
                                        <div class="product-info-top-left">
                                            <div class="product-info-tit"><?php echo $product['Product']['title'];?> <?php echo $product['Product']['price'];?> LE</div>
                                            <div class="product-info-desc"><?php echo $product['Product']['body'];?></div>
                                        </div>
                                        <div class="product-info-top-right">
                                            <div class="product-share"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/' ; ?>pro-share.jpg" width="121" height="31" border="0" /></a></div>
                                            <div class="create"><a href="#">CREATE CANVAS NOW</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Child Products -->
                        <?php foreach($product['Child'] as $child){?>
                        <li>
                            <img src="<?php echo $this->Session->read('Setting.url') . '/img/upload/'.$child['slide_image'] ; ?>" class="img-border" title="Newsflash 2" >           
                            <div class="slider-description">
                                <div class="product-info">
                                    <div class="product-info-top">
                                        <div class="product-info-top-left">
                                            <div class="product-info-tit"><?php echo $child['title'];?> <?php echo $child['price'];?> LE</div>
                                            <div class="product-info-desc"><?php echo $child['body'];?></div>
                                        </div>
                                        <div class="product-info-top-right">
                                            <div class="product-share"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/' ; ?>pro-share.jpg" width="121" height="31" border="0" /></a></div>
                                            <div class="create"><a href="#">CREATE CANVAS NOW</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php }?>
                    </ul>  	
                </div>
                <!-- END MAIN CONTENT --> 
                <!-- NAVIGATOR -->
                <div class="navigator-content">
                    <div  class="button-previous">Previous</div>
                    <div class="navigator-wrapper">
                        <ul class="navigator-wrap-inner">
                            <li><img src="<?php echo $this->Session->read('Setting.url') . '/img/upload/'.$product['Product']['slide_image'] ; ?>" class="img-border" /></li>
                            <?php foreach($product['Child'] as $child){?>
                            <li><img src="<?php echo $this->Session->read('Setting.url') . '/img/upload/'.$child['slide_image'] ; ?>" class="img-border" /></li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="button-next">Next</div>
                </div> 
                <!----------------- END OF NAVIGATOR --------------------->
                <!-- BUTTON PLAY-STOP -->
                <div class="button-control"><span></span></div>
                <!-- END OF BUTTON PLAY-STOP -->

            </div>
        </div>
    </div>
</div>
<?php }else echo '<div class="no_data">No dat found!</div>'; ?>