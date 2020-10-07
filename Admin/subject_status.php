<?php
require_once("config.php");
$cmd_st = "SELECT DISTINCT(Score_approval) FROM exams_scores WHERE subject='$cat'";
$query_st = mysql_query($cmd_st);
$num_st = mysql_num_rows($query_st);

$row_st = mysql_fetch_array($query_st);
$status = $row_st['Score_approval'];




?>