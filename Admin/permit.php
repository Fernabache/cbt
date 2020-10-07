<?php
if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['ans']) && !empty($_POST['ans'])){
require_once("config.php");
function clean($str) {
 $str = @trim($str);
   if(get_magic_quotes_gpc()){
   $str = stripslashes($str);

   }
return mysql_real_escape_string($str);
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

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

require_once("os.php");

function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
            '/msie/i'       =>  'Internet Explorer',
            '/firefox/i'    =>  'Firefox',
            '/safari/i'     =>  'Safari',
            '/chrome/i'     =>  'Chrome',
            '/opera/i'      =>  'Opera',
            '/netscape/i'   =>  'Netscape',
            '/maxthon/i'    =>  'Maxthon',
            '/konqueror/i'  =>  'Konqueror',
            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}







if (!is_uploaded_file($_FILES['upload']['tmp_name'])){
$msg="<script type='text/javascript'>alert('No file to Upload!')</script>";
header("location:register.php?msg=$msg");
exit();
}
if ($_FILES['upload']['size'] > 300000){

$msg="<script type='text/javascript'>alert('File Upload Exceed 300kb!')</script>";
header("location:register.php?msg=$msg");
exit();

}
	
	
if ($_FILES['upload']['type'] == 'image/jpeg' || $_FILES['upload']['type'] == 'image/png' || $_FILES['upload']['type'] == 'image/gif' || $_FILES['upload']['type'] == 'image/pjpeg')
{

$uploadfile = clean($_FILES['upload']['tmp_name']);
$uploadname = clean($_FILES['upload']['name']);
$uploadsize = clean($_FILES['upload']['size']);
$uploadtype = clean($_FILES['upload']['type']);
$uploaddata = clean(file_get_contents($uploadfile)); 


$full = clean($_POST['full']);
$user = clean($_POST['user']) ;
$gender = clean($_POST['gen']) ;
$salt = "wolexzo07dacrackerthewhitehathacker";
$pass = clean(md5(sha1($_POST['pass'].$salt)));
$email = clean($_POST['email']) ;
$abt = clean($_POST['abt']) ;

$ip = getRealIpAddress();
$os =   getOS();
$browser  =   getBrowser();
$token = sha1(md5(rand(0 ,28937449029374893)));

$level = "" ;
if(isset($_POST['level'])){
foreach($_POST['level'] as $key){
$level =  $key ;
}
}

$title = "" ;
if(isset($_POST['title'])){
foreach($_POST['title'] as $keyy){
$title =  $keyy ;
}
}

$tab = "
CREATE TABLE IF NOT EXISTS admin_register(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY ,
photo LONGBLOB DEFAULT NULL,
picsize varchar(100) DEFAULT NULL,
picname varchar(100) DEFAULT NULL,
pictype varchar(100) DEFAULT NULL,
fullname TEXT NOT NULL ,
username TEXT NOT NULL ,
email TEXT NOT NULL ,
password TEXT NOT NULL ,
level TEXT NOT NULL ,
access TEXT NOT NULL ,
gender TEXT NOT NULL ,
title TEXT NOT NULL ,
ip_address TEXT NOT NULL,
OS TEXT NOT NULL ,
browser TEXT NOT NULL ,
token TEXT NOT NULL ,

Time_Stamp TEXT NOT NULL,
about TEXT NOT NULL 

)


";

$insert = "INSERT INTO admin_register(photo, picsize, picname, pictype,fullname , username , email ,password , level , gender ,title ,ip_address , OS , browser , token , Time_Stamp ,about) VALUES('$uploaddata', '$uploadsize', '$uploadname', '$uploadtype','$full','$user' ,'$email' ,'$pass','$level','$gender','$title' ,'$ip' ,'$os' ,'$browser'  ,'$token',now() ,'$abt')";
$select = "SELECT * FROM admin_register WHERE username = '$user'";
$em = "SELECT * FROM admin_register WHERE email = '$email'";

$query = mysql_query($tab);
if(!$query){
$msg="<script type='text/javascript'>alert('Table Creation Failed!')</script>";
header("location:register.php?msg=$msg");
exit();

}
$slet = mysql_query($select);
$num = mysql_num_rows($slet);

$emm = mysql_query($em);
$mm = mysql_num_rows($emm);
if($mm == 1){
$msg="<script type='text/javascript'>alert('Email already taken')</script>";
header("location:register.php?msg=$msg");
exit();

}


if($num != 1){
$inser = mysql_query($insert);
if($inser){
$msg="<script type='text/javascript'>alert('Registration successfull!')</script>";
header("location:login-form.php?msg=$msg");
exit();


}
else{
$msg="<script type='text/javascript'>alert('Registration Process failed!!')</script>";
header("location:register.php?msg=$msg");
exit();


}


}

else{

$msg="<script type='text/javascript'>alert('Username already Exist!!')</script>";
header("location:register.php?msg=$msg");
exit();


}

}
}
else{

$msg="<script type='text/javascript'>alert('Parameter missing please try again!!')</script>";
header("location:register.php?msg=$msg");
exit();


}

?>