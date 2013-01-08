Hi <?php echo $name;?>,<br />
Thank you for signing up in Fotosoora. To complete the sign up process please click on the link below:<br />
<a href="<?php echo $this->Session->read('Setting.url').'/profile/confirm/'.$id.'/'.$code;?>">
	Confirm your account
</a>
<br />Or copy this URL to your browser:<br /> 
<?php echo $this->Session->read('Setting.url').'/profile/confirm/'.$id.'/'.$code;?>