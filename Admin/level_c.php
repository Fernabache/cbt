<?php
include("page_auth.php");
?>
<div class="egra" style="margin-top:20pt;margin-bottom:20pt">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CHANGING ACCESS LEVEL FOR CPANEL USERS</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to upgrade the level of an ADMINISTRATOR  to a SUPER ADMINISTRATOR.This operation can only be done by a SUPER ADMINISTRATOR.
</p>
</div>
<?php
if(isset($_POST['level_access']) && !empty($_POST['level_access'])){
require_once("config.php");
$slet = "";
if(isset($_POST['publish'])){
foreach($_POST['publish'] as $key ){
$slet = $key;
}

}

$user = "";

if(isset($_POST['user'])){
foreach($_POST['user'] as $keyy ){
$user = $keyy;
}

}
$command = "UPDATE admin_register SET level = '$slet' WHERE username='$user' ";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Access Level Updated Successfully')</script>";
echo $msg;
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<table cellpadding="10px" cellspacing="5px" border="0px">
<tr>
<td></td>
<td><select name="user[]" class="optn">
<?php
include("admins.php");
?>
</select></td>
</tr>

<tr>
<td></td>
<td><select name="publish[]" class="optn">
<option value="Super">Super Administrator</option>
<option value="Admin">Administrator</option>
</select></td>
</tr>

<tr>
<td><input type="hidden" name="level_access" value="superadmingrantingaccess"/>
</td>
<td>
<input type="image" src="image/qu.png" style="width:80pt;"/>
</td>
</tr>
</table>

</form></div>
</div>