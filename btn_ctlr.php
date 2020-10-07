<?php
require_once('config.php');
$db = "SELECT * FROM result_button WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['status'];
if($p == "enable"){
?>

<a href="result_p.php" target="_blank"><img src="img/cr.png" class="proimger" onmouseover="tooltip.pop(this, '#demo2_tip')"/></a>

<?php
}

else{



}
}
else{
$msg="<b>No status</b>";
echo $msg;

}
?>
