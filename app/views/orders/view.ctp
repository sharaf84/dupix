<div class="orders view">
<h2><?php  __('Order');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['phone']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Country'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['country']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('City'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['city']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Address'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['address']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Payment Method'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['payment_method']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Quantity'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['quantity']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unit Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['unit_price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['updated']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($order['Project']['title'], array('controller' => 'projects', 'action' => 'view', $order['Project']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order', true), array('action' => 'edit', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Order', true), array('action' => 'delete', $order['Order']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responses', true), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response', true), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Responses');?></h3>
	<?php if (!empty($order['Response'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Vpc 3DSXID'); ?></th>
		<th><?php __('Vpc 3DSenrolled'); ?></th>
		<th><?php __('Vpc AVSRequestCode'); ?></th>
		<th><?php __('Vpc AVSResultCode'); ?></th>
		<th><?php __('Vpc AVS City'); ?></th>
		<th><?php __('Vpc AVS Country'); ?></th>
		<th><?php __('Vpc AVS PostCode'); ?></th>
		<th><?php __('Vpc AVS StateProv'); ?></th>
		<th><?php __('Vpc AVS Street01'); ?></th>
		<th><?php __('Vpc AcqAVSRespCode'); ?></th>
		<th><?php __('Vpc AcqCSCRespCode'); ?></th>
		<th><?php __('Vpc AcqResponseCode'); ?></th>
		<th><?php __('Vpc Amount'); ?></th>
		<th><?php __('Vpc AuthorizeId'); ?></th>
		<th><?php __('Vpc BatchNo'); ?></th>
		<th><?php __('Vpc CSCResultCode'); ?></th>
		<th><?php __('Vpc Card'); ?></th>
		<th><?php __('Vpc CardNum'); ?></th>
		<th><?php __('Vpc Command'); ?></th>
		<th><?php __('Vpc Locale'); ?></th>
		<th><?php __('Vpc MerchTxnRef'); ?></th>
		<th><?php __('Vpc Merchant'); ?></th>
		<th><?php __('Vpc Message'); ?></th>
		<th><?php __('Vpc OrderInfo'); ?></th>
		<th><?php __('Vpc ReceiptNo'); ?></th>
		<th><?php __('Vpc TransactionNo'); ?></th>
		<th><?php __('Vpc TxnResponseCode'); ?></th>
		<th><?php __('Vpc VerSecurityLevel'); ?></th>
		<th><?php __('Vpc VerStatus'); ?></th>
		<th><?php __('Vpc VerType'); ?></th>
		<th><?php __('Vpc Version'); ?></th>
		<th><?php __('Vpc TxnResponseDescription'); ?></th>
		<th><?php __('Vpc VerStatusDescription'); ?></th>
		<th><?php __('HashValidated'); ?></th>
		<th><?php __('Order Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($order['Response'] as $response):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $response['id'];?></td>
			<td><?php echo $response['Title'];?></td>
			<td><?php echo $response['vpc_3DSXID'];?></td>
			<td><?php echo $response['vpc_3DSenrolled'];?></td>
			<td><?php echo $response['vpc_AVSRequestCode'];?></td>
			<td><?php echo $response['vpc_AVSResultCode'];?></td>
			<td><?php echo $response['vpc_AVS_City'];?></td>
			<td><?php echo $response['vpc_AVS_Country'];?></td>
			<td><?php echo $response['vpc_AVS_PostCode'];?></td>
			<td><?php echo $response['vpc_AVS_StateProv'];?></td>
			<td><?php echo $response['vpc_AVS_Street01'];?></td>
			<td><?php echo $response['vpc_AcqAVSRespCode'];?></td>
			<td><?php echo $response['vpc_AcqCSCRespCode'];?></td>
			<td><?php echo $response['vpc_AcqResponseCode'];?></td>
			<td><?php echo $response['vpc_Amount'];?></td>
			<td><?php echo $response['vpc_AuthorizeId'];?></td>
			<td><?php echo $response['vpc_BatchNo'];?></td>
			<td><?php echo $response['vpc_CSCResultCode'];?></td>
			<td><?php echo $response['vpc_Card'];?></td>
			<td><?php echo $response['vpc_CardNum'];?></td>
			<td><?php echo $response['vpc_Command'];?></td>
			<td><?php echo $response['vpc_Locale'];?></td>
			<td><?php echo $response['vpc_MerchTxnRef'];?></td>
			<td><?php echo $response['vpc_Merchant'];?></td>
			<td><?php echo $response['vpc_Message'];?></td>
			<td><?php echo $response['vpc_OrderInfo'];?></td>
			<td><?php echo $response['vpc_ReceiptNo'];?></td>
			<td><?php echo $response['vpc_TransactionNo'];?></td>
			<td><?php echo $response['vpc_TxnResponseCode'];?></td>
			<td><?php echo $response['vpc_VerSecurityLevel'];?></td>
			<td><?php echo $response['vpc_VerStatus'];?></td>
			<td><?php echo $response['vpc_VerType'];?></td>
			<td><?php echo $response['vpc_Version'];?></td>
			<td><?php echo $response['vpc_TxnResponseDescription'];?></td>
			<td><?php echo $response['vpc_VerStatusDescription'];?></td>
			<td><?php echo $response['hashValidated'];?></td>
			<td><?php echo $response['order_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'responses', 'action' => 'view', $response['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'responses', 'action' => 'edit', $response['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'responses', 'action' => 'delete', $response['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $response['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Response', true), array('controller' => 'responses', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
