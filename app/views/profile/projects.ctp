<?php echo $this->Html->css(array('front/cart'), null, array('inline' => false));?>
<div id="content">
	<div id="cart">
		<div class="cart_title" style="width: 100%">
			Your Projects
		</div>

		<table width="903" border="0" align="left" cellpadding="0" cellspacing="0" class="table_color">
			<tr>
				<td width="20%" height="30" align="center" valign="middle" class="table_color">Design</td>
				<td width="20%" height="30" align="center" valign="middle" class="table_color">Title</td>
				<td width="10%" height="30" align="center" valign="middle" class="table_color">Price</td>
				<td width="40%" height="30" align="center" valign="middle" class="table_color">Cart</td>
				<td width="10%" height="30" align="center" valign="middle" class="table_color">Remove</td>
			</tr>
		</table>
		<?php foreach ($projects as $project) {?>
		<table width="903" border="0" align="left" cellpadding="0" cellspacing="0" class="table_trans">
			<tr>
				<td width="20%" align="center" valign="middle" class="table_trans">
					<?php if(!empty($project['Gal'][0]['image'])){?>
					<a href="<?php echo $this->Session->read('Setting.url').'/profile/editProject/'. $project['Project']['id'];?>">
						<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/'.$project['Gal'][0]['image'];?>" alt="<?php echo $project['Product']['title'];?>" title="<?php echo $project['Product']['title'];?>" width="100" />
					</a>
					<?php }?>
				</td>
				<td width="20%" align="center" valign="middle" class="table_trans">
					<a href="<?php echo $this->Session->read('Setting.url').'/profile/editProject/'. $project['Project']['id'];?>" class="table_trans" >
						<?php echo $project['Project']['title'];?>
					</a>
				</td>
				<td width="10%" align="center" valign="middle" class="table_trans">
					<span id="unitPrice_<?php echo $project['Project']['id'];?>"><?php echo $project['Product']['price'];?></span> EGP
				</td>
				<td width="40%" align="center" valign="middle" class="table_trans">
				<?php 
				if($project['Project']['type'] == 1){
					if($project['Project']['cart'] == 1){
						echo '<div class="txt">'.$project['Project']['quantity'].' Image(s) of '. $project['Product']['title'].' in cart </div>';
					}else{ echo '<div class="txt">'.$project['Project']['quantity'].' Image(s) of '. $project['Product']['title'].' out cart </div>';?>
					<input type="hidden" name="quantity" id="quantity_<?php echo $project['Project']['id'];?>" value="<?php echo $project['Project']['quantity'];?>" class="table_quantity"/>
					<input class="submit" type="button" value="Add To Cart" onclick="updateCart('<?php echo $project['Project']['id'];?>')" />
              	<?php }} else {
	              	$quantity = 1;
					$buttonVal = "Add To Cart";
					if ($project['Project']['cart'] == 1){
						$quantity = $project['Project']['quantity'];
						$buttonVal = "Update Cart";
					}
					?>
					<input type="text" name="quantity" id="quantity_<?php echo $project['Project']['id'];?>" value="<?php echo $quantity;?>" class="table_quantity" maxlength="2" />
					<input class="submit" type="button" value="<?php echo $buttonVal;?>" onclick="updateCart('<?php echo $project['Project']['id'];?>')" />
				<?php }?>	
					<div style="width: 85%; text-align: center">
	              		<div id="cartLoading_<?php echo $project['Project']['id'];?>" class="ajaxLoading" style="float:none; margin: auto;"></div>
	                	<div id="cartResult_<?php echo $project['Project']['id'];?>" class="ajaxResult" style="display:none"></div>
	              	</div>	
				</td>
				<td width="10%" align="center" valign="middle" class="table_trans">
					<div class="deleteIcon" onclick="deleteProject('<?php echo $project['Project']['id'];?>', $(this))"></div>
				</td>
			</tr>
			<tr>
				<td colspan="6">
					<div class="cart_lines"></div>
				</td>
			<tr>
		</table>
		<? }?>

	</div>
</div>
