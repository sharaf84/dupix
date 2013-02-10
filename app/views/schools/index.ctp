<script type="text/javascript">
    $(document).ready(function(){
        //Section view controll
        $('.product-prev').insertAfter('.proSection:eq(1)');
        $('.product-ad').insertAfter('.proSection:eq(1)');
        if($('.proSection').length > 8){
            $(('.proSection:gt(7)')).hide();
            $('.product-more').show();
        }
        $('.product-more').click(function(){
            $('.proSection:gt(1):lt(8)').hide();
            $('.proSection:gt(7)').show();
            $('.product-more').hide();
            $('.product-prev').show();
        });
        $('.product-prev').click(function(){
            $('.proSection:gt(1):lt(8)').show();
            $('.proSection:gt(7)').hide();
            $('.product-more').show();
            $('.product-prev').hide();
        });
    });
</script>
<div id="contain">
    <div id="container">
        <div class="school-logos">
            <div class="school-logo-left"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-logo.jpg" width="235" height="235" border="0" /></div>
            <div class="school-logos-right">
                <div class="schools-logos">
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-logo.jpg" width="80" height="60" border="0" /></a>
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-logo.jpg" width="80" height="60" border="0" /></a>
                    <a href="#"><img class="selected" src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-logo.jpg" width="80" height="60" border="0" /></a>
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-logo.jpg" width="80" height="60" border="0" /></a>
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-logo.jpg" width="80" height="60" border="0" /></a>
                </div>
                <div class="school-desc">
                    <div class="school-desc-tit">MLS American</div>
                    <div class="school-desc-data">Misr Language Schools American Division Aspires To Be A Vibrant Learning Community Where All Members Are United For The Common Purpose Of Learning. Its Vision Is To Graduate Students With A Sound Academic And Moral Base, To Become Well Informed Members Of Society, Aware Of Their Civic Duties And Equipped With The Necessary Skills To Realize Their Individual Potential, And Compete In A World Increasingly Shaped By Technology And Driven By Innovation.
                        ...more</div>
                </div>
            </div>
        </div>
        <div class="school-products">
            <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-merch.jpg" width="179" height="197" border="0" /></a>
            <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-photos.jpg" width="180" height="197" border="0" /></a>
            <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-cal.jpg" width="180" height="197" border="0" /></a>
            <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-club.jpg" width="179" height="197" border="0" /></a>
        </div>
        <div class="school-gallery">
            <div id="wowslider-container1">
                <div class="ws_images">
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-gallery.jpg" border="0" id="wows0"/></a>
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-gallery.jpg" border="0" id="wows1"/></a>
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-gallery.jpg" border="0" id="wows2"/></a>
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') .'/img/upload/';?>school-gallery.jpg" border="0" id="wows3"/></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $this->Session->read('Setting.url') .'/js/front/';?>script2.js"></script>