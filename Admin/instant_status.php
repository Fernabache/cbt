<?php
require_once('config.php');
$db = "SELECT * FROM instant_pub WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['instant_status'];
if($p == "enabled"){
$p = "ENABLED";
$msg="Instant Result Publishing is <b>$p</b>";
echo $msg;
}
elseif($p == "disabled"){
$p = "DISABLED";
$msg="Instant Result Publishing is <b>$p</b>";
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