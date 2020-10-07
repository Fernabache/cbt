<?php
require_once("config.php");
$cmd_st = "SELECT DISTINCT(approval_status) FROM questions WHERE categories='$cat'";
$query_st = mysql_query($cmd_st);
$num_st = mysql_num_rows($query_st);

$row_st = mysql_fetch_array($query_st);
$status = $row_st['approval_status'];




?>