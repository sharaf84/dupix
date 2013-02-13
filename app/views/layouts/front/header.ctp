<script>
    $(document).ready(function(){
//        $.colorbox({
//            html: "<p>Hsdgahdfskg jsliaghls dflsiud ghaldig</p>",
//            width: '50%'
//        });
    });
</script>
<?php if (empty($memberCookie)) { ?>
    <!-- This contains the hidden content for inline calls -->
    <div style='display:none'>
        <!--log in form-->
        <div id='loginForm' style='padding:10px; background:#fff;'>
            <div class="members form">
                <?php echo $this->Form->create('Member', array('url' => $this->Session->read('Setting.url') . '/profile/login')); ?>
                <fieldset>
                    <div class="title_blue"><?php __('Log In'); ?></div>
                    <div class="data_form_black">
                        <?php
                        echo $this->Form->input('email');
                        echo $this->Form->input('password');
                        echo $this->Form->input('remember', array('type' => 'checkbox', 'label' => 'Remember me'));
                        ?>
                        <div class="forgot"><a class="inline" href="#forgotForm">Forgot your password?</a></div>
                        <div class="join-us"><a class="inlineJoin" href="#joinForm">Not a member? Join us!</a></div>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(__('Log In', true)); ?>
            </div>
        </div>
        <!--forgot form-->
        <div id='forgotForm' style='padding:10px; background:#fff;'>
            <div class="members form">
                <?php echo $this->Form->create('Member', array('url' => $this->Session->read('Setting.url') . '/profile/forgot')); ?>
                <fieldset>
                    <div class="title_blue"><?php __('Forgot your password?'); ?></div>
                    <div class="data_form_black">
                        <?php echo $this->Form->input('email'); ?>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(__('Send', true)); ?>
            </div>
        </div>
        <!--join us form-->
        <div id='joinForm' style='padding:10px; background:#fff;'>
            <div class="members form">
                <?php echo $this->Form->create('Member', array('url' => $this->Session->read('Setting.url') . '/profile/register', 'id' => 'memeberRegister')); ?>
                <fieldset>
                    <div class="title_blue"><?php __('Join Us'); ?></div>
                    <div class="data_form_black">
                        <div class="note" style="margin-left:150px;">note that <span style="color:#BB0000;">*</span> denotes a  required field</div>
                        <?php
                        echo $this->Form->input('name');
                        echo $this->Form->input('email', array('label' => 'Email<span> *</span>'));
                        echo $this->Form->input('password', array('label' => 'Password<span> *</span>'));
                        echo $this->Form->input('confirm_password', array('type' => 'password', 'label' => 'Confirm Password<span> *</span>'));
                        //echo $this->Form->input('gender', array('type'=>'radio', 'options'=>array('Female', 'Male')));
                        //echo $this->Form->input('birthdate', array('label' => 'Birthday', 'minYear' => (date('Y') - 90), 'maxYear' => date('Y'), 'empty' => true));
                        //echo $this->Form->input('phone');
                        //echo $this->Lang->countrySelect('Member.country', array('default' => ''));
                        //echo $this->Form->input('city');
                        //echo $this->Form->input('area');
                        //echo $this->Form->input('address');
                        //echo $this->Form->input('newsletter');												
                        ?>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(__('Join Us', true)); ?>
                <div id="registerLoading" class="ajaxLoading"></div>
                <div id="registerResult" class="ajaxResult"></div>
            </div>
        </div>
        <!--end of join us-->
    </div>
<? } ?>
<div class="header-container">
    <div class="header">
        <div class="header-left">
            <div class="header-left-top">
                <div class="logo"><a href="index.php" target="_self"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>logo.png" border="0" /></a></div>
                <div class="header-left-top-menu"><a href="#" target="_self">CONTACT US </a> |   <a href="<?php echo $this->Session->read('Setting.url') . '/profile'; ?>" target="_self">MY DUPIX</a> |   <a href="#" target="_self">SHOP</a></div>
            </div>

            <div class="header-left-pull"><a href="javascript:animatedcollapse.toggle('menu')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>pull.png" class="pull-click" border="0" /></a>
                <div class="menu-left" id="menu" style="display: <?php if($this->name != 'Home') echo 'block';?>">
                    <div class="discoount"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>discount.jpg" width="205" height="134" border="0" /></a></div>
                    <div class="menu">
                        <a href="<?php echo $this->Session->read('Setting.url'); ?>" class="current">Home</a>
                        <a href="<?php echo $this->Session->read('Setting.url') . '/categories'; ?>">Products</a>
                        <a href="<?php echo $this->Session->read('Setting.url') . '/profile'; ?>">My DuPix</a>
                        <a href="#">Schools</a>
                        <a href="#">Photographers</a>
                        <a href="#">E-Store</a>
                        <a href="#">About Us</a>
                    </div>
                    <div class="photo-album">
                        <div class="photo-album-gallery"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>left-ad.jpg" width="125" height="125" border="0" /></div>
                        <div class="photo-album-tit">PHOTO ALBUMS</div>
                    </div>
                    <div class="left-ad"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>left-ad.jpg" width="125" height="125" border="0" /></a></div>
                    <div class="pull-back"><a href="javascript:animatedcollapse.toggle('menu')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>pull-back.png" width="205" height="47" border="0" class="pull-back-click" /></a></div>
                </div>
            </div>
        </div>
        <div class="header-right">
            <div class="header-right-top">
                <div class="buttons">
                    <?php if(empty($memberCookie)){?>
                    <a href="#loginForm" class="inline"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>singin.jpg" width="34" height="37" border="0" /></a>
                    <a href="#joinForm" class="inlineJoin"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>singup.jpg" width="38" height="38" border="0" /></a>
                    <?php }?>
                    <a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>share.jpg" width="31" height="39" border="0" /></a>
                </div>
                <div class="slogan"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>slogan.jpg" width="178" height="17" border="0" /></div>
                <div class="facebook"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>face.jpg" width="84" height="25" border="0" /></a></div>
                <div class="sponser"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>samsung.jpg" width="191" height="66" border="0" /></a></div>
            </div>
            <?php if($this->name == 'Home'){?>
            <div class="header-right-bottom">
                <div class="main-buttons">
                    <a href="javascript:animatedcollapse.toggle('menu-stores')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>stores.png" border="0" /></a>
                    <div class="menu-stores" id="menu-stores">
                        <div class="menu-stores-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>are.png" width="111" height="36" border="0" /></div>
                        <div class="menu-stores-links">
                            <a href="#">Emaar</a>
                            <a href="#">UpTown Stars</a>
                            <a href="#">Samsung</a>
                        </div>
                    </div>
                    <img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>schools.png" border="0" />
                </div>
                <?php if(!empty($memberCookie)){?>
                <div class="basket">
                    <div class="basket-user-name">Hello, <?php echo $memberCookie['name'];?></div>
                    <div class="basket-details">
                        <div class="basket-details-left">
                            <div class="basket-view"><a href="#">View Basket (0)</a></div>
                            <div class="basket-signout"><a href="<?php echo $this->Session->read('Setting.url') . '/profile/logout'; ?>">SIGN OUT</a></div>
                        </div>
                        <div class="basket-details-right"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>basket.jpg" width="35" height="30" border="0" /></div>
                    </div>
                </div>
                <?php }?>
            </div>
            <?php }else{?>
            <?php if(!empty($memberCookie)){?>
            <div class="header-right-bottom-in">
                <div class="basket-user-name-in">Hello,  <?php echo $memberCookie['name'];?></div>
                <div class="basket-view-in"><a href="#">View Basket (0)</a></div>
                <div class="basket-signout-in"><a href="<?php echo $this->Session->read('Setting.url') . '/profile/logout'; ?>">SIGN OUT</a></div>
            </div>
            <?php }?>
            <?php }?>
        </div>
    </div>
</div>