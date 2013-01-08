<?php if(empty($memberCookie)){?>
<!-- This contains the hidden content for inline calls -->
<div style='display:none'>
	<!--log in form-->
	<div id='loginForm' style='padding:10px; background:#fff;'>
		<div class="members form">
		<?php echo $this->Form->create('Member', array('url'=>$this->Session->read('Setting.url').'/profile/login'));?>
			<fieldset>
		 		<div class="title_blue"><?php __('Log In');?></div>
				<div class="data_form_black">
					<?php 
					echo $this->Form->input('email');
					echo $this->Form->input('password');
					echo $this->Form->input('remember', array('type'=>'checkbox', 'label'=>'Remember me'));
					?>
					<div class="forgot"><a class="inline" href="#forgotForm">Forgot your password?</a></div>
					<div class="join-us"><a class="inline" href="#joinForm">Not a member? Join us!</a></div>
				</div>
			</fieldset>
		<?php echo $this->Form->end(__('Log In', true));?>
		</div>
	</div>
	<!--forgot form-->
	<div id='forgotForm' style='padding:10px; background:#fff;'>
		<div class="members form">
		<?php echo $this->Form->create('Member', array('url'=>$this->Session->read('Setting.url').'/profile/forgot'));?>
			<fieldset>
		 		<div class="title_blue"><?php __('Forgot your password?');?></div>
				<div class="data_form_black">
					<?php echo $this->Form->input('email');?>
				</div>
			</fieldset>
		<?php echo $this->Form->end(__('Send', true));?>
		</div>
	</div>
	<!--join us form-->
	<div id='joinForm' style='padding:10px; background:#fff;'>
		<div class="members form">
			<?php echo $this->Form->create('Member', array('url'=>$this->Session->read('Setting.url').'/profile/register', 'id'=>'memeberRegister'));?>
			<fieldset>
		 		<div class="title_blue"><?php __('Join Us'); ?></div>
			<div class="data_form_black">
				<div class="note" style="margin-left:150px;">note that <span style="color:#BB0000;">*</span> denotes a  required field</div>
			<?php
				echo $this->Form->input('name');
				echo $this->Form->input('email', array('label'=>'Email<span> *</span>'));
				echo $this->Form->input('password', array('label'=>'Password<span> *</span>'));
				echo $this->Form->input('confirm_password', array('type'=>'password', 'label'=>'Confirm Password<span> *</span>'));
				//echo $this->Form->input('gender', array('type'=>'radio', 'options'=>array('Female', 'Male')));
				echo $this->Form->input('birthdate', array('label'=>'Birthday', 'minYear' => (date('Y') - 90), 'maxYear' => date('Y'), 'empty'=>true));
				echo $this->Form->input('phone');
				echo $this->Lang->countrySelect('Member.country', array('default'=>''));
				echo $this->Form->input('city');
				echo $this->Form->input('area');
				echo $this->Form->input('address');
				//echo $this->Form->input('newsletter');												
			?>
			</div>
			</fieldset>
			<?php echo $this->Form->end(__('Join Us', true));?>
			<div id="registerLoading" class="ajaxLoading"></div>
			<div id="registerResult" class="ajaxResult"></div>
		</div>
	</div>
	<!--end of join us-->
</div>
<? }?>
<div id="top">

	<div class="top">

		<div class="hovermenu">
			<ul>
				<li>
					<a href="<?php echo $this->Session->read('Setting.url');?>">Home</a>
				</li>
				<li>
					<a href="#">Sitemap</a>
				</li>
				<li>
					<a href="<?php echo $this->Session->read('Setting.url').'/texts/display/2/contact-us';?>">Contact Us</a>
				</li>
				<li>
					<a href="#">Help</a>
				</li>
				<?php if(empty($memberCookie)){?>
				<li>
					<a class="inline" href="#loginForm">Log In</a>
				</li>
				<li>
					<a class="inline" href="#joinForm">Join Us</a>
				</li>
				<?php }else{?>
				<li>
					<a href="#">Hi, <?php if(!empty($memberCookie['name'])) {echo $memberCookie['name'];}else{echo $memberCookie['email'];}?></a>
				</li>
				<li>
					<a href="<?php echo $this->Session->read('Setting.url').'/profile/logout';?>">Logout</a>
				</li>
				<?php }?>
			</ul>
		</div>

		<div id="search">

			<div class="search_bg">

				<input name="textfield" type="text" class="textfield" id="textfield" value="Search" onfocus="if (this.value == 'Search') this.value = '';" onblur="if (this.value == '') this.value = 'Search';"/>
			</div>

			<div class="search_button">
				<a href="#"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>search_button.jpg" width="37" height="35" /></a>
			</div>
			
			<div id="phone">
			
				<div class="phone_img">
				
					<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>phone.jpg" width="30" height="30" />
				</div>
			
			<div class="phone_text">
				
					0100 34 84 022
				</div>
			
			</div>
			
			
		</div>
	</div>

</div>

<div id="container">

	<div id="header">

		<div class="logo">
			<a href="<?php echo $this->Session->read('Setting.url');?>"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>logo.jpg" width="314" height="76" /></a>
		</div>

		<div class="menu">
			<ul>
				<li>
					<a href="<?php echo $this->Session->read('Setting.url').'/categories';?>" class="<?php if($this->name == 'Categories') echo 'selected';?>">Products</a>
				</li>
				<li>
					<?php
						$url = '#loginForm';
						$class = 'inline';
						if(!empty($memberCookie)){
							$url = $this->Session->read('Setting.url').'/profile/albums';
							$class = ($this->name == 'Profile')?'selected':null;
						}
					?>
					<a href="<?php echo $url;?>" class="<?php echo $class;?>">My Fotosoora</a>
				</li>
				<li>
					<a href="<?php echo $this->Session->read('Setting.url').'/texts/display/3/Services';?>" class="<?php if($this->params['url']['url'] == 'texts/display/3/Services') echo 'selected';?>">Services</a>
				</li>
				<li>
					<a href="<?php echo $this->Session->read('Setting.url').'/texts/display/2/contact-us';?>" class="<?php if($this->params['url']['url']  == 'texts/display/2/contact-us') echo 'selected';?>">Contact Us</a>
				</li>
			</ul>
		</div>

		<div id="Items">

			<div class="item">
				<a href="#"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>item.jpg" width="54" height="49" /></a>
			</div>

			<div class="item_link">
				<a href="<?php echo $this->Session->read('Setting.url').'/profile/cart';?>">
					<span class="cartCount">
					<?php
					if(!empty($memberCookie))
						echo intval($this->requestAction('profile/getCartCount'));
					else
						echo 0;
					?>
					</span>
					<span>Item(s) View Cart</span> 
				</a>
			</div>
		</div>
	</div>
