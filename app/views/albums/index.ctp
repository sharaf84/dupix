<div class="albums index">
	<h2><?php __('Albums');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('tags');?></th>
			<th><?php echo $this->Paginator->sort('caption');?></th>
			<th><?php echo $this->Paginator->sort('access');?></th>
			<th><?php echo $this->Paginator->sort('share_type');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('owner_id');?></th>
			<th><?php echo $this->Paginator->sort('member_id');?></th>
			<th><?php echo $this->Paginator->sort('friend_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($albums as $album):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $album['Album']['id']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['title']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['tags']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['caption']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['access']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['share_type']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['password']; ?>&nbsp;</td>
		<td><?php echo $album['Album']['owner_id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($album['Member']['name'], array('controller' => 'members', 'action' => 'view', $album['Member']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($album['Friend']['title'], array('controller' => 'friends', 'action' => 'view', $album['Friend']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $album['Album']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $album['Album']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $album['Album']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $album['Album']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Album', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends', true), array('controller' => 'friends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friend', true), array('controller' => 'friends', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gals', true), array('controller' => 'gals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gal', true), array('controller' => 'gals', 'action' => 'add')); ?> </li>
	</ul>
</div>