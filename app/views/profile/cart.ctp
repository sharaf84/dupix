<?php if(!empty($cartProjects)){?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#checkoutForm form').submit(function() {
			$("#orderResult").html('');
			var name = $.trim($('#OrderName').val());
			var phone = $.trim($('#OrderPhone').val());
			var address = $.trim($('#OrderAddress').val());
			if (name && phone && address) 
				return true;
			else{
				if (!name)
					$("#orderResult").append('<div class="order-name">Please enter your name</div>');
				if (!phone)
					$("#orderResult").append('<div class="order-phone">Please enter your phone</div>');
				if (!address)
					$("#orderResult").append('<div class="order-address">Please enter your address</div>');
				return false;
			}
		});
	});
</script>
<?php echo $this->Html->css(array('front/cart'), null, array('inline' => false));?>
<div style='display:none'>
	<div id='checkoutForm' style='padding:10px; background:#fff;'>
		<div class="orders form">
		<?php echo $this->Form->create('Order', array('url'=>$this->Session->read('Setting.url').'/profile/addOrder'));?>
			<fieldset>
		 		<legend><?php __('Checkout');?></legend>
		 		<div class="cartInfo" style="float: left; width: 100%;">
		 			<span>Buy&nbsp;</span>
					<span class="cartCount"></span> 
					<span>&nbsp;Item(s) OF Total&nbsp;</span> 
					<span class="cartPrice"><?php echo $cartPrice;?></span> 
					<span>&nbsp;EGP (CASH)</span>
				</div>
				<?php
				echo $this->Form->input('name', array('value'=>$memberCookie['name'], 'label'=>'Name<span> *</span>'));
				echo $this->Form->input('phone', array('value'=>$memberCookie['phone'], 'label'=>'Phone<span> *</span>'));
				echo $this->Lang->countrySelect('Order.country', array('default'=>$memberCookie['country']));
				echo $this->Form->input('city', array('value'=>$memberCookie['city']));
				echo $this->Form->input('area', array('value'=>$memberCookie['area']));
				echo $this->Form->input('address', array('value'=>$memberCookie['address'], 'label'=>'Address<span> *</span>'));
				echo '<div id="orderResult"></div>';
				?>
			</fieldset>
		<?php echo $this->Form->end(__('Confirm', true));?>
		</div>
	</div>
</div>

<div id="content">
	<div id="cart">
		<div class="cart_title" style="width: 100%">
			Your Cart
		</div>
		<div class="cartInfo">
			<span class="cartCount"></span> 
			<span>&nbsp;Item(s) OF Total&nbsp;</span> 
			<span class="cartPrice"><?php echo $cartPrice;?></span> 
			<span>&nbsp;EGP&nbsp;</span>
			<a href="#checkoutForm" target="_self" class="inline checkout" >Check out</a>
		</div>
		<table width="903" border="0" align="left" cellpadding="0" cellspacing="0" class="table_color">
			<tr>
				<td width="17%" height="30" align="center" valign="middle" class="table_color">Design</td>
				<td width="21%" height="30" align="center" valign="middle" class="table_color">Title</td>
				<td width="17%" height="30" align="center" valign="middle" class="table_color">Unite Price</td>
				<td width="20%" height="30" align="center" valign="middle" class="table_color">Quantity</td>
				<td width="15%" height="30" align="center" valign="middle" class="table_color">Total</td>
				<td width="10%" height="30" align="center" valign="middle" class="table_color">Remove</td>
			</tr>
		</table>
		<?php foreach ($cartProjects as $project) {?>
		<table width="903" border="0" align="left" cellpadding="0" cellspacing="0" class="table_trans">
			<tr>
				<td width="17%" align="center" valign="middle" class="table_trans">
					<?php if(!empty($project['Gal'][0]['image'])){?>
					<a href="<?php echo $this->Session->read('Setting.url').'/profile/editProject/'. $project['Project']['id'];?>">
						<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/'.$project['Gal'][0]['image'];?>" alt="<?php echo $project['Product']['title'];?>" title="<?php echo $project['Product']['title'];?>" width="100" />
					</a>
					<?php }?>
				</td>
				<td width="21%" align="center" valign="middle" class="table_trans">
					<a href="<?php echo $this->Session->read('Setting.url').'/profile/editProject/'. $project['Project']['id'];?>" class="table_trans" >
						<?php echo $project['Project']['title'];?>
					</a>
				</td>
				<td width="17%" align="center" valign="middle" class="table_trans">
					<span id="unitPrice_<?php echo $project['Project']['id'];?>"><?php echo $project['Product']['price'];?></span> EGP
				</td>
				<td width="20%" align="center" valign="middle" class="table_trans">
					<?php 
					if($project['Project']['type'] == 1)
						echo $project['Project']['quantity'].' Image(s) of '. $project['Product']['title'];
					else{
					?>
					<input type="text" name="quantity" id="quantity_<?php echo $project['Project']['id'];?>" value="<?php echo $project['Project']['quantity'];?>" class="table_quantity" maxlength="2" />
					<input type="button" value="Update" class="submit" onclick="updateCart('<?php echo $project['Project']['id'];?>')" />
					<div style="width: 85%;">
                  		<div id="cartLoading_<?php echo $project['Project']['id'];?>" class="ajaxLoading" style="float:right;"></div>
                    	<div id="cartResult_<?php echo $project['Project']['id'];?>" class="ajaxResult" style="text-align:right; display:none"></div>
               		</div>
               		<? }?>
				</td>
				<td width="15%" align="center" valign="middle" class="table_trans">
					<strong><span id="totalUnitPrice_<?php echo $project['Project']['id'];?>"><?php echo $project['Project']['quantity']*$project['Product']['price'];?></span> EGP</strong>
				</td>
				<td width="10%" align="center" valign="middle" class="table_trans">
					<div class="deleteIcon" onclick="deleteCart('<?php echo $project['Project']['id'];?>', $(this))"></div>
				</td>
			</tr>
			<tr>
				<td colspan="6">
					<div class="cart_lines"></div>
				</td>
			<tr>
		</table>
		<? }?>
		<div class="cartInfo">
			<span class="cartCount"></span> 
			<span>&nbsp;Item(s) OF Total&nbsp;</span> 
			<span class="cartPrice"><?php echo $cartPrice;?></span> 
			<span>&nbsp;EGP&nbsp;</span>
			<a href="#checkoutForm" target="_self" class="inline checkout" >Check out</a>
		</div>
	</div>
</div>
<?php }else echo 'No data found!';?>