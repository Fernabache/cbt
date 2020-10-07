<?php



$user = $_SESSION['SESS_D_USER_EXAM'];

$select = "SELECT DISTINCT(categories) FROM questions WHERE approval_status='approved'";
$my = mysql_query($select);
$num = mysql_num_rows($my);
if(!$my){
	
	echo "failed to select";
	exit();
	
	}
	else{
	
	if($num == 0){
		
		echo "no subject approved";
		
		}
	else{
		echo "<select name='selector[]' id='selectt'>";
		while($row = mysql_fetch_array($my)){
			$cat = $row["categories"];
			
			$select_score = "SELECT DISTINCT(subject) FROM exams_scores WHERE script_owner='$user' AND subject='$cat'";
			$mr = mysql_query($select_score);
			$num = mysql_num_rows($mr);
			$rf = mysql_fetch_assoc($mr);
			
			/*====== starting of restriction bypass ======*/
			 
			 $db_stat_mode = "SELECT * FROM mode_bypass WHERE id='1'";
             $qu_stat_mode = mysql_query($db_stat_mode);
             $num_stat_mode = mysql_num_rows($qu_stat_mode);
             $fet_stat_mode = mysql_fetch_array($qu_stat_mode);
             if($num_stat_mode != 0){
             $status = $fet_stat_mode['status'];
               if($status == 'disable'){ 
				   
				   	$ftw = "<option value='$cat'>$cat</option>";
		     if($num != 0){
				 $ftw = "<option value=''>$cat Taken already</option>";
				 $cat = "";
				 echo $ftw;
				 
				 }
				 
				 else{
					 echo $ftw;
					 
					 }
				   
				    }
				    
				    elseif($status == 'enable'){
							$ftw = "<option value='$cat'>$cat</option>";
		     if($num != 0){
				 $ftw = "<option value='$cat'>$cat</option>";
				 $cat = "";
				 echo $ftw;
				 }
				 
				 else{
					 echo $ftw;
					 
					 }
						
						}
				    else{
				    
				    echo "<p>No status is set to bypass retriction mode!</p>";
				    
				}
               
               
               
               }    else{
				   echo "NO status is found for restriction bypass! ";
				   
				   
				   }            
		
		     
		     
				/*====== ending of restriction bypass ======*/
				
			
			
			}
			echo "</select>";
		
		}
	}
	
?>
<style type='text/css'>
select {
	width:300px;
	float:left;
	}
	.pin{
		padding:10px;
		width:280px;
		float:left;
		}
option{
	padding:10px;
	
	}
	.gh{
		float:left;
		padding:10px;
		
		}

</style>
