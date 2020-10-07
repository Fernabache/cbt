<?php
require_once('config.php');
$db = "SELECT * FROM allow_status WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['status'];
if($p == "Allow"){
$msg="Option visibility status is now <b>ENABLED</b>";
echo $msg;
}
elseif($p == "Disallow"){
$msg="Option visibility status is now<b> DISABLED</b>";
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
