<?php
include("page_auth.php");
?>
<div class="egra" style="margin-top:20pt">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CHANGE USERS PASSWORD</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to CHANGE any user's PASSWORD.
</p>
</div>
<?php
if(isset($_POST['each_all_user_password']) && !empty($_POST['each_all_user_password'])){
require_once("config.php");
function clean($str){
return htmlentities($str,ENT_QUOTES);

}
$salt = "wolexzo07dacrackertheBlAcKerhathacker199019921962";
$pass = clean(md5(sha1($_POST['pass'].$salt)));
 function check_dataa($chk){
	$chk = @trim($chk);
	if(get_magic_quotes_gpc()){
		
		}
		return mysql_real_escape_string($chk);
	
	}

$user = check_dataa($_POST['user']);
$command = "UPDATE register SET Password = '$pass' WHERE username='$user' ";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('$user password changed Successfully')</script>";
echo $msg;
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<table cellpadding="10px" cellspacing="5px" border="0px">
<tr>
<td><input type="text" placeholder="Enter matric number" name="user" onkeyup="result_confirmm(this.value)" style="margin-left:0pt;" class="textn"/>
</td>
<td>
<div id="searchh" style="margin-top:0;display:none;position:absolute;overflow:auto;box-shadow:1px 1px 1px 1px black;-moz-box-shadow:1px 1px 1px 1px black;-webkit-box-shadow:1px 1px 1px 1px black;z-index: 1000;background-color:white;opacity:0.9;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;-o--border-radius:10px;-ms-border-radius:10px"></div>

</td>
</tr>

<tr>
<td><input type="password" placeholder="Enter password" name="pass" class="textn"/></td>
<td></td>
</tr>

<tr>
<td><input type="hidden" name="each_all_user_password" value="superadmingrantingaccess"/><input type="image" src="image/qu.png" class="bnt"/>
</td>
<td>

</td>
</tr>
</table>

</form></div>
</div>


<div class="egra" style="margin-top:20pt">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CHANGE ALL USERS PASSWORD TO THE SAME THING ALL AT ONCE</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to CHANGE all users' password to the sam thing all at once.
</p>
</div>
<?php
if(isset($_POST['a_each_all_user_password']) && !empty($_POST['a_each_all_user_password'])){
require_once("config.php");
function clean($str){
return htmlentities($str,ENT_QUOTES);

}
$salt = "wolexzo07dacrackertheBlAcKerhathacker199019921962";
$pass = clean(md5(sha1($_POST['pass'].$salt)));

$command = "UPDATE register SET Password = '$pass'";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('All users password has been changed Successfully')</script>";
echo $msg;
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<table cellpadding="10px" cellspacing="5px" border="0px">


<tr>
<td></td>
<td><input type="password" placeholder="Enter password" name="pass" class="textn"/></td>
</tr>

<tr>
<td><input type="hidden" name="a_each_all_user_password" value="superadmingrantingaccess"/>
</td>
<td>
<input type="image" src="image/qu.png" class="bnt"/>
</td>
</tr>
</table>

</form></div>
</div>


