<?php
require_once('config.php');
$db = "SELECT * FROM cross_platform_mode WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['status'];
if($p == "disable"){


$update_all = "UPDATE register SET access='revoked' WHERE username='$owner'";
if(!mysql_query($update_all)){
$msg = "Failed to update account access!!";
echo $msg;
exit;
}
}

else{



}
}


?>

