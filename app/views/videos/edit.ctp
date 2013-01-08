<div class="videos form">
<?php echo $this->Form->create('Video', array('type'=>'file'));?>
	<fieldset>
 		<legend><?php __('Edit Video'); ?></legend>
	<?php
		if(!empty($this->data['Video']['file']))
			echo $this->element('backend/video_player_view', array('video'=>$this->data['Video']));
		elseif(!empty($this->data['Video']['url']))
			echo $this->element('backend/tube_view', array('video'=>$this->data['Video']));
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('image', array('type'=>'file'));
		echo $this->Form->input('file', array('type'=>'file', 'label'=>'FLV File'));
		echo $this->Form->input('url');
		//echo $this->Form->input('hits');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Video.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Video.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Videos', true), array('action' => 'index'));?></li>
	</ul>
</div>