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
$msg="<b style='color:red'>Your time has expired</b>";
echo $msg;
exit;

}
}
elseif($status == 'off'){

echo "";

}
else{
echo "invalid time status" ;
}


}
else{

echo "" ;

}
?>
