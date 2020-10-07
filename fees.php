<?php

	$fsele="SELECT * FROM fee_status WHERE user ='$login'";
	$frs = mysql_query($fsele);
	$nummm = mysql_num_rows($frs);
	if($nummm == 1){
		
	$feth = mysql_fetch_array($frs);
	$amount_paid = $feth["amount_paid"];
	$amt_t_p = $feth["amount_to_pay"];
	$calc = $amt_t_p/2 ;
	if(($amount_paid < $calc)){
	
		$msg="<script type='text/javascript'>alert('Access Denied! Please complete your school fees payment.')</script>";
		header("location:login-page.php?msg=$msg");
		exit();
		
	}

	

	
	}
	
		if($nummm == 0){
		$msg="<script type='text/javascript'>alert('Access Denied! School fees payment record not found.')</script>";
		header("location:login-page.php?msg=$msg");
		exit();
	}
	
	
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
			
			session_write_close();
			include("time_logon.php");
			
			$msg="<script type='text/javascript'>alert('You are Loggged in successfully')</script>";
			header("location:index.php?msg=$msg");
			exit();
	
	?>