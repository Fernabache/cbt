<?php
$con = mysql_connect("localhost" ,"dacracker" ,"follower1990");
if(!$con){
$msg = "Database Connection Failed";
header("location:index.php?msg=$msg");
exit;
}





?>