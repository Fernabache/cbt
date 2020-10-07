<?php
session_start();
include('config.php');

$login = $_SESSION['SESS_D_USER_EXAM'];
$fmc="SELECT * FROM multiple_choice WHERE user ='$login'";
	$fms = mysql_query($fmc);
	$gy = mysql_fetch_array($fms);
	$ch = $gy["status"];
	echo $ch;
	?>