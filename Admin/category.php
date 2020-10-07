
<?php 
require_once("config.php");
$cmd_qu = "SELECT DISTINCT categories AS catego FROM questions WHERE approval_status='approved'";
$query_qu = mysql_query($cmd_qu);
$num_qu = mysql_num_rows($query_qu);
while($row_qu = mysql_fetch_array($query_qu)){
$cat_p = $row_qu['catego'];

include("s_sp.php");

echo "<td>".$cat_p ." <img src='image/goto.png' style='width:20px;'/> $scor_p"."</td>" ;




}
?>