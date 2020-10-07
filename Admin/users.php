<?php
require_once("config.php");


$num = mysql_num_rows($query);
$cmd = "SELECT * FROM register";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num != 0){
while($row = mysql_fetch_array($query)){
$user = $row['username'];

$statCmd = "SELECT DISTINCT(Score_approval) FROM exams_scores WHERE script_owner = '$user' ";
$stat_query = mysql_query($statCmd);
$stat_count = mysql_num_rows($stat_query);
if($stat_count == 0){
$rowwer = mysql_fetch_array($stat_query);
$status = $rowwer['Score_approval'];
echo "<option value='$user'>";
echo $user . " (no status)";
echo "</option>";

}
else{
$rowwer = mysql_fetch_array($stat_query);
$status = $rowwer['Score_approval'];
echo "<option value='$user'>";
echo $user . " ($status)";
echo "</option>";

}

}

}
else{
echo "No users";

}


?>