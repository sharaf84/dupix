<?php //pr($gals);?>
<?php echo $this->Javascript->link(array('front/jquery.jcarousel.min', 'front/jquery.easing', 'front/script', 'front/gallery-pro'), false); ?>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->Session->read('Setting.url').'/app/webroot/css/front/style1.css';?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->Session->read('Setting.url').'/app/webroot/css/front/skin2.css';?>" />
<script type="text/javascript" src="<?php echo $this->Session->read('Setting.url').'/app/webroot/js/front/jquery.js';?>"></script>
<script type="text/javascript" src="<?php echo $this->Session->read('Setting.url').'/app/webroot/js/front/animatedcollapse.js';?>"></script>
<script type="text/javascript" src="<?php echo $this->Session->read('Setting.url').'/app/webroot/js/front/jquery.jcarousel.min.js';?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo $this->Session->read('Setting.url').'/app/webroot/js/front/jquery.easing.js';?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo $this->Session->read('Setting.url').'/app/webroot/js/front/script.js';?>"></script>
<script type="text/javascript" src="<?php echo $this->Session->read('Setting.url').'/app/webroot/js/front/gallery-pro.js';?>" ></script>

<script type="text/javascript">
    $(document).ready(function(){
    });
</script>

<div class="school-in-gallery-right">
    <div id="jslidernews2" class="lof-slidecontent2" style="width:600px; height:510px; display:block;">
        <div class="preload"><div></div></div>
        <!-- MAIN CONTENT --> 
        <div class="main-slider-content" style="width:600px; height:425px;">
            <ul class="sliders-wrap-inner">
                <?php for ($i = 0 ; $i < sizeof($gals) ; $i++){?>
                <li>
                    <img src="<?php echo $this->Session->read('Setting.url') . '/img/upload/' . $gals[$i]['Gal']['image']; ?>" title="Newsflash 2" width="601" height="469" />           
                    <div class="slider-description"></div>
                </li> 
                <?php } ?>
            </ul>  	
        </div>
        <!-- END MAIN CONTENT --> 
        <!-- NAVIGATOR -->
        <div class="navigator-content" style="background:#004475;">
            <div  class="button-previous">Previous</div>
            <div class="navigator-wrapper">
                <ul class="navigator-wrap-inner">
                    <?php for ($i = 0 ; $i < sizeof($gals) ; $i++){?>
                    <li><img src="<?php echo $this->Session->read('Setting.url') . '/img/upload/' . $gals[$i]['Gal']['image']; ?>" width="104" height="65" /></li>
                    <?php } ?>

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
            