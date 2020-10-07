<?php

session_start();
include("main.php");
if(!isset($_SESSION['SESS_D_NAME_EXAM']) || !isset($_SESSION['SESS_D_USER_EXAM']) || !isset($_SESSION['SESS_D_MEMBER_ID_EXAM'])  || !isset($_SESSION['SESS_D_GENDER_EXAM']) ){
$msg="Login before access!!";
$token = sha1(md5("wolexzo07isabigboystudentthatisgoingtoovertakeeverywherethispresentyear2015"));
header("location:login-page.php?msg=$msg&token_generated=$token");

exit;
}



include("time_logout.php");
		

?>
