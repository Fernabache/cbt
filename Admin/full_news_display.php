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

$sele = "SELECT * FROM cp_news WHERE id='$id' AND token='$token'";
$sele_del = mysql_query($sele);
$sele_count_del = mysql_num_rows($sele_del);

if($sele_count_del == 0){

$msg = "<script type='text/javascript'>alert('Selected post does not exists')</script>";
header("location:index.php?msg=$msg");
}


if($sele_del){

$row = mysql_fetch_array($sele_del);

$id = $row["id"];
$short = $row["short"];
$full = $row["full"];
$title = $row["title"];
$token = $row["token"];
$cat = $row["categories"];
$date_time = $row["date_time"];
include("display_ext.php");


}
else{
$msg = "<script type='text/javascript'>alert('Failed to deleted the selected post ')</script>";
header("location:index.php?msg=$msg");


}

}
else{
$msg = "<script type='text/javascript'>alert('Selected post does not exists in the database ')</script>";
header("location:index.php?msg=$msg");


}
?>