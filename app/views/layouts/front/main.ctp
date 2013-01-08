<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset();?>
<title>
<?php 
if($this->name!='Home') echo $title_for_layout.': '; 
echo $this->Session->read('Setting.title'); 
?>
</title>
<?php
//META
echo $this->Html->meta('icon', $this->Session->read('Setting.url').'/app/webroot/img/front/favicon.ico' );
if(isset($metaKeywords)) 
	echo $this->Html->meta('keywords', $metaKeywords);
echo $this->Html->meta('keywords', $this->Session->read('Setting.meta_keywords'));
if(isset($metaDescription)) 
	echo $this->Html->meta('description', $metaDescription);
echo $this->Html->meta('description', $this->Session->read('Setting.meta_description'));	
//CSS
echo $this->Html->css(array('front/style', 'front/bottom', 'colorbox/colorbox_ex3'));
//SCRIPTS
echo $this->Html->scriptBlock("var siteUrl ='".$this->Session->read('Setting.url')."';");//Define global var siteUrl
echo $this->Javascript->link(array('libs/jquery', 'colorbox/jquery.colorbox', 'front/ajax/members'));
echo $scripts_for_layout;
?>
</head>
<body>
	<?php 
	echo $this->Session->flash();
	include_once('header.ctp');
	echo $content_for_layout;
	include_once('footer.ctp');
	?>
<?php echo '<div style="float:left; width:1000px;">'.$this->element('sql_dump').'</div>'; ?>
</body>
</html>