<?php
if(isset($_POST['de_appr_que']) && !empty($_POST['de_appr_que'])){
require_once("config.php");
function valh($str){
$str = @trim($str);
if(get_magic_quotes_gpc()){
$str = stripslashes($str);
}
return mysql_real_escape_string($str);

}
$id = valh($_POST['del_id']);
$cat = $_POST["cat"];

$command = "DELETE FROM questions WHERE id='$id'" ;
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
header("location:$cat");

}
else{

$msg="<script type='text/javascript'>alert('Selected Question Deleted Successfully')</script>";
header("location:$cat");

}

}

else{
$msg="<script type='text/javascript'>alert('Parameter missing!!')</script>";
header("location:posted_questions.php?msg=$msg");


}
?>