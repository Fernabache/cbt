<?php

if(isset($_POST['hid_key'])){
	require_once('config.php');
	function dataw($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
$select ="";

if(isset($_POST['selector'])){
	foreach($_POST['selector'] as $yt){
		$select = $yt;
		}
	
	}
	
	$key_post = dataw($_POST['course_key']);
	
	
	if(empty($select)){
		
		echo "<p style='color:red;letter-spacing:2px;margin-top:2%;margin-bottom:2%'>You can't re-take the selected exam</p>";
		
		}	
		else{
	
$setr = "SELECT * FROM subject_pin WHERE subject='$select' AND pin='$key_post'";
$mt = mysql_query($setr);
$numre = mysql_num_rows($mt);
$ter = mysql_fetch_array($mt);
$term = $ter["time_allocated"] * 60;
if($numre == 1){
$ter = mysql_fetch_array($mt);
			$use = $_SESSION['SESS_D_USER_EXAM'];
$_SESSION['course_session'] = $select; 



			/*====== starting of restriction bypass ======*/
			 
	         $db_stat_mode = "SELECT * FROM mode_bypass WHERE id='1'";
             $qu_stat_mode = mysql_query($db_stat_mode);
             $num_stat_mode = mysql_num_rows($qu_stat_mode);
             $fet_stat_mode = mysql_fetch_array($qu_stat_mode);
             if($num_stat_mode != 0){
             $status = $fet_stat_mode['status'];
               if($status == 'disable'){ 
				   
				   	$usel = "SELECT * FROM attendance_multiple WHERE username='$use' AND subject='$select'";
			$ju =mysql_query($usel);
			
			if(!$ju){
				echo "<p style='color:red;letter-spacing:2px;margin-top:2%;margin-bottom:2%'>Failed to select from attendance table</p>";
				exit();
				}
				$tum = mysql_num_rows($ju);
				
				if($tum == 1){
					echo "<p style='color:red;letter-spacing:2px;margin-top:2%;margin-bottom:2%'>You can't re-login to take this course (<b>$select</b>) again</p>";
				
					}else{
						require("time_cross.php");
						}
				   
				    }
				    
				    elseif($status == 'enable'){
				require("time_cross.php");
						
						}
				    else{
				    
				    echo "<p>No status is set to bypass retriction mode!</p>";
				    
				    }
               
               
               
               }    else{
				   echo "NO status is found for restriction bypass! ";
				   
				   
				   }            
		
		     
		     
				/*====== ending of restriction bypass ======*/


	}
	else{
		echo "<p style='color:red;letter-spacing:2px;margin-top:2%;margin-bottom:2%'>Please enter the correct subject pin</p>";
		
		}

	
	}
	}
	else{
		
		
		echo "";
		}
?>
