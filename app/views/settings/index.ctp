<div class="settings index">
	<h2><?php __('Settings');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('footer');?></th>
			<th><?php echo $this->Paginator->sort('meta_keywords');?></th>
			<th><?php echo $this->Paginator->sort('meta_description');?></th>
			<th><?php echo $this->Paginator->sort('file_types');?></th>
			<th><?php echo $this->Paginator->sort('image_types');?></th>
			<th><?php echo $this->Paginator->sort('max_upload_size');?></th>
			<th><?php echo $this->Paginator->sort('resize');?></th>
			<th><?php echo $this->Paginator->sort('max_image_width');?></th>
			<th><?php echo $this->Paginator->sort('master_image_width');?></th>
			<th><?php echo $this->Paginator->sort('master_image_height');?></th>
			<th><?php echo $this->Paginator->sort('large_image_width');?></th>
			<th><?php echo $this->Paginator->sort('large_image_height');?></th>
			<th><?php echo $this->Paginator->sort('medium_image_width');?></th>
			<th><?php echo $this->Paginator->sort('medium_image_height');?></th>
			<th><?php echo $this->Paginator->sort('thumb_width');?></th>
			<th><?php echo $this->Paginator->sort('thumb_height');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($settings as $setting):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $setting['Setting']['id']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['url']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['email']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['title']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['footer']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['meta_keywords']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['meta_description']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['file_types']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['image_types']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['max_upload_size']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['resize']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['max_image_width']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['master_image_width']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['master_image_height']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['large_image_width']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['large_image_height']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['medium_image_width']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['medium_image_height']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['thumb_width']; ?>&nbsp;</td>
		<td><?php echo $setting['Setting']['thumb_height']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $setting['Setting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $setting['Setting']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $setting['Setting']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $setting['Setting']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Setting', true), array('action' => 'add')); ?></li>
	</ul>
</div>