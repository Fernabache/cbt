<?php

if(isset($_POST["user"]) && !empty($_POST["user"]) && isset($_POST["post"]) && !empty($_POST["post"])){
require_once("config.php");
function value($str){
$str = @trim($str);
if(get_magic_quotes_gpc()){
$str = stripslashes($str);
}
return mysql_real_escape_string($str);

}

function replace_wolex($open_tag ,$close_tag , $string){
$n_string = str_replace($open_tag,"",$string);
$nn_st = str_replace($close_tag,"",$n_string);
return $nn_st;
}


$open_tag = "<p>";
$close_tag = "</p>";


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

function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

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



		   $session = "";
     if(isset($_POST['session'])){
		 foreach($_POST['session'] as $key){
			 $session = $key;
			 
			 }
		 
		 }
		 
		 
       $semester = "";
     if(isset($_POST['semester'])){
		 foreach($_POST['semester'] as $key){
			 $semester = $key;
			 
			 }
		 
		 }



$cattype = "";
if(isset($_POST["cattype"])){
foreach($_POST["cattype"] as $key){
$cattype = $key;
}
}

$cat="";
if(isset($_POST["cat"])){
foreach($_POST["cat"] as $key){
$cat = $key;
}

}




$post = value(replace_wolex($open_tag ,$close_tag , $_POST["post"]));
$first = value(replace_wolex($open_tag ,$close_tag , $_POST["first"]));
$qtype = value($_POST["qtype"]);

$ip = getRealIpAddress();
$os =   getOS();
$browser  =   getBrowser();
$token = sha1(md5(rand(0 ,28937449029374893)));
$exam = value($_POST["user"]);
$tk = $_POST['tokken'];
$tab = "
CREATE TABLE IF NOT EXISTS questions(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
paper_type TEXT NOT NULL,
categories TEXT NOT NULL ,
exam_type TEXT NOT NULL ,
question TEXT NOT NULL ,
f_option TEXT NOT NULL ,
s_option TEXT NOT NULL ,
t_option TEXT NOT NULL ,
ft_option TEXT NOT NULL ,
answer TEXT NOT NULL ,
session TEXT NOT NULL,
semester TEXT NOT NULL,
examiner TEXT NOT NULL ,
approval_status Varchar(255) DEFAULT 'pending',
ip_address TEXT NOT NULL ,
OS TEXT NOT NULL ,
browser TEXT NOT NULL ,
date_time DATETIME NOT NULL ,
token TEXT NOT NULL 
)
";
$que = mysql_query($tab);
if(!$que){
$msg="<script type='text/javascript'>alert('Failed to Create table in the database! Pls try again ')</script>";
header("location:question_post_s.php?msg=$msg&token=$tk");
exit;
}
$sqlcommand = "INSERT INTO questions(paper_type ,categories , exam_type ,question ,answer , session , semester ,examiner ,ip_address , OS , browser ,date_time , token) VALUES('$qtype','$cat' , '$cattype' , '$post' ,'$first' , '$session' , '$semester' ,'$exam' ,'$ip' ,'$os' ,'$browser' , now() ,'$token')";
$sqlexe = mysql_query($sqlcommand);
if($sqlexe){

$msg="<script type='text/javascript'>alert('Question submitted successfully!!')</script>";
header("location:question_post_s.php?msg=$msg&token=$tk");
exit;
}
else{
$msg="<script type='text/javascript'>alert('Failed to Process data! Pls try again ')</script>";
header("location:question_post_s.php?msg=$msg&token=$tk");
exit;

}




}
else{
$msg="<script type='text/javascript'>alert('Parameter missing')</script>";
header("location:question_post_s.php?msg=$msg&token=$tk");
}
?>