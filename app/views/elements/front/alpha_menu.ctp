<?php 
echo $this->Html->css('front/character_style', null, array('inline'=>false));
if($this->name == 'Showrooms'){
	$char = isset($this->params['pass'][0])?strtoupper($this->params['pass'][0]):'';
?>
<script>
	$(document).ready(function(){
		$('.alphaMenu a').each(function(){
			if($(this).text() == '<?php echo $char;?>')
				$(this).addClass('hover');
		});	
	});
</script>
<?php }?>
<ul class="alphaMenu">
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/a';?>">A</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/b';?>">B</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/c';?>">C</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/d';?>">D</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/e';?>">E</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/f';?>">F</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/g';?>">G</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/h';?>">H</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/i';?>">I</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/j';?>">J</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/k';?>">K</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/l';?>">L</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/m';?>">M</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/n';?>">N</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/o';?>">O</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/p';?>">P</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/q';?>">Q</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/r';?>">R</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/s';?>">S</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/t';?>">T</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/u';?>">U</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/v';?>">V</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/w';?>">W</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/x';?>">X</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/y';?>">Y</a></li>
    <li style=" width:125px;"><a href="<?php echo $this->Session->read('Setting.url').'/showrooms/order/z';?>">Z</a></li>
</ul>