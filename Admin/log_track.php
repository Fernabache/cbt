<?php	
			$sess_tok = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_token'];
			$user = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'];
			$full = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_fullname'];
			$level = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] ;
			
			$insert = "INSERT INTO login_tracker(username, fullname, last_ip_address, level, OS , browser , session_token , login_time) VALUES('$user' ,'$full' ,'$ip'  ,'$level' ,'$os'  ,'$browser'  ,'$sess_tok',now())";
			$track = mysql_query($insert);
			if(!$track){
			$msg="<script type='text/javascript'>alert('Failed to track your login!')</script>";
			header("location:login-form.php?msg=$msg");
				exit();
			
			}
			?>