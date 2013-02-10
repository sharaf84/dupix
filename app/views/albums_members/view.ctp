<div class="albumsMembers view">
<h2><?php  __('Albums Member');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $albumsMember['AlbumsMember']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Album'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($albumsMember['Album']['title'], array('controller' => 'albums', 'action' => 'view', $albumsMember['Album']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Member'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($albumsMember['Member']['name'], array('controller' => 'members', 'action' => 'view', $albumsMember['Member']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $albumsMember['AlbumsMember']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Albums Member', true), array('action' => 'edit', $albumsMember['AlbumsMember']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Albums Member', true), array('action' => 'delete', $albumsMember['AlbumsMember']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albumsMember['AlbumsMember']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums Members', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Albums Member', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
