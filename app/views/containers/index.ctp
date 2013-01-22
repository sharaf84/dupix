<div class="containers index">
	<h2><?php __('Containers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('unit_price');?></th>
			<th><?php echo $this->Paginator->sort('quantity');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('order_id');?></th>
			<th><?php echo $this->Paginator->sort('project_id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($containers as $container):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $container['Container']['id']; ?>&nbsp;</td>
		<td><?php echo $container['Container']['unit_price']; ?>&nbsp;</td>
		<td><?php echo $container['Container']['quantity']; ?>&nbsp;</td>
		<td><?php echo $container['Container']['status']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($container['Order']['id'], array('controller' => 'orders', 'action' => 'view', $container['Order']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($container['Project']['title'], array('controller' => 'projects', 'action' => 'view', $container['Project']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($container['Product']['title'], array('controller' => 'products', 'action' => 'view', $container['Product']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $container['Container']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $container['Container']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $container['Container']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $container['Container']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Container', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>