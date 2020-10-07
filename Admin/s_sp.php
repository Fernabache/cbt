
<?php
require_once("config.php");

$check_emp = "SELECT * FROM exams_scores WHERE subject='$cat_p' AND script_owner='$user_t' AND Score_approval = 'approved'";
$app = mysql_query($check_emp);
$numgh = mysql_num_rows($app);

$sub_score = "SELECT SUM(score_point) AS exam_point FROM exams_scores WHERE subject='$cat_p' AND script_owner='$user_t' AND Score_approval = 'approved'";
$total_score = "SELECT SUM(score_point) AS total_point FROM exams_scores WHERE script_owner='$user_t' AND Score_approval = 'approved'";
$t_score = mysql_query($total_score);
$query_sub = mysql_query($sub_score);

$t_sc = mysql_fetch_array($t_score);

$subject_sc = mysql_fetch_array($query_sub);

$scor_p = $subject_sc['exam_point'];
$total_p = $t_sc['total_point'];

if($scor_p == ""){

$scor_p = "0";

}
if($numgh == "0"){
	$scor_p = "NTE";
	}
	
	
	
if($total_p == ""){
$total_p = "0";

}





?>
