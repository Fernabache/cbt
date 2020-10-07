<?php
session_start();
include("config.php");
$user = $_SESSION['SESS_D_USER_EXAM'];
$sele = "SELECT * FROM exams_scores WHERE script_owner='$user' ";
$u = mysql_query($sele);
$nuim = mysql_num_rows($u);
if($nuim == 0){

echo "Their no data";

}

{

while($fer=mysql_fetch_array($u)){
$attemp[] = $fer["attempted_num"];


}

}



