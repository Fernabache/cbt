<?php
$owner = $_SESSION['SESS_D_USER_EXAM'];
$sqlCo = "SELECT * FROM questions WHERE id='$id'";
$quee = mysql_query($sqlCo);
$roww = mysql_fetch_array($quee);
$sqlCommand = "SELECT * FROM exams_scores WHERE script_owner='$owner' AND attempted_num='$id'";
$que = mysql_query($sqlCommand );
$num = mysql_num_rows($que);
$row = mysql_fetch_array($que);
if($num != 1){

}
else{

if($row["answer"] == $roww["answer"]){


$updateCommand = "UPDATE exams_scores SET final_comment='correct' , score_point='1' WHERE script_owner='$owner' AND attempted_num='$id' ";
$updateQuery = mysql_query($updateCommand);
if(!$updateQuery){
$msg="<script type='text/javascript'>alert('Failed to Upload Scores')</script>";
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
$msg="<script type='text/javascript'>alert('Failed to Upload Scores')</script>";
echo $msg;

}
else{
include("option_validator_se.php");
}
}


}

?>