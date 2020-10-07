<?php
if(isset($_POST["files"]) && !empty($_POST["files"]) && $_POST["files"]== 'wolexzo07dacracker'){

$file_tmp = $_FILES['ufile']['tmp_name'][0];
$file_name = $_FILES['ufile']['name'][0];
$file_size = $_FILES['ufile']['size'][0];
$file_type = $_FILES['ufile']['type'][0];
$file_error = $_FILES['ufile']['error'][0];
$file_path = "uploads/".$file_name;

$file_tmp1 = $_FILES['ufile']['tmp_name'][1];
$file_name1 = $_FILES['ufile']['name'][1];
$file_size1 = $_FILES['ufile']['size'][1];
$file_type1 = $_FILES['ufile']['type'][1];
$file_error1 = $_FILES['ufile']['error'][1];
$file_path1 = "uploads/".$file_name1;

$file_tmp2 = $_FILES['ufile']['tmp_name'][2];
$file_name2 = $_FILES['ufile']['name'][2];
$file_size2 = $_FILES['ufile']['size'][2];
$file_type2 = $_FILES['ufile']['type'][2];
$file_error2 = $_FILES['ufile']['error'][2];
$file_path2 = "uploads/".$file_name2;

$file_tmp3 = $_FILES['ufile']['tmp_name'][3];
$file_name3 = $_FILES['ufile']['name'][3];
$file_size3 = $_FILES['ufile']['size'][3];
$file_type3 = $_FILES['ufile']['type'][3];
$file_error3 = $_FILES['ufile']['error'][3];
$file_path3 = "uploads/".$file_name3;


$file_tmp4 = $_FILES['ufile']['tmp_name'][4];
$file_name4 = $_FILES['ufile']['name'][4];
$file_size4 = $_FILES['ufile']['size'][4];
$file_type4 = $_FILES['ufile']['type'][4];
$file_error4 = $_FILES['ufile']['error'][4];
$file_path4 = "uploads/".$file_name4;


if(!$file_tmp || !$file_tmp1 || !$file_tmp2 || !$file_tmp3 || !$file_tmp4){
$msg = "Please upload file into all the file uploader fields" ;
header("location:index.php?msg=$msg");
exit();
}

if($file_size > 200000  || $file_size1 > 200000  || $file_size2 > 200000  || $file_size3 > 200000  || $file_size4 > 200000 ){
if($file_size > 200000){
$msg = "File $file_name greater than 200kb" ;
header("location:index.php?msg=$msg");
exit();
}
elseif($file_size1 > 200000){
$msg = "File $file_name1 greater than 200kb" ;
header("location:index.php?msg=$msg");
exit();

}
elseif($file_size2 > 200000){
$msg = "File $file_name2 greater than 200kb" ;
header("location:index.php?msg=$msg");
exit();

}
elseif($file_size3 > 200000){
$msg = "File $file_name3 greater than 200kb" ;
header("location:index.php?msg=$msg");
exit();

}

elseif($file_size4 > 200000){

$msg = "File $file_name4 greater than 200kb" ;
header("location:index.php?msg=$msg");
exit();
}
else{
$msg = "Please upload file not greater than 200kb into all the file uploader fields" ;
header("location:index.php?msg=$msg");
exit();}
}


if(!preg_match("/.(gif|jpg|png)$/i" ,$file_name)){
$msg = "This file ($file_name) format is not supported for upload" ;
header("location:index.php?msg=$msg");
exit();

}

if(!preg_match("/.(gif|jpg|png)$/i" ,$file_name1)){
$msg = "This file ($file_name1) format is not supported for upload" ;
header("location:index.php?msg=$msg");
exit();

}

if(!preg_match("/.(gif|jpg|png)$/i" ,$file_name2)){
$msg = "This file ($file_name2) format is not supported for upload" ;
header("location:index.php?msg=$msg");
exit();

}

if(!preg_match("/.(gif|jpg|png)$/i" ,$file_name3)){
$msg = "This file ($file_name3) format is not supported for upload" ;
header("location:index.php?msg=$msg");
exit();

}

if(!preg_match("/.(gif|jpg|png)$/i" ,$file_name4)){
$msg = "This file ($file_name4) format is not supported for upload" ;
header("location:index.php?msg=$msg");
exit();

}


if(file_exists($file_path)){

$msg = "The file $file_name already exist" ;
unlink($file_tmp);
header("location:index.php?msg=$msg");

exit();
}

if(file_exists($file_path1)){
$msg = "The file $file_name1 already exist" ;
unlink($file_tmp1);
header("location:index.php?msg=$msg");
exit();
}

if(file_exists($file_path2)){
$msg = "The file $file_name2 already exist" ;
unlink($file_tmp2);
header("location:index.php?msg=$msg");
exit();
}


if(file_exists($file_path3)){
$msg = "The file $file_name3 already exist" ;
unlink($file_tmp3);
header("location:index.php?msg=$msg");
exit();
}

if(file_exists($file_path4)){
$msg = "The file $file_name4 already exist" ;
unlink($file_tmp4);
header("location:index.php?msg=$msg");
exit();
}


require_once("config.php");
function  file_sanitizer($file_up){
$file_up = @trim($file_up);
if(get_magic_quotes_gpc()){
$file_up = stripslashes($file_up);
}
return mysql_real_escape_string($file_up);

}


function getRealIpAddress()
{
if (!empty($_SERVER['HTTP_CLIENT_IP']))

{
$ipadd=$_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))

{
$ipadd=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
$ipadd=$_SERVER['REMOTE_ADDR'];
}
return $ipadd;
}



