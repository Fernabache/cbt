<?php
include("page_auth.php");
?>
<div class="egra" style="margin-top:20pt;margin-bottom:20pt;">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">PUBLISH / PEND /CEASE ANY USER'S RESULT</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to PUBLISH / PEND /CEASE any user's result after conducting an examination.
</p>
</div>
<?php
if(isset($_POST['each_all_user_access_result']) && !empty($_POST['each_all_user_access_result'])){
require_once("config.php");
$slet = "";
if(isset($_POST['publish'])){
foreach($_POST['publish'] as $key ){
$slet = $key;
}

}
function check_dater($chk){
	$chk = @trim($chk);
	if(get_magic_quotes_gpc()){
		
		}
		return mysql_real_escape_string($chk);
	
	}
	
	$user = check_dater($_POST['user']);
	
$command = "UPDATE exams_scores SET Score_approval = '$slet' WHERE script_owner='$user' ";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('$user result is now $slet')</script>";
echo $msg;
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<table cellpadding="10px" cellspacing="5px" border="0px">
<tr>
<td>
<input type="text" placeholder="Enter matric number" name="user" onkeyup="result_confirmer(this.value)" style="margin-left:0pt;" class="textn"/>

</td>
	<td>

<div id="searc" style="margin-top:0;display:none;position:absolute;overflow:auto;box-shadow:1px 1px 1px 1px black;-moz-box-shadow:1px 1px 1px 1px black;-webkit-box-shadow:1px 1px 1px 1px black;z-index: 1000;background-color:white;opacity:0.9;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;-o--border-radius:10px;-ms-border-radius:10px"></div>
</td>
</tr>

<tr>
<td>
<select name="publish[]" class="optn">
<option value="approved">Publish user's result</option>
<option value="pended">Pend user's result </option>
<option value="ceased">Cease user's result</option>
</select>
</td>
<td></td>
</tr>

<tr>
<td><input type="hidden" name="each_all_user_access_result" value="superadmingrantingaccess"/>
<input type="image" src="image/qu.png" style="width:80pt;height:25pt;"/>
</td>
<td>

</td>
</tr>
</table>

</form></div>
</div>
