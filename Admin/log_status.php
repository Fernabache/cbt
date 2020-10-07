<?php
require_once('config.php');
$db = "SELECT * FROM relogging WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['relogging_status'];
if($p == "on"){
$msg="Relogging status is now <b>ENABLED</b>";
echo $msg;
}
elseif($p == "off"){
$msg="Relogging status is now<b> DISABLED</b>";
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