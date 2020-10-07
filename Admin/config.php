<?php
$con = mysql_connect("localhost" ,"dacracker" ,"follower1990");
if(!$con){
$msg = "Database Connection Failed";
header("location:index.php?msg=$msg");
exit;
}
$sle = mysql_select_db("iuodata" , $con);
if(!$sle){
$msg = "Selected Database Connection Failed";
header("location:index.php?msg=$msg");
exit;
}




?>