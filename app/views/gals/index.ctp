<div class="gals index">
	<h2><?php __('Gals');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('caption');?></th>
			<th><?php echo $this->Paginator->sort('image');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('album_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($gals as $gal):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $gal['Gal']['id']; ?>&nbsp;</td>
		<td><?php echo $gal['Gal']['caption']; ?>&nbsp;</td>
		<td><?php echo $gal['Gal']['image']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gal['Product']['title'], array('controller' => 'products', 'action' => 'view', $gal['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($gal['Album']['title'], array('controller' => 'albums', 'action' => 'view', $gal['Album']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $gal['Gal']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $gal['Gal']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $gal['Gal']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gal['Gal']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Gal', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</div>