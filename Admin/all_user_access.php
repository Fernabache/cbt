<?php
include("page_auth.php");
?>

<div class="gr" style="margin:2pt">
<center><img src="image/UAM.png" id="ec"/></center>
<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>



<h3 style="padding-bottom:10px;border-bottom:1px dashed black">GRANTING / REVOKING ALL USERS ACCOUNT ACCESS</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to GRANT or REVOKE the CBT GUI(Graphical User Interface) users LOGIN ACCOUNTS all at once.
</p>
</div>

<?php
if(isset($_POST['all_user_access']) && !empty($_POST['all_user_access'])){
require_once("config.php");
$slet = "";
if(isset($_POST['publish'])){
foreach($_POST['publish'] as $key ){
$slet = $key;
}

}

$command = "UPDATE register SET access = '$slet' ";
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
<option value="granted">Grant all user access</option>
<option value="revoked">Revoke  all user access</option>
</select>
</td>
</tr>

<tr>
<td><input type="hidden" name="all_user_access" value="superadmingrantingaccess"/>
</td>
<td><input type="image" src="image/qu.png" style="width:80pt;"/>
</td>
</tr>
</table>
</form>
</div>
<?php
include('each_user_access.php');
include('password_ch.php');

include('each_result_g.php');

?>



<?php

}
else
{
echo "<center><img src='image/deny.png' style='width:40%;margin:2%'/></center>";


}


?>

</div>
