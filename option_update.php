<?php
$owner = $_SESSION['SESS_D_USER_EXAM'];



$updat = "UPDATE exams_scores SET answer='$opt' WHERE script_owner='$owner' AND attempted_num='$id' ";
$updateQueryer = mysql_query($updat);
if(!$updateQueryer){
$msg="Failed to Update user selected option";
echo $msg;

}
else{


$sqlCo = "SELECT * FROM questions WHERE id='$id'";

$quee = mysql_query($sqlCo);
$roww = mysql_fetch_array($quee);
$sqlCommand = "SELECT * FROM exams_scores WHERE script_owner='$owner' AND attempted_num='$id'";
$que = mysql_query($sqlCommand );
$num = mysql_num_rows($que);
$row = mysql_fetch_array($que);

if(strtolower($roww["answer"]) == strtolower($row["answer"])){


$updateCommand = "UPDATE exams_scores SET final_comment='correct' , score_point='1' WHERE script_owner='$owner' AND attempted_num='$id' ";
$updateQuery = mysql_query($updateCommand);
if(!$updateQuery){
$msg="Failed to Update option 1";
echo $msg;

}
else{
include("option_validator.php");

}

}
else{

$updateCommand = "UPDATE exams_scores SET final_comment='wrong' , score_point='0' WHERE script_owner='$owner' AND attempted_num='$id' ";
$updateQuery = mysql_query($updateCommand);
if(!$updateQuery){
$msg="Failed to Update option 2";
echo $msg;

}
else{
include("option_validator_se.php");

}

}

}


?>
