<?php
require_once('config.php');
$db = "SELECT * FROM msg_data WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['status'];
if($p == "enabled"){
	$p = "ENABLED";
$msg="<p style='letter-spacing:3px;color:green;margin:10px'>Message publishing status is now <b>$p</b></p>";
echo $msg;
}
elseif($p == "disabled"){
	$p = "DISABLED";
$msg="<p style='letter-spacing:3px;color:green;margin:10px'>Message publishing is now <b>$p</b></p>";
echo $msg;

}
else{
$msg="<b></b>";
echo $msg;


}
}
else{
$msg="<b>No status</b>";
echo $msg;

}
?>
