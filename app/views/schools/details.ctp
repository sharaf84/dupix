<?php //pr($albumsOfFirst);die();?>
<?php echo $this->Javascript->link(array('front/jquery.jcarousel.min', 'front/jquery.easing', 'front/script', 'front/gallery-pro'), false); ?>
<script type="text/javascript">
    $(document).ready(function(){
        var aId = $('li.album:first a').attr('data-id');
        $.ajax({
            url: "http://dupix.local/schools/gallaries/" + aId
        }).done(function(data) {
            $("#gal").html( data );
        });
        
        $('a.grade').click(function(){
            var gradeId = $(this).attr('data-id');
            $('a.grade').removeClass('selected');
            $(this).addClass('selected');
            
            $.ajax({
                url: "http://dupix.local/schools/albums/" + gradeId
            }).done(function(data) {
                $("#albums").html( data );
            });
        
            return false;
        });
        
        $("#albums").delegate("li.album a", "click", function() {
//        $('li.album a').click(function(){
            var albumId = $(this).attr('data-id');
            console.log($(this));
            $.ajax({
              url: "http://dupix.local/schools/gallaries/" + albumId
            }).done(function(data) {
                  $("#gal").html( data );
                });
                return false;
        });
        
        
        
//        $('a.branche-logo').click(function(){
//            $('a.branche-logo img').removeClass('selected');
//            $(this).children('img').addClass('selected');
//            
//            //Show discription of hte clicked branch
//            var id = $(this).attr('id');
//            $('.school-desc').css('display', 'none');
//            $('#school-desc-' + id).css('display', 'block');
//            
//            return false;
//        });
//        
//        $('#main-school').click(function(){
//            $('a.branche-logo img').removeClass('selected');
//            $('.school-desc').css('display', 'none');
//            $('#school-desc').css('display', 'block');
//        });
        
        
    });
</script>
<div id="contain">
    <div id="container">
        <div class="school-logos">
            <div id="main-school" class="school-logo-left"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/' . $members[0]['Member']['logo'];?>" width="235" height="235" border="0" /></div>
            <div class="school-logos-right">
                <div class="schools-logos">
                    <?php for ($i = 0 ; $i < sizeof($members[0]['ChildMember']) ; $i++){?>
                    <a id="<?php echo $i;?>" href="#" class="branche-logo" style="outline: none;"><img class="" src="<?php echo $this->Session->read('Setting.url') .'/img/upload/' . $members[0]['ChildMember'][$i]['logo'];?>" width="80" height="60" border="0" /></a>
                    <?php }?>
                </div>
                <div class="school-desc">
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>schol-inner1.jpg" width="228" height="84" border="0" /></a>
                    <a class="selected" href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>schol-inner2.jpg" width="229" height="84" border="0" /></a>
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>schol-inner3.jpg" width="229" height="84" border="0" /></a>
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>schol-inner4.jpg" width="229" height="84" border="0" /></a>
                </div>
            </div>
        </div>
        <div class="grade-share" style="background:#004272;">
            <div class="grade-cont">
                <div class="grade-tit">Select Grade </div>
                <div class="grade-items">
                    <?php for ($i = 0 ; $i < sizeof($grades) ; $i++){?>
                             <a href="#" class="<?php if($i == 0) echo 'selected';?> grade" data-id="<?php echo $grades[$i]['Friend']['id'];?>"><?php echo $grades[$i]['Friend']['title'];?></a><?php if ($i != (sizeof($grades) - 1)) {?>-<?php }?>
                    <?php }?>
                </div>
            </div>
            <div class="grade-school-share"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>album-share.jpg" width="124" height="21" border="0" /></a></div>
        </div>
        <div class="school-in-gallery">
            <div id="albums">
                <div class="school-in-gallery-left" style="background:#E10109;">
                    <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
                        <?php for ($i = 0 ; $i < sizeof($albumsOfFirst) ; $i++) { ?>
                        <li class="album"><a href="" data-id="<?php echo $albumsOfFirst[$i]['Album']['id']; ?>"><div class="vert-album"><?php echo $albumsOfFirst[$i]['Album']['title']; ?></div></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div id="gal">
<!--            <div class="school-in-gallery-right">
                <div id="jslidernews2" class="lof-slidecontent2" style="width:600px; height:510px; display:block;">
                    <div class="preload"><div></div></div>
                     MAIN CONTENT  
                    <div class="main-slider-content" style="width:600px; height:425px;">
                        <ul class="sliders-wrap-inner">
                            <li>
                                <img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" title="Newsflash 2" >           
                                <div class="slider-description"></div>
                            </li> 
                            <li>
                                <img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" title="Newsflash 2" >           

                            </li> 
                            <li>
                                <img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" title="Newsflash 2" >           

                            </li> 
                            <li>
                                <img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" title="Newsflash 2" >           

                            </li> 
                            <li>
                                <img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" title="Newsflash 2" >           

                            </li> 
                            <li>
                                <img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" title="Newsflash 2" >           

                            </li> 
                            <li>
                                <img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" title="Newsflash 2" >           

                            </li> 
                            <li>
                                <img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" title="Newsflash 2" >           

                            </li> 
                        </ul>  	
                    </div>
                     END MAIN CONTENT  
                     NAVIGATOR 
                    <div class="navigator-content" style="background:#004475;">
                        <div  class="button-previous">Previous</div>
                        <div class="navigator-wrapper">
                            <ul class="navigator-wrap-inner">
                                <li><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" /></li>
                                <li><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" /></li>
                                <li><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" /></li>
                                <li><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" /></li>    
                                <li><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" /></li>
                                <li><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" /></li>       
                                <li><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" /></li>       
                                <li><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school.jpg" /></li>       		
                            </ul>
                        </div>
                        <div class="button-next">Next</div>
                    </div> 
                    --------------- END OF NAVIGATOR -------------------
                     BUTTON PLAY-STOP 
                    <div class="button-control"><span></span></div>
                     END OF BUTTON PLAY-STOP 

                </div>
            </div>-->
            </div>
        </div>
    </div>
</div>
<!--<script type="text/javascript" src="<?php echo $this->Session->read('Setting.url') . '/js/front/'; ?>script2.js"></script>-->