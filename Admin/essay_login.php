<?php session_start(); ?>
<div id="lect" align="center">

<center><img src="img/loginn.png" style="width:320px;"/>
<p style="color:green"><?php
if(isset($_POST['coder'])){
require_once("config.php");
$tab = "CREATE TABLE IF NOT EXISTS lecturer_data(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
Name TEXT NOT NULL ,
username TEXT NOT NULL,
password TEXT NOT NULL,
access TEXT NOT NULL,
token TEXT NOT NULL,
reg TEXT NOT NULL
)";
$sql = mysql_query($tab);
if(!$sql){
echo "Failed to create table!";
}
else{
function chkw($val){
$val = @trim($val);
if(get_magic_quotes_gpc()){
$val = stripslashes($val);

}
return mysql_real_escape_string($val);
}
$user = chkw($_POST["lectuser"]);

$pass = md5(sha1($_POST["password"]));
$token = sha1(md5(rand(2 ,358191).uniqid()));
$select = "SELECT * FROM lecturer_data WHERE username ='$user' AND password='$pass' AND access='revoked'";
$squery = mysql_query($select);
if(!$squery){
echo "failed to select data";

}else{
$data = mysql_num_rows($squery);
if($data == 1){

echo "Your account is currently suspended";
}
}

$select = "SELECT * FROM lecturer_data WHERE username='$user' AND password='$pass' AND access='granted'";
$squery = mysql_query($select);
if(!$squery){
echo "failed to select data";
}
else{
$data = mysql_num_rows($squery);
$rowdata = mysql_fetch_assoc($squery);

if($data == 1){

session_regenerate_id();
$_SESSION['CURRENT_IUO_DATA_NAME'] = $rowdata["Name"];
$_SESSION['CURRENT_IUO_DATA_USERNAME'] = $rowdata["username"];
$_SESSION['CURRENT_IUO_DATA_ACCESS'] = $rowdata["access"];
session_write_close() ;
header("location:./Essay/");
}
else{
echo "Failed to login!";
}
}

}
}

?></p>
</center>
<form action="" method="POST">
<table cellpadding="5px" border="0px" cellspacing="5px">

<td><p>username:</p>
<input type="text" name="lectuser" class="us" placeholder="Enter a username">
<input type="hidden" name="coder" value="<?php echo sha1(rand(23 ,4264167));?>">
</td></tr>

<tr>
<td><p>Password:</p>
<input type="password" name="password" class="us" placeholder="Enter a password">
</td></tr>

<tr>
<td>
<input type="image" src="img/legg.png" class="subm" >
</td></tr>
</table>
</form>
</div>
<style type="text/css">
#lect .us{
width:400px;
padding:10px;
height:50px;

}
#lect p{
letter-spacing:5px;
}
#lect .subm{
width:130px;

}

#lect{
padding:20px;
margin-top:20pt;

}

</style>
