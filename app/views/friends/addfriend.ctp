

<div class="friends form">
<?php echo $this->Form->create('Friend');?>
<fieldset>
 		<legend><?php __('Add Friends'); ?></legend>
	<?php //var_dump(Configure::read('currentFriends'));
                echo $this->Form->input('id');
		echo $this->Form->select('friends', Configure::read('allMembers'), Configure::read('currentFriends'), array('multiple'=> 'multiple'), array(), true); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
    
<!--	<p>
		<select multiple="multiple" style="width:370px">
		<option value="red">Red</option>
		<option value="green">Green</option>
		<option value="blue">Blue</option>
		<option value="orange">Orange</option>
		<option value="purple">Purple</option>
		<option value="yellow">Yellow</option>
		<option value="brown">Brown</option>
		<option value="black">Black</option>
		</select>
	</p>-->

<script type="text/javascript">
    
   $("select option:first").remove();
   $("select").multiselect().multiselectfilter({
       
   });
</script>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Grads&Classes', true), array('action' => 'index'));?></li>
</div>