<div class="friends view">
<h2><?php  __('Friend');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $friend['Friend']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $friend['Friend']['title']; ?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $friend['Friend']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $friend['Friend']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $friend['Friend']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Grades', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grade', true), array('action' => 'add')); ?> </li>
	</ul>
</div>

