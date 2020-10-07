<?php
require_once('config.php');
$db_stat = "SELECT * FROM relogging WHERE id='1'";
$qu_stat = mysql_query($db_stat);
$num_stat = mysql_num_rows($qu_stat);
$fet_stat = mysql_fetch_array($qu_stat);
if($num_stat != 0){
$status = $fet_stat['relogging_status'];
if($status == 'off'){
$user = $_SESSION['SESS_D_USER_EXAM'];
$command = "UPDATE register SET access='revoked' WHERE username='$user' ";
$query = mysql_query($command);
if($query){
			unset($_SESSION['SESS_D_MEMBER_ID_EXAM']);
			unset($_SESSION['SESS_D_NAME_EXAM']);
			unset($_SESSION['SESS_D_USER_EXAM']);
			unset($_SESSION['SESS_D_LEVEL_EXAM']);
			unset($_SESSION['SESS_D_DEPT_EXAM']);
			unset($_SESSION['SESS_D_TITLE_EXAM']) ;
			unset($_SESSION['SESS_D_EMAIL_EXAM']);
			unset($_SESSION['SESS_D_MOBILE_EXAM']);
			unset($_SESSION['SESS_D_GENDER_EXAM']);
			unset($_SESSION['SESS_D_MAT_NO_EXAM']) ;

			unset($_SESSION['SESS_D_EXAM_BUTTON_MA']);
			unset($_SESSION['SESS_D_EXAM_RAND_TOKEN']);
			
			if(isset($_SESSION['EXAM_RESULT_STOPPED'])){
				unset($_SESSION['EXAM_RESULT_STOPPED']);
				}
			
			$msg="<script type='text/javascript'>alert('You have been logged out successfully')</script>";
			header("location:login-page.php?msg=$msg");

}
else{
		$msg="<script type='text/javascript'>alert('Failed to log out')</script>";
			header("location:login-page.php?msg=$msg");

}





}
elseif($status == 'on'){

			unset($_SESSION['SESS_D_MEMBER_ID_EXAM']);
			unset($_SESSION['SESS_D_NAME_EXAM']);
			unset($_SESSION['SESS_D_USER_EXAM']);
			unset($_SESSION['SESS_D_LEVEL_EXAM']);
			unset($_SESSION['SESS_D_DEPT_EXAM']);
			unset($_SESSION['SESS_D_TITLE_EXAM']) ;
			unset($_SESSION['SESS_D_EMAIL_EXAM']);
			unset($_SESSION['SESS_D_MOBILE_EXAM']);
			unset($_SESSION['SESS_D_GENDER_EXAM']);
			unset($_SESSION['SESS_D_MAT_NO_EXAM']) ;

			unset($_SESSION['SESS_D_EXAM_BUTTON_MA']);
			unset($_SESSION['SESS_D_EXAM_RAND_TOKEN']);
			if(isset($_SESSION['EXAM_RESULT_STOPPED'])){
				unset($_SESSION['EXAM_RESULT_STOPPED']);
				}
			$msg="<script type='text/javascript'>alert('You have been logged out successfully')</script>";
			header("location:login-page.php?msg=$msg");
}
else{
echo "invalid relogging status" ;
}


}
else{

echo "" ;

}
?>
