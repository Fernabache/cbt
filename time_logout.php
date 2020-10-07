<?php
require_once('config.php');
$db_stat = "SELECT * FROM exam_timer WHERE id='1'";
$qu_stat = mysql_query($db_stat);
$num_stat = mysql_num_rows($qu_stat);
$fet_stat = mysql_fetch_array($qu_stat);
if($num_stat != 0){
$status = $fet_stat['status'];
if($status == 'on'){
include("timer_seconds.php");

if(!isset($_COOKIE["$exam_token"])){
$msg="<script type='text/javascript'>alert('No cookie is active')</script>";
header("location:logout.php?msg=$msg");
exit;


}
	
}
elseif($status == 'off'){

echo "";

}
else{
echo "" ;
}


}
else{
$msg="<script type='text/javascript'>alert('timing database failed')</script>";
header("location:logout.php?msg=$msg");
exit;


}
?>
