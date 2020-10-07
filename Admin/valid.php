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
echo " <b style='color:green'>Selected Option = " . $row["answer"]." ;</b>";
echo "&nbsp;&nbsp;";
if($row["answer"] == $roww["answer"]){

echo " <b style='color:green'>"."correct"."</b>&nbsp; <img src='image/correct.png' style='height:20px;width:20px'/>";

$updateCommand = "UPDATE exams_scores SET final_comment='correct' , score_point='1' WHERE script_owner='$owner' AND attempted_num='$id' ";
$updateQuery = mysql_query($updateCommand);
if(!$updateQuery){
$msg="<script type='text/javascript'>alert('Failed to Upload Scores')</script>";
echo $msg;
exit;

}
}
else{

echo " <b style='color:green'>"."wrong"."</b>&nbsp;<img src='image/wrong.png' style='height:20px;width:20px'/>";
$updateCommand = "UPDATE exams_scores SET final_comment='wrong' , score_point='0' WHERE script_owner='$owner' AND attempted_num='$id' ";
$updateQuery = mysql_query($updateCommand);
if(!$updateQuery){
$msg="<script type='text/javascript'>alert('Failed to Upload Scores')</script>";
echo $msg;

}
}


}

?>