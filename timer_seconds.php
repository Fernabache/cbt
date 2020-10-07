<?php
require_once('config.php');
$db = "SELECT * FROM exam_timer WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p_seconds = $fet['timer'];
$exam_token = $fet['token'];
$seconds = $p_seconds / 1000;


}
else{

echo "" ;

}
?>
