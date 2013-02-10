<div class="albumsMembers index">
	<h2><?php __('Albums Members');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('album_id');?></th>
			<th><?php echo $this->Paginator->sort('member_id');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($albumsMembers as $albumsMember):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $albumsMember['AlbumsMember']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($albumsMember['Album']['title'], array('controller' => 'albums', 'action' => 'view', $albumsMember['Album']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($albumsMember['Member']['name'], array('controller' => 'members', 'action' => 'view', $albumsMember['Member']['id'])); ?>
		</td>
		<td><?php echo $albumsMember['AlbumsMember']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $albumsMember['AlbumsMember']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $albumsMember['AlbumsMember']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $albumsMember['AlbumsMember']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albumsMember['AlbumsMember']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Albums Member', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>