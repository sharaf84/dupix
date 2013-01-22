<div class="friends index">
	<h2><?php __('Grades and Classes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('title');?></th>
		<th><?php echo $this->Paginator->sort('type');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($friends as $friend):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $friend['Friend']['id']; ?>&nbsp;</td>
		<td><?php echo $friend['Friend']['title']; ?>&nbsp;</td>
		<td><?php echo ($friend['Friend']['parent_id']) ? 'Class' : 'Grade'; ?>&nbsp;</td>
                <td class="actions" style="text-align: left">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $friend['Friend']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $friend['Friend']['id'])); ?>
			<?php echo (!$friend['Friend']['parent_id']) ? $this->Html->link(__('Add Class', true), array('action' => 'addclass', $friend['Friend']['id'])) : ''; ?>
			<?php echo ($friend['Friend']['parent_id']) ? $this->Html->link(__('Add Friend', true), array('action' => 'addfriend', $friend['Friend']['id'])) : ''; ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $friend['Friend']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $friend['Friend']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Add New', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>