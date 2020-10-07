<?php
require_once('config.php');
$db = "SELECT * FROM cross_platform_mode WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['status'];
if($p == "enable"){


}
else{
require("tt_show.php");

}

}
else{
$msg="<b>No status</b>";
echo $msg;

}
?>
