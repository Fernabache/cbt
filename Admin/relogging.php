<?php
include('page_auth.php');
?>
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">ENABLING / DISABLING OF RE-LOGGING SYSTEM( ON/OFF)</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to ALLOW or DISALLOW the CBT GUI(Graphical User Interface) users to LOGIN AGAIN after being logged out of the examination page .
</p>
</div>
<p style="padding:5px;margin-left:3px;letter-spacing:3px;color:green"><?php
include('log_status.php');
?></p>
<?php
if(isset($_POST['re-logging']) && !empty($_POST['re-logging'])){
require_once("config.php");
$port = "";
if(isset($_POST['portal']) && !empty($_POST['portal'])){
foreach($_POST['portal'] as $key){
$port = $key;
}
}
$tok = $_POST['re-logging'];



$tab = "
CREATE TABLE IF NOT EXISTS relogging(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
relogging_status TEXT NOT NULL ,
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

$cmd = "SELECT * FROM relogging ";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num == 0){
$ins = "INSERT INTO relogging(relogging_status ,token ,date_time) VALUES('$port' ,'$tok', now()) ";
$msql = mysql_query($ins);
if(!$msql){
$msg="<script type='text/javascript'>alert('Failed to insert data')</script>";
echo $msg;
}

}
else{
$ins = "UPDATE relogging SET relogging_status ='$port' ,token='$tok' ,date_time=now() WHERE id='1'";
$msql = mysql_query($ins);
if($msql){
$msg="<script type='text/javascript'>alert('Relogging status is now $port')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('unable to set relogging status')</script>";
echo $msg;
}


}

}


?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table cellpadding="10px" cellspacing="5px" border="0px">
<tr>
<td ></td>
<td >
<select name="portal[]" class="optn">
<option value="on">Enable</option>
<option value="off">Disable</option>

</select>
</td>

</tr>

<tr>
<td>
<input type="hidden" name="re-logging" value="<?php $ra = "wolexzo07dacrackeristhebossofcodehouse";$raa = sha1(uniqid($ra));echo $raa;?>"/>

</td>
<td>
<input type="image" src="image/qu.png" style="width:80pt;"/>
</td>

</tr>
<table>
</form>
<?php
include("show_exam_status.php");

?>