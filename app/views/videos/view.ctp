<div class="videos view">
<h2><?php  __('Video');?></h2>
	<?php 
	if(!empty($video['Video']['file']))
		echo $this->element('backend/video_player_view', array('video'=>$video['Video']));
	elseif(!empty($video['Video']['url']))
		echo $this->element('backend/tube_view', array('video'=>$video['Video']));
	?>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $video['Video']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $video['Video']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $video['Video']['image']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $video['Video']['file']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $video['Video']['url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hits'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $video['Video']['hits']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Video', true), array('action' => 'edit', $video['Video']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Video', true), array('action' => 'delete', $video['Video']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $video['Video']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
