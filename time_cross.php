<?php
$db_stat = "SELECT * FROM exam_timer WHERE id='1'";
$qu_stat = mysql_query($db_stat);
$num_stat = mysql_num_rows($qu_stat);
$fet_stat = mysql_fetch_array($qu_stat);
if($num_stat != 0){
$status = $fet_stat['status'];
if($status == 'on'){

$seconds = $term;

$_SESSION['SESS_D_EXAM_BUTTON_MA'] = "ok";
$_SESSION['SESS_D_EXAM_RAND_TOKEN'] = sha1(md5(time().uniqid().rand(1234 ,562527827)));
$cthh = $_SESSION['SESS_D_EXAM_RAND_TOKEN'];
			$timet = time() + $seconds;
			$_SESSION['timeer'] = $timet;
			
			setcookie("$exam_token" ,"$exam_token" , $timet);
			
			
			$cre = "CREATE TABLE IF NOT EXISTS attendance_multiple(
			id INT  AUTO_INCREMENT NOT NULL PRIMARY KEY,
			username TEXT NOT NULL,
			subject TEXT NOT NULL,
			date_time TIMESTAMP NOT NULL
			
			)";
			
			$hh = mysql_query($cre);
			if(!$hh){
				echo "<p style='color:red;letter-spacing:2px;margin-top:2%;margin-bottom:2%'>Failed to create attendance table</p>";
				exit();
				}
			
			$use = $_SESSION['SESS_D_USER_EXAM'];
			$su = $_SESSION['course_session'];
			
			/*====== starting of restriction bypass ======*/
			 
		$db_stat_mode = "SELECT * FROM mode_bypass WHERE id='1'";
             $qu_stat_mode = mysql_query($db_stat_mode);
             $num_stat_mode = mysql_num_rows($qu_stat_mode);
             $fet_stat_mode = mysql_fetch_array($qu_stat_mode);
             if($num_stat_mode != 0){
             $status = $fet_stat_mode['status'];
               if($status == 'disable'){
				   		
			$usel = "SELECT * FROM attendance_multiple WHERE username='$use' AND subject='$su'";
			$ju =mysql_query($usel);
			
			if(!$ju){
				echo "<p style='color:red;letter-spacing:2px;margin-top:2%;margin-bottom:2%'>Failed to select from attendance table</p>";
				exit();
				}
				$tum = mysql_num_rows($ju);
				
				if($tum == 1){
					echo "<p style='color:red;letter-spacing:2px;margin-top:2%;margin-bottom:2%'>You can't re-login to take this course (<b>$su</b>) again</p>";
				
					}
					else{
						
						$ine = "INSERT INTO attendance_multiple(username , subject , date_time) VALUES('$use' , '$su' , now())";
						$jui = mysql_query($ine);
						if(!$jui){
						echo "<p style='color:red;letter-spacing:2px;margin-top:2%;margin-bottom:2%'>Failed to insert into attendance table</p>";
						
							}else{
							
							header("location:exams.php?etoken=$cthh");
						}
						}
				   
				    }
				    elseif($status =='enable'){
						header("location:exams.php?etoken=$cthh");
						}
						else{
							echo "NO status is set for restriction mde bymode";
							
							}
				    
				    
				    }
				    else{
						
						echo "NO status is set the bypass mode";
						
						
						}
			
	
						
						/*====== ending of restriction bypass ======*/
			
			
			
			
			
			
}
elseif($status == 'off'){

$_SESSION['SESS_D_EXAM_RAND_TOKEN'] = sha1(md5(time().uniqid().rand(1234 ,562527827)));
$cthh = $_SESSION['SESS_D_EXAM_RAND_TOKEN'];
header("location:exams.php?etoken=$cthh");

}
else{
echo "invalid time status" ;
}


}
else{

echo "timing database failed" ;

}
	
?>
