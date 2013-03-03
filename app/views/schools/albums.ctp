<?php //pr($gals);?>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->Session->read('Setting.url').'/app/webroot/css/front/style1.css';?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->Session->read('Setting.url').'/app/webroot/css/front/skin2.css';?>" />
<script type="text/javascript" src="<?php echo $this->Session->read('Setting.url').'/app/webroot/js/front/jquery.js';?>"></script>
<script type="text/javascript" src="<?php echo $this->Session->read('Setting.url').'/app/webroot/js/front/animatedcollapse.js';?>"></script>
<script type="text/javascript" src="<?php echo $this->Session->read('Setting.url').'/app/webroot/js/front/jquery.jcarousel.min.js';?>"></script>
<script type="text/javascript" src="<?php echo $this->Session->read('Setting.url').'/app/webroot/js/front/gallery-pro.js';?>" ></script>

<script type="text/javascript">
    $(document).ready(function(){
    });
</script>
       
        
            <div class="school-in-gallery-left" style="background:#E10109;">
                <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
                    <?php for ($i = 0 ; $i < sizeof($albums) ; $i++) { ?>
                    <li class="album"><a href="" data-id="<?php echo $albums[$i]['Album']['id']; ?>"><div class="vert-album"><?php echo $albums[$i]['Album']['title']; ?></div></a></li>
                    <?php } ?>
                </ul>
            </div>
            