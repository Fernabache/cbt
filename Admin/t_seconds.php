<?php
include("page_auth.php");

?>
<h3 class="hhh">SET EXAMINATION TIMEOUT IN SECONDS</h3>
<?php
if(isset($_POST['timer_seconds']) && !empty($_POST['timer_seconds'])){
require_once("config.php");

$tok = htmlentities($_POST['timer_seconds'] ,ENT_QUOTES);
$time = htmlentities($_POST['time'] ,ENT_QUOTES);

$t_mill = $time * pow(10,3); 

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
$msg="<script type='text/javascript'>alert('Exam timeout is now set to $time seconds')</script>";
echo $msg;
}

}
else{
$ins = "UPDATE exam_timer SET timer ='$t_mill' ,status='on',token='$tok' ,date_time=now() WHERE id='1'";
$msql = mysql_query($ins);
if($msql){
if($t_mill == 1){
$msg="<script type='text/javascript'>alert('Exam timeout is now set to $time second')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Exam timeout is now set to $time seconds')</script>";
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
<td><input type="hidden" name="timer_seconds" value="<?php $ra = "wolexzo07dacrackeristhebossofcodehouse";$raa = sha1(uniqid($ra));echo $raa;?>" /></td>
<td><input type="image" src="image/set.png" style="width:100px;"/></td>
</tr>
</table>
</form>



