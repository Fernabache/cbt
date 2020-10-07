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
session_start();
$_SESSION['SESS_D_EXAM_BUTTON_MA'] = "ok";
$_SESSION['SESS_D_EXAM_RAND_TOKEN'] = sha1(md5(time().uniqid().rand(1234 ,562527827)));
$cthh = $_SESSION['SESS_D_EXAM_RAND_TOKEN'];
			$timet = time() + $seconds;
			$_SESSION['timeer'] = $timet;
			
			setcookie("$exam_token" ,"$exam_token" , $timet);
			header("location:exams.php?etoken=$cthh");
			
}
elseif($status == 'off'){

$_SESSION['SESS_D_EXAM_RAND_TOKEN'] = sha1(md5(time().uniqid().rand(1234 ,562527827)));
$cthh = $_SESSION['SESS_D_EXAM_RAND_TOKEN'];
header("location:exams.php?etoken=$cthh");

}
else{
echo "invalid time status" ;
}


}
else{

echo "timing database failed" ;

}
?>
