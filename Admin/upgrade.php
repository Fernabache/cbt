<?php
if(isset($_GET["user"]) && !empty($_GET["user"]) && isset($_GET["token"]) && !empty($_GET["token"])){
function value($str){
$str = @trim($str);
if(get_magic_quotes_gpc()){
$str = stripslashes($str);
}
return mysql_real_escape_string($str);

}

require_once("config.php");

$user = value($_GET['user']); 
$correct_option = value($_GET['correct_answer']); 
$attempt = value($_GET['attempt']); 
$token = value($_GET['token']); 



$selectCmd = "SELECT * FROM exams_scores WHERE script_owner='$user' AND attempted_num='$attempt' AND ques_token='$token'";
$query = mysql_query($selectCmd);
$count = mysql_num_rows($query);
if($count != 0){
$update = "UPDATE exams_scores SET answer='$correct_option' , score_point = '1' , final_comment='correct' WHERE script_owner='$user' AND attempted_num='$attempt' AND ques_token='$token' ";
$update_query = mysql_query($update);
if($update_query){
$msg = "<script type='text/javascript'>alert('Question $attempt Upgraded successfully')</script>";
header("location:m_script.php?user=$user&msg=$msg");
exit;
}
else{

$msg = "<script type='text/javascript'>alert('failed to upgrade selected question score')</script>";
header("location:m_script.php?user=$user&msg=$msg");
exit;
}
}
else{
$msg = "<script type='text/javascript'>alert('Invalid question selected')</script>";
header("location:m_script.php?user=$user&msg=$msg");
exit;

}




}

else{
$msg = "<script type='text/javascript'>alert('Parameter Missing')</script>";
header("location:m_script.php?user=$user&msg=$msg");
exit;

}


?>