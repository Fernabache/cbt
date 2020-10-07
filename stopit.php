<?php
require_once('config.php');
$db = "SELECT * FROM cross_platform_mode WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['status'];
if($p == "enable"){
	

if(isset($_SESSION['EXAM_RESULT_STOPPED'])){
$msg="<b style='color:red'>You cannot continue this exam!!!</b>";
echo $msg;
exit;

}

}
else{

}
}

?>
