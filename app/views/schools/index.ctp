<script type="text/javascript">
    $(document).ready(function(){
        $('a.branche-logo').click(function(){
            $('a.branche-logo img').removeClass('selected');
            $(this).children('img').addClass('selected');
            
            //Show discription of hte clicked branch
            var id = $(this).attr('id');
            $('.school-desc').css('display', 'none');
            $('#school-desc-' + id).css('display', 'block');
            
            return false;
        });
        
        $('#main-school').click(function(){
            $('a.branche-logo img').removeClass('selected');
            $('.school-desc').css('display', 'none');
            $('#school-desc').css('display', 'block');
        });
        
        
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
<!--                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-logo.jpg" width="80" height="60" border="0" /></a>
                    <a href="#"><img class="selected" src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-logo.jpg" width="80" height="60" border="0" /></a>
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-logo.jpg" width="80" height="60" border="0" /></a>
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-logo.jpg" width="80" height="60" border="0" /></a>-->
                </div>
                
                <div id="school-desc" class="school-desc">
                    <div class="school-desc-tit"><?php echo $members[0]['Member']['name'];?></div>
                    <div class="school-desc-data"><?php echo $members[0]['Member']['description'];?> ...more</div>
                </div>
                <?php for ($j = 0 ; $j < sizeof($members[0]['ChildMember']) ; $j++){?>
                        <div id="school-desc-<?php echo $j;?>" class="school-desc" style="display: none;">
                            <div class="school-desc-tit"> <?php echo $members[0]['ChildMember'][$j]['name'];?></div>
                            <div class="school-desc-data"><?php echo $members[0]['ChildMember'][$j]['description'];?> ...more</div>
                        </div>
                <?php } ?>
<!--                <div class="school-desc">
                    <div class="school-desc-tit">MLS American</div>
                    <div class="school-desc-data">Misr Language Schools American Division Aspires To Be A Vibrant Learning Community Where All Members Are United For The Common Purpose Of Learning. Its Vision Is To Graduate Students With A Sound Academic And Moral Base, To Become Well Informed Members Of Society, Aware Of Their Civic Duties And Equipped With The Necessary Skills To Realize Their Individual Potential, And Compete In A World Increasingly Shaped By Technology And Driven By Innovation. ...more</div>
                </div>-->
            </div>
        </div>
        <div class="school-products">
            <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-merch.jpg" width="179" height="197" border="0" /></a>
            <a href="/schools/details/<?php echo $members[0]['Member']['id'];?>"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-photos.jpg" width="180" height="197" border="0" /></a>
            <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-cal.jpg" width="180" height="197" border="0" /></a>
            <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-club.jpg" width="179" height="197" border="0" /></a>
        </div>
        <div class="school-gallery">
            <div id="wowslider-container1">
                <div class="ws_images">
                    <?php for ($g = 0 ; $g < sizeof($members[0]['Gal']) ; $g++){?>
                              <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/' . $members[0]['Gal'][$g]['image'];?>" border="0" id="wows<?php echo $g;?>"/></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $this->Session->read('Setting.url') .'/js/front/';?>script2.js"></script>