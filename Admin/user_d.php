
<?php
session_start();
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] != "Super"){
	$msg="You are not authorized to view this page!";
	echo $msg;
    exit();

}

if(isset($_GET["q"]) && !empty($_GET["q"])){
require_once("config.php");
$q = htmlentities($_GET['q'], ENT_QUOTES);
$cmd = "SELECT DISTINCT script_owner , Score_approval ,fullname FROM exams_scores where script_owner LIKE '%$q%' OR fullname LIKE '%$q%'";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);

if($num != 0){
echo "<table cellpadding='10px' cellspacing='5px' width='100%' border='0' style='border:1px solid black'><tr><th align='left'>USERNAMES</th><th align='left'>FULLNAMES</th><th align='left'>EXAM STATUS</th><th align='left'>EXAM SCORES</th><th align='left'>EXAM SCRIPT</th></tr>";
while($row = mysql_fetch_array($query)){
$user = $row['script_owner'];
$status = $row['Score_approval'];
$full = $row['fullname'];
include('pp_ext.php');
}
echo "</table>";
}
else{
echo "No script was submitted by <b>$q</b>";

}}



?>
