	<?php
	if(isset($_SESSION['SESS_D_EXAM_BUTTON_MA'])){
		
		header("location:exams.php");
		exit;
		}?>
<div style='margin-top:4%'>
<?php
require_once('config.php');
$db = "SELECT * FROM cross_platform_mode WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
$fet = mysql_fetch_array($qu);
if($num != 0){
$p = $fet['status'];
if($p == "enable"){
	
	$re = $_SERVER['PHP_SELF'];
	echo "<p style='padding:10px;letter-spacing:3px;color:green;float:left;font-size:11pt;text-transform:uppercase;'>Select the correct subject and enter the subject 4-digit pin</p>";
require_once("time_multiple_res.php");
echo "<form action='$re' onsubmit='return taken_exam()' autocomplete='off' method='POST'>";
require("select_multiple.php");
echo "<input type='password' placeholder='Enter pin' maxlength='4' required='required' class='pin' name='course_key'/>";
echo "<input type='hidden' name='hid_key' value='token_key'/>";
echo "<input type='submit' id='sublime' value='Take Selected Exam' class='gh'/>";
echo "</form>";


}
elseif($p == "disable"){


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
<script type='text/javascript'>
	    function taken_exam(){
		
		var select = document.getElementById("selectt");
		
		if(select.value() == ''){
	
			document.getElementById('sublime').disabled=true;
            document.getElementById('sublime').value='You cannot re-take exam';
            return false;
			}
			return true;
		
		}


</script>
</div>
