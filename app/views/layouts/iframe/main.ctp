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
	//SCRIPTS
	echo $this->Html->scriptBlock("var siteUrl ='".$this->Session->read('Setting.url')."';");//Define global var siteUrl
	echo $this->Javascript->link('libs/jquery');
	echo $scripts_for_layout;
	echo $this->Javascript->link('backend/all');
	?>
</head>

<body>
<div class="iframeData" style="width:98%;">
<?php
	echo $this->Session->flash ();
	echo $content_for_layout;
?>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>