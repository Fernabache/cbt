<?php
session_start();
if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass']) && isset($_POST['auth']) && !empty($_POST['auth'])){

require_once('config.php');
function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
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




	$ip = getRealIpAddress();
	$os =   getOS();
    $browser  =   getBrowser();


	$login = clean($_POST['user']);
	
	$salt = "wolexzo07dacrackerthewhitehathacker";
	$password = clean(md5(sha1($_POST['pass'].$salt)));
	$level = "" ;
	if(isset($_POST['level'])){
	foreach($_POST['level'] as $key){
	$level =  $key ;
	}
	}
	
	
	
		
			$tab = "
			CREATE TABLE IF NOT EXISTS login_tracker(
				id INT AUTO_INCREMENT NOT NULL PRIMARY KEY ,
				fullname TEXT NOT NULL ,
				username TEXT NOT NULL ,
				last_ip_address TEXT NOT NULL,
				level TEXT NOT NULL ,
				OS TEXT NOT NULL ,
				browser TEXT NOT NULL ,
				session_token TEXT NOT NULL ,
				login_time TEXT NOT NULL
				)
				";
				
				$query = mysql_query($tab);
				if(!$query){
				$msg="Table Creation Failed!";
				header("location:login-form.php?msg=$msg");
				exit();
				}
				
				
			
			$shut="SELECT * FROM logoff WHERE status='granted'";
			$re = mysql_query($shut);
		
				$nummm = mysql_num_rows($re);
				if ($nummm == 1){
				$up = "UPDATE logoff SET status='revoked'";
				if(!$r=mysql_query($up)){
					$msg="failed to set logoff!";
				header("location:login-form.php?msg=$msg");
					
					}
	
				}
			
			
			$rev="SELECT * FROM admin_register WHERE  username ='$login' AND level='$level' AND access='revoked' AND Password = '$password' ";
			$revs=mysql_query($rev);
		
				$nummm = mysql_num_rows($revs);
				if ($nummm == 1){
				$msg="Your account is temporarily suspended! Please try again later or contact ICT Department";
				header("location:login-form.php?msg=$msg");
				exit();
	
				}
				
			$ban="SELECT * FROM admin_register WHERE  username ='$login' AND level='$level' AND access='banned' AND Password = '$password' ";
			$bans=mysql_query($ban);
		
				$banum = mysql_num_rows($bans);
				if ($banum == 1){
				$msg="You are banned from using this page! Please contact ICT Department";
				header("location:login-form.php?msg=$msg");
				exit();
	
				}
				
				
		
				$qry="SELECT * FROM admin_register WHERE  username ='$login' AND level='$level' AND access='granted' AND Password = '$password' ";
			$result=mysql_query($qry);
	
			if($result) {

			if(mysql_num_rows($result) == 1) {

			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['CodeHouseGroup_Session_Examination_Assessment_id'] = $member['id'];
			$_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'] = $member['username'];
			$_SESSION['CodeHouseGroup_Session_Examination_Assessment_fullname'] = $member['fullname'];
			$_SESSION['CodeHouseGroup_Session_Examination_Assessment_email'] = $member['email'];
			$_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] = $member['level'];
			$_SESSION['CodeHouseGroup_Session_Examination_Assessment_gender'] = $member['gender'];
			$_SESSION['CodeHouseGroup_Session_Examination_Assessment_title'] = $member['title'];
			$_SESSION['CodeHouseGroup_Session_Examination_Assessment_ip_address'] = $member['ip_address'];
			$_SESSION['CodeHouseGroup_Session_Examination_Assessment_os'] = $member['OS'];
			$_SESSION['CodeHouseGroup_Session_Examination_Assessment_token'] = $member['token'];
             
			session_write_close();
			
						$sess_tok = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_token'];
			$user = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'];
			$full = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_fullname'];
			$level = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] ;
			
			$insert = "INSERT INTO login_tracker(username, fullname, last_ip_address, level, OS , browser , session_token , login_time) VALUES('$user' ,'$full' ,'$ip'  ,'$level' ,'$os'  ,'$browser'  ,'$sess_tok',now())";
			$track = mysql_query($insert);
			if(!$track){
			$msg="Failed to track your login!";
			header("location:login-form.php?msg=$msg");
				exit();
			
			}
			
			$toke = $_POST['auth'];
			$token_update = "UPDATE admin_register SET token='$toke' WHERE username='$login'";
			$query_token_update = mysql_query($token_update);
			if(!$query_token_update){
			$msg="Failed to update token";
			header("location:login-form.php?msg=$msg");
			exit();
			}
			
			$timetout = time() + 1800;
			setcookie("$sess_tok" ,"$sess_tok" , $timetout);
			
			$url = $_POST["url"];
			header("location:$url");
			exit();
		}
		
		else {
		
		
			$msg="Login-Failed !! Try Again";
			$url = rawurlencode($_POST["url"]);
			header("location:login-form.php?u=$url&msg=$msg");
				exit();
		
		
		}
	}


}
else{

$msg="Parameter missing!!";
			header("location:login-form.php?msg=$msg");
				exit();
}

?>
