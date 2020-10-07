<?php
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["tokler"]) && !empty($_GET["tokler"])){
function clean_input($value){
$value = @trim($value);
if(get_magic_quotes_gpc()){
$value = stripslashes($value);
}
return mysql_real_escape_string($value);
}
$id = clean_input($_GET["id"]);
$token = clean_input($_GET["tokler"]);

require_once("config.php");

$sele = "DELETE FROM cp_news WHERE id='$id' AND token='$token'";
$sele_del = mysql_query($sele);
if($sele_del){
$msg = "<script type='text/javascript'>alert('Selected post is deleted successfully')</script>";
header("location:index.php?msg=$msg");
}
else{
$msg = "<script type='text/javascript'>alert('Failed to deleted the selected post ')</script>";
header("location:index.php?msg=$msg");


}

}
else{
$msg = "<script type='text/javascript'>alert('parameter missing!')</script>";
header("location:index.php?msg=$msg");


}
?>