<?php
session_start();
if(isset($_GET["opt"]) && !empty($_GET["opt"])){
function chk($value){
$value = @trim($value);
if(get_magic_quotes_gpc()){
$value = stripslashes($value) ;
}
return mysql_real_escape_string($value);
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




$id = $_GET["id"];
$opt = chk($_GET["opt"]);
$owner = $_SESSION['SESS_D_USER_EXAM'];


$ip = getRealIpAddress();
$os =   getOS();
$browser  =   getBrowser();
$token = sha1(md5(rand(0 ,728935109182)));
require_once("config.php");

$tab = "
CREATE TABLE IF NOT EXISTS exams_scores(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
script_owner TEXT NOT NULL ,
answer TEXT NOT NULL ,
attempted_num TEXT NOT NULL , 
final_comment TEXT NOT NULL,
score_point INT NOT NULL ,
Score_approval TEXT NOT NULL,
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
header("location:index.php?msg=$msg");
exit;
}


$sqlCommand = "SELECT * FROM exams_scores WHERE script_owner='$owner' AND attempted_num='$id'";
$que = mysql_query($sqlCommand );
$num = mysql_num_rows($que);

if($num != 1){

$sqlcommand = "INSERT INTO exams_scores (script_owner ,answer ,attempted_num , score_approval , ip_address , OS , browser , date_time , token ) VALUES( '$owner' , '$opt' ,'$id' , 'pending' ,'$ip' ,'$os' ,'$browser' , now() ,'$token')";
$sqlexe = mysql_query($sqlcommand);
if($sqlexe){
include("valid.php");
}

}
else{

$msg="<img src='image/sor.png' style='width:300px;'/>";
echo "<p style='color:green'>" .$msg . "</p>" ;


}

}

?>