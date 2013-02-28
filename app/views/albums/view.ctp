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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tags'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['tags']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Caption'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['caption']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Access'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['access']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Share Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['share_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['password']; ?>
			&nbsp;
		</dd>
<!--		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Owner Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $album['Album']['owner_id']; ?>
			&nbsp;
		</dd>-->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Member'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($album['Member']['name'], array('controller' => 'members', 'action' => 'view', $album['Member']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Friend'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($album['Friend']['title'], array('controller' => 'friends', 'action' => 'view', $album['Friend']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('List Friends', true), array('controller' => 'friends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friend', true), array('controller' => 'friends', 'action' => 'add')); ?> </li>
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
		<th><?php __('Quantity'); ?></th>
		<th><?php __('Tags'); ?></th>
		<th><?php __('Location'); ?></th>
		<th><?php __('Scale'); ?></th>
		<th><?php __('Crop Info'); ?></th>
		<th><?php __('Position'); ?></th>
		<th><?php __('Member Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th><?php __('Album Id'); ?></th>
		<th><?php __('Project Id'); ?></th>
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
			<td><?php echo $gal['quantity'];?></td>
			<td><?php echo $gal['tags'];?></td>
			<td><?php echo $gal['location'];?></td>
			<td><?php echo $gal['scale'];?></td>
			<td><?php echo $gal['crop_info'];?></td>
			<td><?php echo $gal['position'];?></td>
			<td><?php echo $gal['member_id'];?></td>
			<td><?php echo $gal['product_id'];?></td>
			<td><?php echo $gal['album_id'];?></td>
			<td><?php echo $gal['project_id'];?></td>
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
			<li><?php echo $this->Html->link(__('New Gal', true), array('controller' => 'gals', 'action' => 'add', $album['Album']['id']));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Members');?></h3>
	<?php if (!empty($album['Member'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Birthdate'); ?></th>
		<th><?php __('Gender'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Password'); ?></th>
		<th><?php __('Confirm Code'); ?></th>
		<th><?php __('Confirmed'); ?></th>
		<th><?php __('Confirmed Date'); ?></th>
		<th><?php __('Newsletter'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Last Login'); ?></th>
		<th><?php __('Parent Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($album['Member'] as $member):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $member['id'];?></td>
			<td><?php echo $member['name'];?></td>
			<td><?php echo $member['birthdate'];?></td>
			<td><?php echo $member['gender'];?></td>
			<td><?php echo $member['email'];?></td>
			<td><?php echo $member['password'];?></td>
			<td><?php echo $member['confirm_code'];?></td>
			<td><?php echo $member['confirmed'];?></td>
			<td><?php echo $member['confirmed_date'];?></td>
			<td><?php echo $member['newsletter'];?></td>
			<td><?php echo $member['type'];?></td>
			<td><?php echo $member['last_login'];?></td>
			<td><?php echo $member['parent_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'members', 'action' => 'view', $member['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'members', 'action' => 'edit', $member['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'members', 'action' => 'delete', $member['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $member['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Member', true), array('controller' => 'members', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
