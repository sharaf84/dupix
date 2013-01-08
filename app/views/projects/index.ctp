<div class="projects index">
	<h2><?php __('Projects');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('title');?></th>
		<th><?php echo $this->Paginator->sort('place');?></th>
		<th><?php echo $this->Paginator->sort('status');?></th>
		<th><?php echo $this->Paginator->sort('quantity');?></th>
		<th><?php echo $this->Paginator->sort('unit_price');?></th>
		<th><?php echo $this->Paginator->sort('payment_type');?></th>
		<th><?php echo $this->Paginator->sort('paid');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('member_id');?></th>
		<th><?php echo $this->Paginator->sort('product_id');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($projects as $project):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $project['Project']['id']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['title']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['place']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['status']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['quantity']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['unit_price']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['payment_type']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['paid']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['created']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($project['Member']['name'], array('controller' => 'members', 'action' => 'view', $project['Member']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($project['Product']['title'], array('controller' => 'products', 'action' => 'view', $project['Product']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Project', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responses', true), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response', true), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>