<?php
	echo $this->Form->create('Product', array('id'=>'advSearch', 'class'=>'', 'url'=>$this->Session->read('Setting.url').'/categories/search'));
	echo $this->Ajax->autoComplete('Product.title', '/categories/autoComplete/keyword', array('label'=>'', 'value'=>'Enter keyword ex: Chair'));
	echo '<input type="submit" class="search_submit" value="" tabindex="6" >';
?>
	<div align="center" style=" float:left;">
		  <div class="ser-in1"></div>
		  <div class="ser-in2"><a href="#" class="text_black_bold_small" <?php if($this->name != 'Home'){?>onclick="$('.advancedDiv').toggle();"<?php }?>>Advanced search</a></div>
		  <div class="ser-in1"></div>
	</div>	
	<div class="advancedDiv">
	<?php    
		echo $this->Form->input('section_id', array('empty'=>'Category (All)', 'label'=>'', 'class'=>'search_select', 'onchange'=>'getOtherLists($(this));'));
		echo '<div id="afterSections">';
		echo $this->Form->input('style_id', array('empty'=>'Style (All)', 'label'=>'', 'class'=>'search_select', 'onchange'=>'getOtherLists($(this));'));
		echo '<div id="afterStyles">';
		echo $this->Form->input('location_id', array('empty'=>'Location (All)', 'label'=>'', 'class'=>'search_select', 'onchange'=>'getOtherLists($(this));'));
		echo $this->Form->input('exhibitor_id', array('empty'=>'Showroom (All)', 'label'=>'', 'class'=>'search_select'));
		echo '</div></div>';
		echo '<div class="select select0">'.$this->Html->image("backend/loader.gif", array('id'=>'loader', 'style'=> 'display: none; margin-left:10px;', 'border' => '0')).'</div>';
		echo '<input type="submit" class="search_submit0" value="" tabindex="6" >';
	?>
	</div>
<?php	echo $this->Form->end();?>
