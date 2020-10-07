<?php
require_once('config.php');
$db = "SELECT * FROM portal WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);

$p = $fet['portal_status'];
if($p == "closed"){
$msg="<b>Examination Portal is Closed</b>";
echo $msg;
exit;
}
?>