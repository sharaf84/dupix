<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset();?>
	<title>
		<?php echo $this->Session->read('Setting.title').' '.$title_for_layout; ?>
	</title>
	<?php
	echo $this->Html->meta ('icon');
	//CSS
	echo $this->Html->css('backend/style');
	echo $this->Html->css('backend/dropdown');
	echo $this->Html->css('backend/prettify');
	echo $this->Html->css('backend/jquery.multiselect');
	echo $this->Html->css('backend/jquery.multiselect.filter');
	//SCRIPTS
	echo $this->Html->scriptBlock("var siteUrl ='".$this->Session->read('Setting.url')."';");//Define global var siteUrl
//	echo $this->Javascript->link('libs/jquery');
	echo $scripts_for_layout;
	
        ?>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
        <?php
        echo $this->Javascript->link('backend/all');
	echo $this->Javascript->link('backend/jquery.multiselect');
	echo $this->Javascript->link('backend/jquery.multiselect.filter');
	echo $this->Javascript->link('backend/prettify');
	?>
</head>

<body onload="prettyPrint();">
<div id="container">
<div id="header">
<div id="shift_logo">
	<?php echo $this->Html->link(
			$this->Html->image('backend/sh1ft.png', array('title'=> __('Shift e-business', true), 'border' => '0')),
			'http://www.sh1ft.net/',
			array('target' => '_blank', 'escape' => false)
		);
	?>
</div>
<div id="front_logo">
	<a href="<?php echo $this->Session->read('Setting.url');?>" target="_blank">
		<?php echo $this->Html->image('backend/logo.jpg', array('title'=> __('The Home Page', true), 'border' => '0'));?>
    </a>
</div>
<?php if(($this->action != 'login')){?>
<div id="title"><?php echo 'Welcome to '.$this->Session->read('Setting.title').' CMS';?>
	<div style=" float:right; margin-right:15px; width:200px; font:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; margin-top:20px;">
    <?php
	echo 'Hello, '. $this->Session->read('userInfo.User.username').': ';
	echo $this->Html->link(
		$this->Html->image('backend/settings2.jpeg', array('title'=> __('Settings', true), 'border' => '0')),
		array('controller' => 'settings/edit'),
		array('escape' => false)
	);
	echo $this->Html->link(
		$this->Html->image('backend/home.jpeg', array('title'=> __('Home', true), 'border' => '0')),
		array('controller' => 'admin/index'),
		array('escape' => false)
	);
	echo $this->Html->link(
		$this->Html->image('backend/logout2.jpeg', array('title'=> __('logout', true), 'border' => '0')),
		array('controller' => 'admin/logout'),
		array('escape' => false)
	);
	?>
    </div>
</div>
<?php }?>
</div>
<div id="content">
<?php include_once 'top_menu.ctp';?>
<div id="data">
<div id="datatop">
	<?php echo $this->Html->image('backend/topdatabg.jpg');?>
</div>
<div id="datamiddle">
<div id="datain">
<div id="leftin">
<?php
	echo $this->Session->flash ();
	echo $content_for_layout;
?>
</div>
<div id="rightin">
<?php
//if(($this->action != 'login') && ($this->name != 'Images') && ($this->name != 'Articles'))
	//include_once 'right_menu.ctp';
?>
</div>
</div>
</div>
</div>

<div id="bottom">
<div id="abs">
	<?php
		echo $this->Html->image('backend/bgleft.png');
	?>
</div>
	<?php
		echo $this->Html->image('backend/bottombg.png');
	?>
</div>
</div>
<div id="footer"></div>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>