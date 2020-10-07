<?php
include('page_auth.php');
?>

<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>


<div class="spacer">

<script type="text/javascript" language="javascript">
function confir_attendance(){
var answer = window.confirm("Are you sure you want to clear attendance logging data?");
if(answer){
return true;
}else{
return false;
}


}

</script>
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CLEARING OF ATTENDANCE LOGGING SYSTEM</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please be informed that by clicking this button (Clear attendance logging) ,it means that you want to reset all Administrators Attendance Logging data from the database permanently.This action cannot be undone.Thank.
</p>
</div>
<?php

if(isset($_POST['truncate_logging']) && !empty($_POST['truncate_logging'])){
require_once("config.php");
$command = "TRUNCATE TABLE login_tracker";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Data Truncated Successfully!')</script>";
echo $msg;
}






}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" onsubmit="return(confir_attendance())">
<input type="hidden" name="truncate_logging" value="truncate_processor_logging"/>
<input type="image" name=""  src="image/cle.png" style="width:200px;padding-top:5px;"/>

</form></div>
</div>

<?php
include("creat_db.php");
?>


<?php

}
else
{


}


?>