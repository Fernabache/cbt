<?php
require_once("../config.php");
$user = $_SESSION['CURRENT_IUO_DATA_USERNAME'];
$db = "SELECT DISTINCT(score_approval) FROM essay_submission WHERE lecturer_name='$user'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['score_approval'];
if($p == "approved"){
$msg="Examination Result is now <b>APPROVED</b>";
echo $msg;
}
elseif($p == "pending"){
$msg="Examination Portal is now <b>PENDING</b>";
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