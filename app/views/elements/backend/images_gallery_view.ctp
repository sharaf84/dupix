<?php 
if (!empty($gallery)){		
	echo $this->Javascript->link('rotator/stepcarousel', false);
	echo $this->Javascript->link('rotator/setup1', false);
	echo $this->Html->css('rotator/stepcarousel', null, array('inline'=>false));
	//Add dragdrop css && scripts if sort = true;
	if(!empty($sort) && $sort==true){
		echo $this->Html->css(array('dragdrop/common', 'dragdrop/toolbar'), null, array('inline' => false));   
		echo $this->Javascript->link('dragdrop/core', 	false); 
		echo $this->Javascript->link('dragdrop/events', false);
		echo $this->Javascript->link('dragdrop/css', false);
		echo $this->Javascript->link('dragdrop/coordinates', false);
		echo $this->Javascript->link('dragdrop/drag', false);
		echo $this->Javascript->link('dragdrop/dragsort', false);?>
		<script language="JavaScript">
			//drag drop script
			var dragsort = ToolMan.dragsort()
			window.onload = function() {
				dragsort.makeListSortable(document.getElementById("horizontaltoolbar"), horizontalOnly)
			}
			
			function horizontalOnly(item) {
				item.toolManDragGroup.horizontalOnly()
			}
			
			//sharaf
			$(document).ready(function(){
				$("div.panel").css("position", "");			
				$("#saveGalPositons").click(function(){
					$.ajax({
			    		type: "POST",
				   		url: siteUrl+"/gals/savePositions",
				   		data:$("form").serialize(),
				   		beforeSend: function(){
				   			$("#saveGalPositons").val("Loading...");
				   		},
						success:function(result){
							$("#saveGalPositons").val("Positions Saved");
				   		}
				   	});
					return false;
				});
			});
		</script>
	<?php }else $sort=false;	
	// Styel for left and right arrows to be matched with session thumb width and height.
	$styelMarginTop = $this->Session->read('Setting.thumb_height')/2 - 12;
	$styelHeight = $this->Session->read('Setting.thumb_height');
	$crop = (!empty($crop) && $crop == true)?$crop:false;
	$delete = (!empty($delete) && $crop == true)?$delete:false;
	if($delete || $crop) $styelHeight+=20; //hieght + 20 to make place for Delete and Crop links
	
?>
	<div style="height: <?=$this->Session->read('Setting.thumb_height');?>px;">
        <div class="clear" align="left" style="width:5%; float:left; margin-top: <?=$styelMarginTop;?>px;">
            <a href="javascript:stepcarousel.stepBy('gallery1',%20-1)">
                <?php 
				echo $this->Html->Image(
					'backend/rightarrow.png',
					array('border'=>'0')
				);
				?>
            </a>
        </div>
        <div id="gallery1" class="stepcarousel clear" style="width:90%; height:<?=$styelHeight;?>px; float:left; text-align:center;" >
            <div style="width: 1300px; left: 0px;" class="belt">
            	<ul id="horizontaltoolbar" class="toolbar1 horizontaltoolbar">
	            <?php
	            $i=1;				 
	            foreach($gallery as $record){ 
	            	$record['size'] = 'thumb';
					$delete = (!empty($delete))? array('model'=>'Gal', 'id'=>$record['id'], 'field'=>'image'):false;				
	            ?>
	            	<li>
	            		<input type="hidden" name="galIds[]" value="<?php echo $record['id']; ?>">
		                <div class="panel">
		                    <?php
		                    	//echo '<div style="margin-bottom:0px">'.substr($record['caption'],0,30).'</div>'; 
		                    	echo $this->element('backend/image_view', array('data'=>$record, 'delete'=>$delete, 'crop'=>$crop));	
		                    ?>
		                </div>
	                </li>
	            <?php }?>
            	</ul>
            </div>
        </div>
        <div class="clear" align="right" style="width:5%; float:left; margin-top: <?=$styelMarginTop;?>px;">
            <a href="javascript:stepcarousel.stepBy('gallery1',%20+1)">
                <?php 
				echo $this->Html->Image(
					'backend/leftarrow.png',
					array('border'=>'0')
				);
				?>
            </a>
        </div>
	</div>
	<?php if($sort){?> 
		<input type="button" id="saveGalPositons" value="Save Positions" style="width: 150px; margin-left: 300px;">
	<?php }?>
<?php } else echo __('No Gallery Found.');?>



