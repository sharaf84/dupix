<div class="friends view">
<h2><?php  __('Friend');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $friend['Friend']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $friend['Friend']['title']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Friend', true), array('action' => 'edit', $friend['Friend']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Friend', true), array('action' => 'delete', $friend['Friend']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $friend['Friend']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friend', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
<!--<div class="related">
	<h3><?php __('Related Albums');?></h3>
	<?php if (!empty($friend['Album'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Friend Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($friend['Album'] as $album):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $album['id'];?></td>
			<td><?php echo $album['title'];?></td>
			<td><?php echo $album['friend_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'albums', 'action' => 'view', $album['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'albums', 'action' => 'edit', $album['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'albums', 'action' => 'delete', $album['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $album['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>-->