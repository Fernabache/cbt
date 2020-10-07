<?php
if(isset($_POST['que_appr_que']) && !empty($_POST['que_appr_que'])){
require_once("config.php");
function valht($str){
$str = @trim($str);
if(get_magic_quotes_gpc()){
$str = stripslashes($str);
}
return mysql_real_escape_string($str);

}
$id = valht($_POST['approv_id']);
$page = $_POST['current_p'];
$cat = $_POST["cat"];

$command = "UPDATE questions SET approval_status = 'approved' WHERE id='$id'" ;
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
$host = $_SERVER["HTTP_HOST"];
header("location:$host$cat");
}
else{

$msg="<script type='text/javascript'>alert('Selected Question Approved Successfully')</script>";
header("location:$host$cat");
}

}
else{
$msg="<script type='text/javascript'>alert('Parameter missing!!')</script>";
header("location:index.php?msg=$msg");


}
?>
