<?php
if(isset($_POST['reg_portal']) && !empty($_POST['reg_portal'])){
require_once("config.php");
$port = "";
if(isset($_POST['portal']) && !empty($_POST['portal'])){
foreach($_POST['portal'] as $key){
$port = $key;
}
}
$tok = $_POST['reg_portal'];



$tab = "
CREATE TABLE IF NOT EXISTS reg_portal(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
portal_status TEXT NOT NULL ,
token TEXT NOT NULL,
date_time TEXT NOT NULL

)
";

$sqlcmd = mysql_query($tab);
if(!$sqlcmd){

$msg="<script type='text/javascript'>alert('failed to create table!!')</script>";
echo $msg;
exit;

}

$cmd = "SELECT * FROM reg_portal ";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num == 0){
$ins = "INSERT INTO reg_portal(portal_status ,token ,date_time) VALUES('$port' ,'$tok', now()) ";
$msql = mysql_query($ins);
if(!$msql){
$msg="<script type='text/javascript'>alert('Failed to insert data')</script>";
echo $msg;
}

}
else{
$ins = "UPDATE reg_portal SET portal_status ='$port' ,token='$tok' ,date_time=now() WHERE id='1'";
$msql = mysql_query($ins);
if($msql){
$msg="<script type='text/javascript'>alert('Registration portal is now $port')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('unable to set portal status')</script>";
echo $msg;
}


}

}


?>