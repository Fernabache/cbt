<?php
if(isset($_POST['re_appr_que']) && !empty($_POST['re_appr_que'])){
require_once("config.php");
function valj($str){
$str = @trim($str);
if(get_magic_quotes_gpc()){
$str = stripslashes($str);
}
return mysql_real_escape_string($str);

}
$id = valj($_POST['rev_id']);
$page = $_POST['current_p'];
$cat = $_POST["cat"];

$command = "UPDATE questions SET approval_status = 'pending' WHERE id='$id'" ;
$exec = mysql_query($command);
if(!$exec){
$host = $_SERVER["HTTP_HOST"];
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
header("location:$host$cat");

}
else{

$msg="<script type='text/javascript'>alert('Selected Question is Pended Successfully')</script>";
header("location:$host$cat");

}

}
else{
$msg="<script type='text/javascript'>alert('Parameter missing!!')</script>";
header("location:posted_questions.php?msg=$msg");


}
?>