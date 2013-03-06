<?php 
if (isset($product)){
	if($product['Section']['photo_print'] == 1)
		include_once ('photo_print_project.ctp');
	else {
		$firstImg = $this->Session->read('Setting.url').'/app/webroot/img/backend/placeholder.gif?123';
		if(!empty($this->data['Gal']['0']['image']))
			$firstImg = $this->Session->read('Setting.url').'/app/webroot/img/upload/'.$this->data['Gal']['0']['image'].'?123';
?>
	
<script type="text/javascript">

	var memberId = '<?php echo $memberCookie['id'];?>';
	var productId = '<?php echo $product['Product']['id'];?>';
	var placeHolderImg = siteUrl+'/app/webroot/img/backend/placeholder.gif?123';
	
	$(document).ready(function(){
		//get first album imgs
		getAlbumImgs(getFirstAlbumId());
			
		//add current class to first paging number
		$('.paging a.number:first').addClass('current');
		
		//number click set current && show its img
		$('.paging a.number').click(function(){
			$('.paging a.number').removeClass('current');
			$(this).addClass('current');
			showNumberImg();
		});
		
		//set croping iframe url
		$('#imgView').click(function (){
			//Dont open iframe if placeholder img found.
			var masterImgName = getMasterImgName($(this).attr('src')) ;
			if (masterImgName.length > 0)
				$('.iframe').attr('href', siteUrl+'/iframe/viewImg/'+masterImgName+'/'+getIdentifire()+'/'+$(this).attr('width')+'/'+$(this).attr('height'));
			else
				return false;
		});
		
		//Check first img saved
		/*$('.saveProject').click(function (){
			if($('#Gal0Image').val() == ''){
				alert('Please select your first image');
				return false;
			}
			return true;
		});*/
	
	});
	
	//show panel img at #imgView.
	function showImg(obj){
		$('.panel img').removeClass('current');
		obj.addClass('current');
		var currentSrc = obj.attr('src').replace("upload/thumb_", "upload/medium_");
		currentSrc = currentSrc+'?'+getRandNo();//to prevent img cache add somthing like imgName.jpg?randomNO 
		$('#imgView').fadeOut('1000', function(){
			$(this).attr('src', currentSrc).fadeIn('1000', function(){
				saveProjectGalInput();
			});
		});
	}
	
	//show croped img if not found show current img
	function showCropedImg(){
		var currentSrc = $('#imgView').attr('src');
		var cropedSrc = siteUrl+'/app/webroot/img/upload/'+getIdentifire()+'_'+getMasterImgName(currentSrc)+'?'+getRandNo();
		$('#imgView').attr('src', cropedSrc).error(function(){
			$(this).attr('src', currentSrc);
		}).load(function(){saveProjectGalInput();});
	}
	
	function showNumberImg(){
		var currentNumberIndex = $('.paging a.current').index();
		var numberImgName = $('#Gal'+currentNumberIndex+'Image').val();
		var numberImgSrc =  siteUrl+'/app/webroot/img/upload/'+numberImgName+'?'+getRandNo();
		$('#imgView').attr('src', numberImgSrc).error(function(){
			$(this).attr('src', placeHolderImg);
		}).load(function(){saveProjectGalInput();});
	}
	
	function showPlaceHolderImg(){
		$('#imgView').attr('src', placeHolderImg);
	}
	
	//Save ProjectGalInput with cuurent img name (image1 at input1 ...);
	function saveProjectGalInput(){
		var currentNumberIndex = $('.paging a.current').index();
		var currentImgName = getImgName($('#imgView').attr('src'));
		$('#Gal'+currentNumberIndex+'Image').val(currentImgName);
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
			<?php echo $this->Form->create('Project', array('url'=>$this->Session->read('Setting.url').'/profile/saveProject/'.$product['Product']['id'], 'id'=>'saveProjectForm'));?>
			<fieldset>
		 		<legend><?php __('Add Project Title');?></legend>
		 		<?php echo $this->Form->input('id');?>
				<?php echo $this->Form->input('title');?>
				<?php echo $this->Form->input('info', array('label'=>'Comments'));?>
				<?php 
				for($i=0; $i < $product['Product']['max_images']; $i++){
					echo $this->Form->input('Gal.'.$i.'.id', array('type'=>'hidden'));
					echo $this->Form->input('Gal.'.$i.'.image', array('type'=>'hidden'));
				}
				?>
			</fieldset>
			<?php echo $this->Form->end(__('Save', true));?>
		</div>
	</div>
</div>

<div class="link_title_category" style="width: 100%; margin-top: 15px;"><?php echo $product['Product']['title'].': '.$product['Product']['price'].' EGP';?></div>
<div class="product_image" style="margin-top: 20px;">
	<div class="product_image_img" style="background-image: url(<?php echo $this->Session->read('Setting.url').'/app/webroot/img/upload/medium_'.$product['Gal']['0']['image'];?>);background-repeat: no-repeat; ">
		<div id="projectImg" style="position: relative; top: <?php echo (380-$product['Product']['crop_height'])/2;?>px;">
			<a href="#" class="iframe cboxElement" title="Crop Image">
				<img id="imgView" src="<?php echo $firstImg;?>" name="#" width="<?php echo $product['Product']['crop_width'];?>" height="<?php echo $product['Product']['crop_height'];?>" />		
			</a>
		</div>
	</div>
</div>

<div class="paging">
	<!--<a href="#" class="prev"></a>-->
	<?php for($i=1; $i<= $product['Product']['max_images']; $i++){?>
    <a class="number" href="#"><?php echo $i;?></a>
    <?php }?>
  <!--  <a href="#" class="next"></a>-->
</div>

<div class="saveProject">
	<a href="#saveProject" class="inline">Save Project</a>
</div>
<?php }}else echo 'No product found.'?>
