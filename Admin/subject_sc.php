<?php
require_once("config.php");
$sub_score = "SELECT SUM(score_point) AS exam_point FROM exams_scores WHERE subject='$cat_p' AND script_owner='$user_p' AND Score_approval = 'approved'";
$total_score = "SELECT SUM(score_point) AS total_point FROM exams_scores WHERE script_owner='$user_p' AND Score_approval = 'approved'";
$t_score = mysql_query($total_score);
$query_sub = mysql_query($sub_score);

$t_sc = mysql_fetch_array($t_score);
$subject_sc = mysql_fetch_array($query_sub);
$scor_p = $subject_sc['exam_point'];
$total_p = $t_sc['total_point'];




?>