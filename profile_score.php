<?php

require_once("config.php");
if(!isset($_SESSION['SESS_D_USER_EXAM'])){
echo "No result";
exit;
}
$user_p = $_SESSION['SESS_D_USER_EXAM'];

$sub_p = "SELECT DISTINCT subject AS categories FROM exams_scores WHERE Score_approval = 'approved' AND script_owner='$user_p'";
$query_p = mysql_query($sub_p);
$num_p = mysql_num_rows($query_p);
if($num_p != 0){
echo "<table cellpadding='5px' width='100%' cellspacing='5px' border='1px'>";
echo "<tr><th align='left' width='60%'>SUBJECTS </th><th align='left' width='40%'>SCORES </th></tr>";
while($subject = mysql_fetch_array($query_p)){

$cat_p = $subject['categories'];

$err = "SELECT * FROM questions WHERE approval_status='approved' AND categories='$cat_p'";
$eee = mysql_query($err);
if(!$eee){
	echo "Failed to select the questions approved";
	exit;
	}

	$rut_numb = mysql_num_rows($eee);
	

require("subject_sc.php");

if($scor_p ==  ""){
echo "<tr><td>$cat_p</td><td><b>0 out of $rut_numb</b></td></tr>";
}
else{
echo "<tr><td>$cat_p</td><td><b>$scor_p out of $rut_numb</b></td></tr>";
}

}
echo "<tr><td><b>Aggregate</b></td><td><b>$total_p</b></td></tr>";
echo "</table>";

} 
else{
echo "No subject found in the database";

}

?>
