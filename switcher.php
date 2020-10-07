<?php
require_once('config.php');
$db = "SELECT * FROM cross_platform_mode WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['status'];
if($p == "enable"){
require("multiple_exam.php");

}
elseif($p == "disable"){

	if(isset($_SESSION['SESS_D_EXAM_BUTTON_MA'])){
		
		header("location:exams.php");
		}
		else{
			?>
				<img src="img/view_ex1.png" class="vewe1" onclick="parent.location='time_logon_go.php'"/>
	
			<?php
			
			
			}
}
else{
$msg="<b></b>";
echo $msg;


}
}
else{
$msg="<b>No status</b>";
echo $msg;

}
?>
