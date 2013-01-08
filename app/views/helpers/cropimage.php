<?php 
class CropimageHelper extends Helper {
    var $helpers = array('Html', 'Javascript', 'Form');
    var $components = array('Upload');

    function createJavaScript($imgW, $imgH, $cropW, $cropH) {
			return $this->output("<script type=\"text/javascript\">
				function preview(img, selection) {
					var scaleX = $cropW / selection.width;
					var scaleY = $cropH / selection.height;

					$('#thumbnail + div > img').css({
						width: Math.round(scaleX * $imgW) + 'px',
						height: Math.round(scaleY * $imgH) + 'px',
						marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
						marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
					});
					$('#x1').val(selection.x1);
					$('#y1').val(selection.y1);
					$('#x2').val(selection.x2);
					$('#y2').val(selection.y2);
					$('#w').val(selection.width);
					$('#h').val(selection.height);
				}

				$(document).ready(function () {
					$('#save_thumb').click(function() {
						var x1 = $('#x1').val();
						var y1 = $('#y1').val();
						var x2 = $('#x2').val();
						var y2 = $('#y2').val();
						var w = $('#w').val();
						var h = $('#h').val();
						if(x1==\"\" || y1==\"\" || x2==\"\" || y2==\"\"|| w==\"\" || h==\"\"){
							alert('Please choose a area to crop...');
							return false;
						}else{
							return true;
					}
				});
				
				$(window).load(function () {
					$('#thumbnail').imgAreaSelect({ aspectRatio: '$cropW:$cropH', onSelectChange: preview });
				});
			$('.showmaster').click(
			function(){
				$('#master').show(1000);
				$(this).hide();
			}
			);
			
			});


			</script>");
    }

    function createForm($imageName, $cropW, $cropH, $size, $imageDir){
        	$x1   		  = $this->Form->hidden('x1', array("value" => "", "id"=>"x1"));
            $y1 		  = $this->Form->hidden('y1', array("value" => "", "id"=>"y1"));
            $x2 		  = $this->Form->hidden('x2', array("value" => "", "id"=>"x2",));
            $y2           = $this->Form->hidden('y2', array("value" => "", "id"=>"y2"));
            $w            = $this->Form->hidden('w', array("value" => "", "id"=>"w"));
            $h            = $this->Form->hidden('h', array("value" => "", "id"=>"h"));
            $imgName      = $this->Form->hidden('imageName', array("value" => $imageName));
            $masterImg    = $this->Html->image('upload/'.$imageName, array('style'=>'margin-right: 10px;', 'id'=>'thumbnail', 'title'=>'Master Image'));
            $imgCropPrev  = $this->Html->image('upload/'.$imageName, array('style'=>'position: relative;', 'title'=>'Thumbnail Preview'));
            $croppedImgDiv = ''; 
            
            if(file_exists($imageDir.$size.'_'.$imageName))
            	$croppedImgDiv = "<div class = 'clear' style = 'width: ".$cropW."px; height: ".$cropH."px;''>"
            					.$this->Html->image('upload/'.$size.'_'.$imageName.'?'.rand(), array('style'=>'position: absolute;', 'title'=>'Croped Image'))
            					."</div><span>Cropped Image</span>";
            					
            return $this->output("
                <div class='showmaster'style='display:none;'><a href='#'><strong>Show original image</strong></a></div>
				<div  class = 'clear' style ='margin-left: 20px;' >
					<!--<span style = 'font-size: 20px'>Crop $size image</span>-->
		            <div class = 'clear' id='master'>
		            	$masterImg
		            <!--<div class = 'clear' style='position: relative; overflow: hidden; width: ".$cropW."px; height: ".$cropH."px;'> 
		            		$imgCropPrev
		            	</div>
		            	<span>Crop preview</span><br/>-->
		            </div>
		            $croppedImgDiv
	            </div>
	            $x1 $y1 $x2 $y2 $w $h $imgName");
    } 
}
?>