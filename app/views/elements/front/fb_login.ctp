<?php if(AppController::AppId){?>
<div id="fb-root"></div>
<div class="fbLogin" style="cursor:pointer"><img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/front/';?>fblogin.jpg" border="0" alt="Facebook Login"  title="Facebook Login" /></div>
<script>
window.fbAsyncInit = function() {
	FB.init({ 
		appId: '<?=AppController::AppId;?>', 
		status: true, 
		cookie: true,
		xfbml: true,
		oauth: true
	});

  	function updateButton(response) {
		//login
		$('.fbLogin').click(function() {
			FB.login(function(response) {
				if (response.authResponse) {
					FB.api('/me', function(response) {
						$.ajax({
							type: 'POST',
							data: response,	
							url: siteUrl+'/profile/facebookLogin',
							beforeSend: function(){
								//alert(response.name + ' ' + response.email);
							},
							success:function(result){
								FB.logout(function(response) {
									window.location.href = '<?php echo $this->Session->read('Setting.url').'/'.$this->params['url']['url'];?>';
								});
								window.location.href = '<?php echo $this->Session->read('Setting.url').'/'.$this->params['url']['url'];?>';
							}
						});
					});	   
				} else {
					//alert('Failed! Please try again.');
				}
			}, {scope:'email'});  	
		});
	}
  	// run once with current status and whenever the status changes
  	FB.getLoginStatus(updateButton);
  	FB.Event.subscribe('auth.statusChange', updateButton);	
};
	
(function() {
  	var e = document.createElement('script'); e.async = true;
  	e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
  	document.getElementById('fb-root').appendChild(e);
}());

</script>
<?php }?>