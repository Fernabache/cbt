<?php
require_once('config.php');
$db = "SELECT * FROM portal WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['portal_status'];
if($p == "closed"){
$msg="Examination Portal is now <b>CLOSED</b>";
echo $msg;
}
elseif($p == "opened"){
$msg="Examination Portal is now <b>OPENED</b>";
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