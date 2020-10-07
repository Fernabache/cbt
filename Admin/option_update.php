<?php
include('page_auth.php');
?>
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">ALLOW / DISALLOW USERS TO CHANGE SELECTED OPTIONS</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to ALLOW or DISALLOW the CBT GUI(Graphical User Interface) users from changing selected option for a particular question more than once.
</p>
</div>
<p style="padding:5px;margin-left:3px;letter-spacing:3px;color:green"><?php
include('opt_stat.php');
?>
</p>
<?php
if(isset($_POST['exam_option_update']) && !empty($_POST['exam_option_update'])){
require_once("config.php");
$port = "";
if(isset($_POST['option_status']) && !empty($_POST['option_status'])){
foreach($_POST['option_status'] as $key){
$port = $key;
}
}
$tok = $_POST['exam_option_update'];



$tab = "
CREATE TABLE IF NOT EXISTS option_update(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
status TEXT NOT NULL ,
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

$cmd = "SELECT * FROM option_update ";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num == 0){
$ins = "INSERT INTO option_update(status ,token ,date_time) VALUES('$port' ,'$tok', now()) ";
$msql = mysql_query($ins);
if(!$msql){
$msg="<script type='text/javascript'>alert('Failed to insert data')</script>";
echo $msg;
}

}
else{
$ins = "UPDATE option_update SET status ='$port' ,token='$tok' ,date_time=now() WHERE id='1'";
$msql = mysql_query($ins);
if($msql){
$msg="<script type='text/javascript'>alert('Option Update status is now $port')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('unable to set option update status')</script>";
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
<select name="option_status[]" class="optn">
<option value="Allow">Allow</option>
<option value="Disallow">Disallow</option>

</select>
</td>

</tr>

<tr>
<td>
<input type="hidden" name="exam_option_update" value="<?php $ra = "wolexzo07dacrackeristhebossofcodehouse";$raa = sha1(uniqid($ra));echo $raa;?>"/>

</td>
<td>
<input type="image" src="image/qu.png" style="width:80pt"/>
</td>

</tr>
<table>
</form>