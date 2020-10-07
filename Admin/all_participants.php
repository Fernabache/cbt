<?php
include('page_auth.php');
?>
<center><img src="image/res.png" style="width:70%;height:;margin-bottom:20pt" alt="result"/></center>
<?php
require_once("config.php");
$cmd = "SELECT DISTINCT script_owner ,Score_approval FROM exams_scores";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);

if($num != 0){
?>
<div style="margin:1%">
<?php
echo "<table cellpadding='5px' width='100%' cellspacing='5px' border='1px'><tr><th>USERNAMES</th><th>RESULT STATUS</th><th>EXAMINATION SCORES</th><th>EXAMINATION SCRIPTS</th><th>POINT SCORES</th></tr>";
while($row = mysql_fetch_array($query)){
$user = $row['script_owner'];
$status = $row['Score_approval'];
include("score_point.php");
include('p_ext.php');
}
echo "</table>";
?>
</div>
<?php
}
else{
echo "<center><div style='margin:5%'><img src='image/no.png' style='width:40%'/></div></center> ";

}


?>