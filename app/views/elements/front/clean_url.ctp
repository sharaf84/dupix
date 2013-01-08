<?php
# This function makes any str into a url frienly
# This script is created by wallpaperama.com
//function clean_url($str)
//{
if(isset($str)){
	$str=strtolower($str);
	$code_entities_match = array(' & ',' &','& ','&',' ','--','&quot;','!','@','#','$','%','^','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','=');
	$code_entities_replace = array('-','-','-','-','-','-','','','','','','','','','','','','','','','','','','','','','','','');
	$str = str_replace($code_entities_match, $code_entities_replace, $str);
	echo $str;
}
?>
