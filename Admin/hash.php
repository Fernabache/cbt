<?php
$level = "" ;
	if(isset($_POST['level'])){
	foreach($_POST['level'] as $key){
	$level =  $key ;
	}
	}
	echo $level;
	
?>