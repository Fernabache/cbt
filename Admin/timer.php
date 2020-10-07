<?php
include("page_auth.php");
?>

<div id="timing">
<div align="">
<img src="image/cancel.png" id="timing_cancel" style="height:15px;width:15px;" /></div>
<center><img src="image/ETS.png" id="ec"/></center>
<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>

<?php
include("time_elapse.php");
?>

<h3 class="hhh">SET EXAMINATION TIMEOUT IN HOURS</h3>

<?php
if(isset($_POST['timer']) && !empty($_POST['timer'])){
require_once("config.php");

$tok = htmlentities($_POST['timer'] ,ENT_QUOTES);
$time = htmlentities($_POST['time'] ,ENT_QUOTES);
$t_minut = $time * 60;
$t_second = $t_minut * 60;
$t_mill = $t_second * pow(10,3); 

if(!is_numeric($time)){
$msg="<script type='text/javascript'>alert('Please enter a number')</script>";
echo $msg;
exit;
}

$tab = "
CREATE TABLE IF NOT EXISTS exam_timer(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
timer TEXT NOT NULL ,
status TEXT NOT NULL,
token TEXT NOT NULL,
date_time TEXT NOT NULL

)
";

$sqlcmd = mysql_query($tab);
if(!$sqlcmd){

$msg="<script type='text/javascript'>alert('failed to create table!!')</script>";
echo $msg;
exit;

}

$cmd = "SELECT * FROM exam_timer ";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num == 0){
$ins = "INSERT INTO exam_timer(timer ,status,token ,date_time) VALUES('$t_mill' ,'on','$tok', now()) ";
$msql = mysql_query($ins);
if(!$msql){
$msg="<script type='text/javascript'>alert('Failed to insert data')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Exam timeout is now set to $time hours')</script>";
echo $msg;
}

}
else{
$ins = "UPDATE exam_timer SET timer ='$t_mill' ,status='on',token='$tok' ,date_time=now() WHERE id='1'";
$msql = mysql_query($ins);
if($msql){
if($t_mill == 1){
$msg="<script type='text/javascript'>alert('Exam timeout is now set to $time hour')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Exam timeout is now set to $time hours')</script>";
echo $msg;
}
}
else{
$msg="<script type='text/javascript'>alert('unable to set timer')</script>";
echo $msg;
}


}

}

?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
<table cellpadding="3px" width="60%">
<tr>
<td ></td>
<td ><input type="text" name="time" placeholder="compute value" required="" class="textn"/></td>
</tr>

<tr>
<td><input type="hidden" name="timer" value="<?php $ra = "wolexzo07dacrackeristhebossofcodehouse";$raa = sha1(uniqid($ra));echo $raa;?>" /></td>
<td><input type="image" src="image/set.png" style="width:100px;"/></td>
</tr>
</table>
</form>



<?php

include("t_minute.php");
include("t_seconds.php");
include('time_status.php');
include('time_converter.php');

?>



<?php

}
else
{

echo "<center><img src='image/deny.png' style='width:40%;margin:2%'/></center>";

}


?>

</div>