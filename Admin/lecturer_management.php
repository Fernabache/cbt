<div id="lect" align="center">

<center><img src="img/logip.png" style="width:400px;"/>
<p style="color:green"><?php
if(isset($_POST['coded'])){
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
$name = chkw($_POST["lectname"]);
$pass = md5(sha1($_POST["password"]));
$token = sha1(md5(rand(2 ,358191).uniqid()));
$select = "SELECT * FROM lecturer_data WHERE username='$user'";
$squery = mysql_query($select);
if(!$squery){
echo "failed to select data";
}
else{
$data = mysql_num_rows($squery);
$rowdata = mysql_fetch_array($squery);

if($data == 1){

echo "Username <b>($user)</b> already exist!";
}
else{
$ins = "INSERT INTO lecturer_data (Name ,username ,password , access ,token ,reg) VALUES('$name' ,'$user','$pass' , 'granted' ,'$token' ,now())";
$eru = mysql_query($ins);
if(!$eru){
echo "failed to insert data";
}
else{
echo "Data successfully submitted!";
}
}
}

}
}

?></p>
</center>
<form action="" method="POST">
<table cellpadding="5px" border="0px" cellspacing="5px">
<tr>
<td><p>Name:</p>
<input type="text" name="lectname" class="us" placeholder="Enter a fullname">
</td></tr>
<tr>
<td><p>username:</p>
<input type="text" name="lectuser" class="us" placeholder="Enter a username">
<input type="hidden" name="coded" value="<?php echo sha1(rand(23 ,4264167));?>">
</td></tr>

<tr>
<td><p>Password:</p>
<input type="password" name="password" class="us" placeholder="Enter a password">
</td></tr>

<tr>
<td>
<input type="image" src="img/registerr.png" class="subm" >
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
width:150px;

}

#lect{
padding:20px;
margin-top:20pt;

}

</style>