$ip = getRealIpAddress();
$br = $_SERVER['HTTP_USER_AGENT'];
$t = sha1(rand(1 , 23451));
$t1 = sha1(rand(1 , 56451));
$t2 = sha1(rand(1 , 78451));
$t3 = sha1(rand(1 , 289451));
$t4 = sha1(rand(1 , 2395932));

$tab = "
CREATE TABLE IF NOT EXISTS uploads(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
file_path TEXT NOT NULL,
file_name TEXT NOT NULL,
file_size TEXT NOT NULL ,
file_type TEXT NOT NULL ,
token TEXT NOT NULL ,
ip_address TEXT NOT NULL,
browser TEXT NOT NULL,
date_time TEXT NOT NULL

)

";

$query = mysql_query($tab);
if(!$query){
$msg = "Failed to create table";
header("location:index.php?msg=$msg");
exit();
}

$insert = "
INSERT INTO uploads VALUES(null ,'$file_path' ,'$file_name','$file_size','$file_type','$t','$ip','$br',now())";
$query = mysql_query($insert);
if(!$query){
$msg = "Failed to upload file data of $file_name into the database";
header("location:index.php?msg=$msg");
exit();
}
else{
move_uploaded_file($file_tmp,$file_path);
if(!file_exists($file_path)){
$msg = "Error uploading file $file_name ,please check upload folder permission";
header("location:index.php?msg=$msg");
exit();
}
}


$insert = "INSERT INTO uploads VALUES(null ,'$file_path1','$file_name1','$file_size1','$file_type1','$t1','$ip','$br',now())";
$query = mysql_query($insert);
if(!$query){
$msg = "Failed to upload file data of $file_name1 into the database";
header("location:index.php?msg=$msg");
exit();
}
else{
move_uploaded_file($file_tmp1,$file_path1);
if(!file_exists($file_path1)){
$msg = "Error uploading file $file_name1 ,please check upload folder permission";
header("location:index.php?msg=$msg");
exit();
}
}

$insert = "INSERT INTO uploads VALUES(null ,'$file_path2','$file_name2','$file_size2','$file_type2','$t2','$ip','$br',now())";
$query = mysql_query($insert);
if(!$query){
$msg = "Failed to upload file data of $file_name2 into the database";
header("location:index.php?msg=$msg");
exit();
}
else{
move_uploaded_file($file_tmp2,$file_path2);
if(!file_exists($file_path2)){
$msg = "Error uploading file $file_name2 ,please check upload folder permission";
header("location:index.php?msg=$msg");
exit();
}
}

$insert = "INSERT INTO uploads VALUES(null ,'$file_path3','$file_name3','$file_size3','$file_type3','$t3','$ip','$br',now())";
$query = mysql_query($insert);
if(!$query){
$msg = "Failed to upload file data of $file_name3 into the database";
header("location:index.php?msg=$msg");
exit();
}
else{
move_uploaded_file($file_tmp3,$file_path3);
if(!file_exists($file_path3)){
$msg = "Error uploading file $file_name3 ,please check upload folder permission";
header("location:index.php?msg=$msg");
exit();
}
}
$insert = "INSERT INTO uploads VALUES(null ,'$file_path4','$file_name4','$file_size4','$file_type4','$t4','$ip','$br',now())";
$query = mysql_query($insert);
if(!$query){
$msg = "Failed to upload file data of $file_name4 into the database";
header("location:index.php?msg=$msg");
exit();
}
else{
move_uploaded_file($file_tmp4,$file_path4);
if(!file_exists($file_path4)){
$msg = "Error uploading file $file_name4 ,please check upload folder permission";
header("location:index.php?msg=$msg");
exit();
}

$msg = "All files uploaded successfully";
header("location:index.php?msg=$msg");
exit();
}


}
else{
$msg = "parameter missing ";
header("location:index.php?msg=$msg");
exit();

}



?>