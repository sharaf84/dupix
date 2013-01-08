<?php
if(isset($str) && isset($type) && isset($val)){
	if($type == 'wordsCut'){
		$strArr = split(" ", $str);
		if(count($strArr) > $val){
			for($index=0; $index<$val; $index++){
				echo $strArr[$index].' ';
			}
		}
		else echo $str;
	}
	else 
		echo $str;
}
?>



