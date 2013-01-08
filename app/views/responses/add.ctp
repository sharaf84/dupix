<div class="responses form">
<?php echo $this->Form->create('Response');?>
	<fieldset>
 		<legend><?php __('Add Response'); ?></legend>
	<?php
		echo $this->Form->input('Title');
		echo $this->Form->input('vpc_3DSXID');
		echo $this->Form->input('vpc_3DSenrolled');
		echo $this->Form->input('vpc_AVSRequestCode');
		echo $this->Form->input('vpc_AVSResultCode');
		echo $this->Form->input('vpc_AVS_City');
		echo $this->Form->input('vpc_AVS_Country');
		echo $this->Form->input('vpc_AVS_PostCode');
		echo $this->Form->input('vpc_AVS_StateProv');
		echo $this->Form->input('vpc_AVS_Street01');
		echo $this->Form->input('vpc_AcqAVSRespCode');
		echo $this->Form->input('vpc_AcqCSCRespCode');
		echo $this->Form->input('vpc_AcqResponseCode');
		echo $this->Form->input('vpc_Amount');
		echo $this->Form->input('vpc_AuthorizeId');
		echo $this->Form->input('vpc_BatchNo');
		echo $this->Form->input('vpc_CSCResultCode');
		echo $this->Form->input('vpc_Card');
		echo $this->Form->input('vpc_CardNum');
		echo $this->Form->input('vpc_Command');
		echo $this->Form->input('vpc_Locale');
		echo $this->Form->input('vpc_MerchTxnRef');
		echo $this->Form->input('vpc_Merchant');
		echo $this->Form->input('vpc_Message');
		echo $this->Form->input('vpc_OrderInfo');
		echo $this->Form->input('vpc_ReceiptNo');
		echo $this->Form->input('vpc_TransactionNo');
		echo $this->Form->input('vpc_TxnResponseCode');
		echo $this->Form->input('vpc_VerSecurityLevel');
		echo $this->Form->input('vpc_VerStatus');
		echo $this->Form->input('vpc_VerType');
		echo $this->Form->input('vpc_Version');
		echo $this->Form->input('vpc_TxnResponseDescription');
		echo $this->Form->input('vpc_VerStatusDescription');
		echo $this->Form->input('hashValidated');
		echo $this->Form->input('project_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Responses', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>