<?php
require_once('config.php');
$db = "SELECT * FROM mode WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['status'];
if($p == "objective_subjective"){
	$p = "OBJECTIVE AND SUBJECTIVE MODE";
$msg="<p style='letter-spacing:3px;color:green;margin:10px'>Examination Mode is now set to <b>$p</b></p>";
echo $msg;
}
elseif($p == "essay_mode"){
	$p = "ESSAY MODE";
$msg="<p style='letter-spacing:3px;color:green;margin:10px'>Examination Mode is now set to <b>$p</b></p>";
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
