
<?php
require_once("config.php");
if(isset($_POST['token']) && !empty($_POST['token']) && isset($_POST['qtoken']) && !empty($_POST['qtoken'])){
function clean_data($value){
$value = @trim($value);
if(get_magic_quotes_gpc()){
$value = stripslashes($value);

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
			'/windows nt 6.3/i'     =>  'Windows 8.1',
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


$owner = $_SESSION['SESS_D_USER_EXAM'];
$full = $_SESSION['SESS_D_NAME_EXAM'];
$email = $_SESSION['SESS_D_EMAIL_EXAM'];


$ip = getRealIpAddress();
$os =   getOS();
$browser  =   getBrowser();

$token = clean_data($_POST['token']);
$qtoken = clean_data($_POST['qtoken']);
$id = clean_data($_POST['id']);


foreach($_POST['ans'] as $units){
$post[] = $units;

}
$arr = strtolower(implode($post ,"-"));


$tab = "
CREATE TABLE IF NOT EXISTS exams_scores(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
fullname TEXT NOT NULL , 
script_owner TEXT NOT NULL ,
owner_email TEXT NOT NULL,
exam_type TEXT NOT NULL ,
subject TEXT NOT NULL ,
answer TEXT NOT NULL ,
correct_ans TEXT NOT NULL,
attempted_num TEXT NOT NULL , 
ques_token TEXT NOT NULL,
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
echo $msg;
exit;
}


$select = "SELECT * FROM exams_scores WHERE attempted_num='$id' AND ques_token='$qtoken' AND script_owner='$owner'";
$query = mysql_query($select);

if(!$query){
$msg = "<script type='text/javascript'>alert('Failed to select!')</script>";
echo $msg;
exit;
}
$count = mysql_num_rows($query);



$selector = "SELECT * FROM questions WHERE approval_status='approved' AND id='$id'";
$queryer = mysql_query($selector);
if(!$queryer){
$msg = "<script type='text/javascript'>alert('Failed to select!')</script>";
echo $msg;
exit;
}
else{

$row = mysql_fetch_array($queryer);
$correct_ans = strtolower($row["answer"]);
$m_ans = explode("||",strtolower($row["answer"]));
if($count == 1){

if(in_array($arr ,$m_ans)){
$update = "UPDATE exams_scores SET final_comment='correct' ,score_point='1' , answer='$arr'  WHERE attempted_num='$id' AND ques_token='$qtoken' AND script_owner='$owner'";
$q = mysql_query($update);

if(!$q){
$msg = "<script type='text/javascript'>alert('Failed to insert correct data!')</script>";
echo $msg;
}
else{
$msg = "<script type='text/javascript'>alert('correct!')</script>";
echo $msg;
}

}
elseif(!in_array($arr ,$m_ans)){
$update = "UPDATE exams_scores SET final_comment='wrong' ,score_point='0' , answer='$arr'  WHERE attempted_num='$id' AND ques_token='$qtoken' AND script_owner='$owner'";
$q = mysql_query($update);

if(!$q){
$msg = "<script type='text/javascript'>alert('Failed to insert correct data!')</script>";
echo $msg;
}
else{
$msg = "<script type='text/javascript'>alert('wrong!')</script>";
echo $msg;
}
}
else{
$msg = "<script type='text/javascript'>alert('No answer!')</script>";
echo $msg;
}

}

else{
if(in_array($arr ,$m_ans)){
$insert = "INSERT INTO exams_scores(fullname , script_owner , owner_email , exam_type , subject , answer , correct_ans , attempted_num , ques_token , final_comment ,score_point , score_approval , ip_address , OS , browser , date_time , token) VALUES('$full' ,'$owner' , '$email' ,'$etype' ,'$cat' , '$arr' , '$correct_ans' , '$id' ,'$qtoken' , 'correct' , '1' ,'pending' ,'$ip' ,'$os' ,'$browser' ,now() ,'$token')";
$q = mysql_query($insert);
if(!$q){
$msg = "<script type='text/javascript'>alert('Failed to insert correct data!')</script>";
echo $msg;
}
else{
$msg = "<script type='text/javascript'>alert('correct!')</script>";
echo $msg;
}

}
elseif(!in_array($arr ,$m_ans)){
$insert = "INSERT INTO exams_scores(fullname , script_owner , owner_email , exam_type , subject , answer , correct_ans , attempted_num , ques_token , final_comment ,score_point , score_approval , ip_address , OS , browser , date_time , token) VALUES('$full' ,'$owner' , '$email' ,'$etype' ,'$cat' , '$arr' , '$correct_ans' , '$id' ,'$qtoken' , 'wrong' , '0' ,'pending' ,'$ip' ,'$os' ,'$browser' ,now() ,'$token')";
$q = mysql_query($insert);
if(!$q){
$msg = "<script type='text/javascript'>alert('Failed to insert correct data!')</script>";
echo $msg;
}
else{
$msg = "<script type='text/javascript'>alert('wrong!')</script>";
echo $msg;
}
}
else{
$msg = "<script type='text/javascript'>alert('No answer!')</script>";
echo $msg;
}

}

}



}
else{
echo "";
}
?>