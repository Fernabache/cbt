<?php
if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["token"]) && !empty($_GET["token"])){
function clean_input($value){
$value = @trim($value);
if(get_magic_quotes_gpc()){
$value = stripslashes($value);
}
return mysql_real_escape_string($value);
}
$id = clean_input($_GET["id"]);
$token = clean_input($_GET["token"]);

require_once("config.php");

$sele = "DELETE FROM ip_filter WHERE id='$id' AND token='$token'";
$sele_del = mysql_query($sele);
if($sele_del){
$msg = "<script type='text/javascript'>alert('Selected ip address is deleted successfully')</script>";
header("location:ip_filter.php?msg=$msg");
}
else{
$msg = "<script type='text/javascript'>alert('Failed to delete selected ip address ')</script>";
header("location:ip_filter.php?msg=$msg");


}

}
else{
$msg = "<script type='text/javascript'>alert('parameter missing')</script>";
header("location:ip_filter.php?msg=$msg");


}
?>