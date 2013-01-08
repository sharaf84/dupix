<?php echo $this->Html->css(array('front/photoprint'), null, array('inline' => false));?>
<script type="text/javascript">

	var memberId = '<?php echo $memberCookie['id'];?>';
	var productId = '<?php echo $product['Product']['id'];?>';
	var placeHolderImg = siteUrl+'/app/webroot/img/backend/placeholder.gif?123';
	var count = 0;
	
	$(document).ready(function(){
		//get first album imgs
		getAlbumImgs(getFirstAlbumId());
		
		//To save project clone selectedImgs inputs to form inputs
		$('.saveProject').click(function(){
			if($('.selectedImg').length > 0){
				$('#cloneInputs input').remove();
				$('.selectedImgs input').clone().css('display', 'none').appendTo('#cloneInputs');
			}else{
				$('.pleaseSelect').css('font-size', '14px')
				return false;
			}
		})	
	});
	
	//show panel img at #imgView.
	function showImg(obj){
		$('.panel img').removeClass('current');
		obj.addClass('current');
		var currentSrc = obj.attr('src').replace("upload/thumb_", "upload/medium_");
		currentSrc = currentSrc+'?'+getRandNo();//to prevent img cache add somthing like imgName.jpg?randomNO
		appendSelectedImg(currentSrc);
	}
	
	function appendSelectedImg(currentSrc){
		$('.selectedImgs').append('<div class="selectedImg"><div class="deleteIcon" onclick="removeSelectedImg($(this));"></div><img src="'+currentSrc+'" /><input id="Gal'+count+'Id" type="hidden" name="data[Gal]['+count+'][id]" /><input id="Gal'+count+'Image" type="hidden" name="data[Gal]['+count+'][image]" value="'+getMasterImgName(currentSrc)+'" /><label>Quantity: </label><input type="text" maxlength="2" id="Gal'+count+'quantity" name="data[Gal]['+count+'][quantity]" value="1" /></div>');
		count++;
	}
	
	//Remove image
	function removeSelectedImg (obj){
		if(confirm("Confirm removing."))	
			obj.addClass('loading').parent().fadeOut('slow', function(){ obj.parent().remove(); });	
	}
		
	function getIdentifire(){
		var imgNo = 1;
		if($('.paging a.current').length > 0)
			imgNo = $('.paging a.current').index()+1;
		return memberId+','+productId+','+imgNo;
	}
	
	function getImgName(src){
		if (src.indexOf("backend/placeholder.gif") == -1){
			var imgName =  src.replace(siteUrl+"/app/webroot/img/upload/", "");
			return imgName.substr(0, imgName.length-4);//Remove last 4 char from img name '?randomNo';
		}else
			return "";
	}
	
	function getMasterImgName(src){
		var imgName = getImgName(src);
		return imgName.substr(imgName.indexOf("_")+1);//Remove medium_  or identifire_ from img name
	}
	
	function getRandNo(){
		return Math.floor(Math.random()*100) + 100;//Random number from 100-199.
	}
	
</script>

<!-- This contains the hidden content for inline calls -->
<div style="display:none">
	<div id="saveProject" style="padding:10px; background:#fff; height: 200px;">
		<div class="projects form">
			<?php echo $this->Form->create('Project', array('url'=>$this->Session->read('Setting.url').'/profile/savePhotoPrintProject/'.$product['Product']['id'], 'id'=>'saveProjectForm'));?>
			<fieldset>
		 		<legend><?php __('Add Project Title');?></legend>
		 		<?php echo $this->Form->input('id');?>
				<?php echo $this->Form->input('title');?>
				<?php echo $this->Form->input('info', array('label'=>'Comments'));?>
				<div id="cloneInputs"></div>
			</fieldset>
			<?php echo $this->Form->end(__('Save', true));?>
		</div>
	</div>
</div>

<div class="link_title_category" style="width: 100%; margin-top: 15px;"><?php echo $product['Product']['title'].': '.$product['Product']['price'];?> EGP / One Image</div>
<div class="product_image" style="margin-top: 20px;">
	<div class="selectedImgs">
		<div class="pleaseSelect">Please select an image from you albums</div>
		<?php 
		if(!empty($this->data)){
			foreach($this->data['Gal'] as $key=>$gal){
		?>
		<div class="selectedImg">
			<div class="deleteIcon" onclick="removeSelectedImg($(this));"></div>
			<img src="<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/'.$gal['image'];?>" />
			<?php 
			echo $this->Form->input('Gal.'.$key.'.id', array('type'=>'hidden'));
			echo $this->Form->input('Gal.'.$key.'.image', array('type'=>'hidden'));
			echo $this->Form->input('Gal.'.$key.'.quantity', array('label'=>'Quantity: '));
			?>
		</div>
		<?php }}?>
	</div>
</div>


<div class="saveProject">
	<a href="#saveProject" class="inline">Save Project</a>
</div>