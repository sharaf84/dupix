	<div id="footer">

		<div id="menufooter_newsletter">

			<div id="menu_footer">

				<div class="content_footer">

					<div class="link_title_footer">
						<a href="#">Products</a>
					</div>

					<div class="link_details_footer">
						<?php foreach($sections as $section){?>
						<a href="<?php echo $this->Session->read('Setting.url').'/categories/products/'.$section['Section']['id'];?>"><?php echo $section['Section']['title'];?></a>
						<br />
						<?php }?>
					</div>

				</div>

				<div class="content_footer2">

					<div class="link_title_footer">
						<a href="#">My Dupix</a>
					</div>
					
					<div class="link_details_footer">
						<?php if(!empty($memberCookie)){?>
						<a href="<?php echo  $this->Session->read('Setting.url').'/profile/albums';?>">My Albums</a>
						<br />
						<a href="<?php echo  $this->Session->read('Setting.url').'/profile/projects';?>">My Projects</a>
						<br />
						<a href="<?php echo  $this->Session->read('Setting.url').'/profile/cart';?>">My Cart</a>
						<?php } else {?>
						<a href="#loginForm" class="inline">My Albums</a>
						<br />
						<a href="#loginForm" class="inline">My Projects</a>
						<br />
						<a href="#loginForm" class="inline">My Cart</a>	
						<?php }?>
					</div>

				</div>

				<div class="content_footer2">
					<div class="link_title_footer">
						<a href="<?php echo $this->Session->read('Setting.url').'/texts/display/3/Services';?>">Services</a>
					</div>
				</div>

				<div class="content_footer2">
					<div class="link_title_footer">
						<a href="<?php echo $this->Session->read('Setting.url').'/texts/display/2/contact-us';?>">Contact Us</a>
					</div>
				</div>

			</div>

			<!--
			<div id="newsletter">
			
							<div class="link_title_footer">
								Newsletter
							</div>
			
							<div id="newsletter_search">
			
								<div class="newsletter_search_bg">
			
									<input name="textfield" type="text" class="newsletter_textfield" id="textfield" value="Please enter your email" onfocus="if (this.value == 'Please enter your email') this.value = '';" onblur="if (this.value == '') this.value = 'Please enter your email';"/>
								</div>
			
								<div class="newsletter_search_button">
									<a href="#"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>search_button.jpg" width="37" height="35" /></a>
								</div>
							</div>
			
						</div>-->
			
		</div>

		<div id="copyrights_share">

			<div class="copyrights_title">
				© 2012 Fotosoora. All Rights Reserved. Developed & Designed By <a href="http://shift.com.eg/" target="_blank"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>shift_logo.jpg" width="45" height="12" border="0" /></a>
			</div>

			<div class="privacy_terms_links">
				<a href="<?php echo $this->Session->read('Setting.url').'/texts/display/5/privacy-policy';?>">Privacy Policy</a>
				&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
				<a href="<?php echo $this->Session->read('Setting.url').'/texts/display/4/terms-of-use';?>">Terms of Use</a>
			</div>

			<div id="share_icons">

				<div class="facebook"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>facebook.jpg" width="52" height="65" />
				</div>

				<div class="twitter"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>twitter.jpg" width="52" height="65" />
				</div>
			</div>
		</div>
	</div>
</div>
