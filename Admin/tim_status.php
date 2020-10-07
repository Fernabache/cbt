<?php
require_once('config.php');
$db = "SELECT * FROM exam_timer WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['status'];
if($p == "on"){
$msg="Examination Timing status is now <b>On</b>";
echo $msg;
}
elseif($p == "off"){
$msg="Examination Timing status is now<b> Off</b>";
echo $msg;

}
else{
$msg="<b></b>";
echo $msg;


}
}
else{
$msg="<b>no data found in the timing database</b>";
echo $msg;

}
?>