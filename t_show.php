<?php
require_once('config.php');
require_once('timtalk.php');

$db = "SELECT * FROM exam_timer WHERE id='1' AND status='on'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
if($num != 0){
$data = mysql_fetch_array($qu);
$tim = $data['timer'];
$tim = $tim/1000;

if($tim < 120){
echo "<img src='img/timeout.png' style='width:130px;display:block;'/>";
}
else{
echo "<p style='font-size:12pt;display:block;letter-spacing:2px;color:green;border:1px solid black;margin-bottom:3%;background-color:transparent;padding:10px;'>Time Allowed  <b style='font-size:20pt'>".secondsToTime($tim)."</b></p>";

}

}
else{
echo "";
}
	?>