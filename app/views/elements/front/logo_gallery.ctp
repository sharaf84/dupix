<?php if(!empty($gallery)){?>
<?php
	echo $this->Html->css('front/skin', null, array('inline'=>false));
	//echo $this->Javascript->link('front/jquery-1.4.2.min'); 
	echo $this->Javascript->link('front/jquery.jcarousel.min');
?>
<script type="text/javascript">

function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        auto: 3,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});

</script>

<ul id="mycarousel" class="jcarousel-skin-tango">
	<?php 
		if(isset($from) && $from == 'profile'){
			foreach($gallery as $exhibitor){?>
            
        <li>
        	<div class="deleteIcon" title="Delete From Favorites" style="position:absolute; margin-left:170px; margin-top:0px;" onclick="deleteFromFavorites('<?php echo $exhibitor['Favorite']['id'];?>', $(this));"></div>
        	<a href="<?php echo $this->Session->read('Setting.url').'/'.Inflector::slug(strtolower($exhibitor['title']), '-');?>">
        		<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/'.$exhibitor['logo'];?>" alt="<?php echo $exhibitor['title'];?>" title="<?php echo $exhibitor['title'];?>" width="206" height="136" border="0" />
            </a>
        </li>
	<?php }}else{
		foreach($gallery as $exhibitor){?>
        <li>
        	<a href="<?php echo $this->Session->read('Setting.url').'/'.Inflector::slug(strtolower($exhibitor['Exhibitor']['title']), '-');?>">
        		<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/'.$exhibitor['Exhibitor']['logo'];?>" alt="<?php echo $exhibitor['Exhibitor']['title'];?>" title="<?php echo $exhibitor['Exhibitor']['title'];?>" width="206" height="136" border="0" />
            </a>
        </li>
	<?php }}?>  
</ul>
<?php }?>