<?php
require_once('config.php');
$db = "SELECT * FROM exam_timer WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['timer'];

echo $p;

}
else{

echo "" ;

}
?>