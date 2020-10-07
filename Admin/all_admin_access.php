<?php
include("page_auth.php");
?>
<div class="gr" style="margin:2pt;margin-bottom:20px">
<center><img src="image/AAM.png" id="ec"/></center>

<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>

<h3 style="padding-bottom:10px;border-bottom:1px dashed black">GRANTING / REVOKING ALL ADMINS ACCOUNT ACCESS</h3>
<p style="letter-spacing:1px">

NOTE: Please use this section to GRANT or REVOKE the ADMINISTRATOR LOGIN ACCOUNTS all at once.
</p>
</div>
<?php
if(isset($_POST['all_admin_access']) && !empty($_POST['all_admin_access'])){
require_once("config.php");
$slet = "";
if(isset($_POST['publish'])){
foreach($_POST['publish'] as $key ){
$slet = $key;
}

}

$command = "UPDATE admin_register SET access = '$slet' WHERE level='Admin' ";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Permission Updated Successfully')</script>";
echo $msg;
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<table cellpadding="10px" cellspacing="5px" border="0px">
<tr>
<td></td>
<td>
<select name="publish[]" class="optn">
<option value="granted">Grant all admin access</option>
<option value="revoked">Revoke  all admin access</option>
</select>
</td>
</tr>

<tr>
<td><input type="hidden" name="all_admin_access" value="superadmingrantingaccess"/>
</td>
<td><input type="image" src="image/qu.png" style="width:80pt;"/>
</td>
</tr>
</table>
</form>
</div>



<div class="egra" style="margin-top:20pt">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CHANGE USERS PASSWORD</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to CHANGE any user's PASSWORD.
</p>
</div>
<?php
if(isset($_POST['each_admin_user_password']) && !empty($_POST['each_admin_user_password'])){
require_once("config.php");
function clean($str){
return htmlentities($str,ENT_QUOTES);

}

 function check_dataa($chk){
	$chk = @trim($chk);
	if(get_magic_quotes_gpc()){
		
		}
		return mysql_real_escape_string($chk);
	
	}
	$salt = "wolexzo07dacrackerthewhitehathacker";
	$pass = clean(md5(sha1($_POST['pass'].$salt)));

$user = check_dataa($_POST['user']);
$command = "UPDATE admin_register SET Password = '$pass' WHERE username='$user' ";
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
<td><input type="text" placeholder="Enter username number" name="user" value="<?php echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'];?>" style="margin-left:0pt;" class="textn"/>
</td>
<td>

</td>
</tr>

<tr>
<td><input type="password" placeholder="Enter password" name="pass" class="textn"/></td>
<td></td>
</tr>

<tr>
<td><input type="hidden" name="each_admin_user_password" value="superadmingrantingaccess"/><input type="image" src="image/qu.png" class="bnt"/>
</td>
<td>

</td>
</tr>
</table>

</form></div>
</div>





<?php
include('each_admin_access.php');
include('level_c.php');
include('portal_w.php');
?>




<?php

}
else
{
echo "<center><img src='image/deny.png' style='width:40%;margin:2%'/></center>";

}


?>

</div>
