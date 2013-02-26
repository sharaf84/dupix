<div class="members view">
<h2><?php  __('Dschool');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dschool['Dschool']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dschool['Dschool']['name']; ?>
			&nbsp;
		</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['description']; ?>
			&nbsp;
		</dd>   
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Birthdate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dschool['Dschool']['birthdate']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gender'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo ($dschool['Dschool']['gender']) ? 'Male' : 'Female'; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dschool['Dschool']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dschool['Dschool']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Confirm Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dschool['Dschool']['confirm_code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Confirmed'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo ($dschool['Dschool']['confirmed']) ? 'Confirmed' : 'Not confirmed'; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Newsletter'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo ($dschool['Dschool']['newsletter']) ? 'Enabled' : 'Disabled'; ?>
			&nbsp;
		</dd>
		
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo ($dschool['Dschool']['type']) ? 'School' : 'Normal'; ?>
			&nbsp;
		</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Login'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo ($dschool['Dschool']['last_login']) ? 'Enabled' : 'Disabled'; ?>
			&nbsp;
		</dd>
                
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Member', true), array('action' => 'edit', $dschool['Dschool']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Member', true), array('action' => 'delete', $dschool['Dschool']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $dschool['Dschool']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Members', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index', 0, $dschool['Dschool']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add', 0, $dschool['Dschool']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Albums');?></h3>
	<?php if (!empty($dschool['Album'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Member Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($dschool['Album'] as $album):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $album['id'];?></td>
			<td><?php echo $album['title'];?></td>
			<td><?php echo $album['member_id'];?></td>
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
</div>
<div class="related">
	<h3><?php __('Related Projects');?></h3>
	<?php if (!empty($dschool['Project'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Account'); ?></th>
		<th><?php __('Place'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('Quantity'); ?></th>
		<th><?php __('Unit Price'); ?></th>
		<th><?php __('Payment Type'); ?></th>
		<th><?php __('Paid'); ?></th>
		<th><?php __('Info'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th><?php __('Member Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($dschool['Project'] as $project):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $project['id'];?></td>
			<td><?php echo $project['title'];?></td>
			<td><?php echo $project['account'];?></td>
			<td><?php echo $project['place'];?></td>
			<td><?php echo $project['status'];?></td>
			<td><?php echo $project['quantity'];?></td>
			<td><?php echo $project['unit_price'];?></td>
			<td><?php echo $project['payment_type'];?></td>
			<td><?php echo $project['paid'];?></td>
			<td><?php echo $project['info'];?></td>
			<td><?php echo $project['created'];?></td>
			<td><?php echo $project['updated'];?></td>
			<td><?php echo $project['member_id'];?></td>
			<td><?php echo $project['product_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'projects', 'action' => 'edit', $project['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'projects', 'action' => 'delete', $project['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>

<div class="related">
	<h3><?php __('Related Products');?></h3>
	<?php if (!empty($dschool['Product'])):?>
	<table cellpadding = "0" cellspacing = "0">
      
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Hot'); ?></th>
		<th><?php __('Home'); ?></th>
		<th><?php __('Section'); ?></th>
		
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($dschool['Product'] as $product):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $product['id'];?></td>
			<td><?php echo $product['title'];?></td>
			<td><?php echo $product['price'];?></td>
			<td><?php echo $product['hot'];?></td>
			<td><?php echo $product['home'];?></td>
			<td><?php echo $product['section_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'products', 'action' => 'delete', $product['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
