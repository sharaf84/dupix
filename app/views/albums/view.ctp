<div class="albums view">
<h2><?php  __('Album');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Member'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($album['Member']['name'], array('controller' => 'members', 'action' => 'view', $album['Member']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Album', true), array('action' => 'edit', $album['Album']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Album', true), array('action' => 'delete', $album['Album']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $album['Album']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members', true), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gals', true), array('controller' => 'gals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gal', true), array('controller' => 'gals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Gals');?></h3>
	<?php if (!empty($album['Gal'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Caption'); ?></th>
		<th><?php __('Image'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th><?php __('Album Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($album['Gal'] as $gal):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $gal['id'];?></td>
			<td><?php echo $gal['caption'];?></td>
			<td><?php echo $gal['image'];?></td>
			<td><?php echo $gal['product_id'];?></td>
			<td><?php echo $gal['album_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'gals', 'action' => 'view', $gal['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'gals', 'action' => 'edit', $gal['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'gals', 'action' => 'delete', $gal['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gal['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gal', true), array('controller' => 'gals', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
