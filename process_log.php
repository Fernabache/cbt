<?php
session_start();
if(isset($_POST['mat']) && !empty($_POST['mat']) && isset($_POST['pass']) && !empty($_POST['pass'])){

require_once('config.php');
function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	

	
	$cret = "CREATE TABLE IF NOT EXISTS user_time(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user TEXT NOT NULL,
	token TEXT NOT NULL,
	start_time TEXT NOT NULL,
	stop_time TEXT NOT NULL ,
	current_time TEXT NOT NULL
	
	)";

	$login = clean($_POST['mat']);
	
	$salt = "wolexzo07dacrackertheBlAcKerhathacker199019921962";
	$password = clean(md5(sha1($_POST['pass'].$salt)));

	$alter="SELECT * FROM register WHERE  username ='$login' AND Password = '$password' AND access = 'revoked' ";
	$resultCmd = mysql_query($alter);
	$numm = mysql_num_rows($resultCmd);
	if ($numm == 1){
		$msg="<script type='text/javascript'>alert('Your account is temporarily suspended! Please try again later or contact ICT Department')</script>";
		header("location:login-page.php?msg=$msg");
		exit();
	
	}
	
	
	$qry="SELECT * FROM register WHERE  username ='$login' AND Password = '$password' AND access = 'granted'  ";
	$result=mysql_query($qry);
	
	if($result) {
		if(mysql_num_rows($result) == 1) {

		
				/**
	fees auth begin
	**/
	$db = "SELECT * FROM fee_data WHERE id=1";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);

$p = $fet['status'];
if($p == "enabled"){

	include("fees.php");
	exit();
	
}


	
	/**
	End of fees auth
	**/
		
		
		


	        include("choice.php");
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_D_MEMBER_ID_EXAM'] = $member['id'];
			$_SESSION['SESS_D_NAME_EXAM'] = $member['Name'];
			$_SESSION['SESS_D_USER_EXAM'] = $member['username'];
			$_SESSION['SESS_D_LEVEL_EXAM'] = $member['Level'];
			$_SESSION['SESS_D_DEPT_EXAM'] = $member['Department'];
			$_SESSION['SESS_D_TITLE_EXAM'] = $member['title'];
			$_SESSION['SESS_D_EMAIL_EXAM'] = $member['email'];
			$_SESSION['SESS_D_MOBILE_EXAM'] = $member['mobile'];
			$_SESSION['SESS_D_GENDER_EXAM'] = $member['Gender'];
			$_SESSION['SESS_D_MAT_NO_EXAM'] = $member['Admission_No'];
			$_SESSION['SESS_BLIV'] = sha1(uniqid()).sha1(rand(4000 , 3000000));
			session_write_close();
			include("time_logon.php");
				
			$msg="<script type='text/javascript'>alert('You are Loggged in successfully')</script>";
			header("location:index.php?msg=$msg");
			exit();
		}
		else {
		
		
			$msg="<script type='text/javascript'>alert('Username or password incorrect!!')</script>";
			header("location:login-page.php?msg=$msg");
				exit();
		}
	}


}
else{

$msg="<script type='text/javascript'>alert('Parameter')</script>";
			header("location:index.php?msg=$msg");
				exit();

}

?>
