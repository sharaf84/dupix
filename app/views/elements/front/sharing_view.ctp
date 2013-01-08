<?php 
$onClick = '';
$class = '';
$type = isset($type)?$type:'default';
$size = isset($size)?$size:'small';
if($size == 'large')
	$class = 'addthis_32x32_style';
if(isset($articleId)){
	echo $this->Javascript->link('front/ajax/sharing', false); 
	$onClick = "updateShared('".$articleId."', '".$this->Session->read('Setting.url')."')";
}
?>
<div id="sharingDiv" onclick="<?php echo $onClick;?>">
    <!-- AddThis Button BEGIN -->
    <div class="addthis_toolbox addthis_default_style <?php echo $class;?>"> <!-- For large icons add this class addthis_32x32_style-->
    <?php if($type == 'default'){?>
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_google"></a>
        <a class="addthis_button_email"></a>
        <a class="addthis_button_compact"></a>
        <!--<a id="sharedCount" class="addthis_counter addthis_bubble_style"></a>-->
    <?php }elseif($type == 'like'){?>
        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
        <!--<a class="addthis_button_tweet"></a>-->
       <!-- <a class="addthis_counter addthis_pill_style"></a>-->
    <?php }?>    
    </div>

	<script type="text/javascript">var addthis_config = {data_ga_property: 'UA-26708176-1', data_ga_social : true};</script>
    <script type="text/javascript">var addthis_config = {data_track_clickback:true};</script>
    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ef2f8b523f36440"></script>
</div>