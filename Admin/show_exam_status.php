<?php
include('page_auth.php');
?>
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">ALLOW / DISALLOW USERS TO SEE CORRECT OR INCORRECT SELECTED OPTIONS</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to ALLOW or DISALLOW the CBT GUI(Graphical User Interface) users to see whether the option selected for a particular question is CORRECT or INCORRECT instantly.But please ENABLED this option only when the users cannot change selected option for a particular question more than once.
</p>
</div>
<p style="padding:5px;margin-left:3px;letter-spacing:3px;color:green"><?php
include('option_status.php');
?></p>
<?php
if(isset($_POST['exam_option']) && !empty($_POST['exam_option'])){
require_once("config.php");
$port = "";
if(isset($_POST['option_status']) && !empty($_POST['option_status'])){
foreach($_POST['option_status'] as $key){
$port = $key;
}
}
$tok = $_POST['exam_option'];



$tab = "
CREATE TABLE IF NOT EXISTS allow_status(
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

$cmd = "SELECT * FROM allow_status ";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num == 0){
$ins = "INSERT INTO allow_status(status ,token ,date_time) VALUES('$port' ,'$tok', now()) ";
$msql = mysql_query($ins);
if(!$msql){
$msg="<script type='text/javascript'>alert('Failed to insert data')</script>";
echo $msg;
}

}
else{
$ins = "UPDATE allow_status SET status ='$port' ,token='$tok' ,date_time=now() WHERE id='1'";
$msql = mysql_query($ins);
if($msql){
$msg="<script type='text/javascript'>alert('Option status is now $port')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('unable to set option status')</script>";
echo $msg;
}


}

}


?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table cellpadding="10px" cellspacing="5px" border="0px">
<tr>
<td></td>
<td>
<select name="option_status[]" class="optn">
<option value="Allow">Allow</option>
<option value="Disallow">Disallow</option>

</select>
</td>

</tr>

<tr>
<td>
<input type="hidden" name="exam_option" value="<?php $ra = "wolexzo07dacrackeristhebossofcodehouse";$raa = sha1(uniqid($ra));echo $raa;?>"/>

</td>
<td>
<input type="image" src="image/qu.png" style="width:80pt"/>
</td>

</tr>
<table>
</form>


<?php
include("option_update.php");

?>