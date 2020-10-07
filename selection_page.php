<?php
include("auth.php");
?>
<html>
<head>
<?php
include("head_b.php");
?>
<title>IUO-CBT SYSTEM- WELCOME TO THE EXAMINATION PAGE</title>
</head>
<body>
<div id="">
<div class="header">
<center>
<img src="img/banne.png" class="bnn"/>
<img src="img/un.png" class="bnnr"/>
</center>
</div>

<div id="bd" >
<table cellspacing="10px" width="100%" cellpadding="10px" border="0px">
<tr>

<td valign="top" width="65%" >
<p><?php include("time_display.php")?></p>
<?php
include("instruction_fetch.php");
?>

<center>
	<?php 
 include("switcher.php");
	?>

	
	</center>


</td>

<td valign="top" width="35%" >

<fieldset class="fdi">
<legend><img id="preimg" src="<?php echo "studentphoto/S".$_SESSION['SESS_D_MAT_NO_EXAM'].".jpg";?>" class="proimger"/>
</legend>

<p style='padding:5pt;'>


Welcome <b> <?php if($_SESSION['SESS_D_USER_EXAM'] != ""){ echo $_SESSION['SESS_D_USER_EXAM'];}else{echo $_SESSION['SESS_D_MAT_NO_EXAM'];} ?> </b> 
&nbsp;| &nbsp;<img src='image/logout.png'  class='logout' style='width:20px' onclick="return(shu())"/>
</p>


<table width="100%" border="0" cellpadding="5px" cellspacing="5px">

<tr>
<td >
<b>Name</b>
</td>
<td >

<?php
echo $_SESSION['SESS_D_NAME_EXAM'];
?>
</td>
</tr>


<tr>
<td>
<b>Level</b>
</td>
<td>

<?php
echo $_SESSION['SESS_D_LEVEL_EXAM'] ;
?>
</td>
</tr>
<tr>
<td>
<b>
Dept</b>
</td>
<td>

<?php
echo $_SESSION['SESS_D_DEPT_EXAM'] ;
?>
</td>
</tr>

<tr>
<td>
<b>Gender</b>
</td>
<td>

<?php
echo $_SESSION['SESS_D_GENDER_EXAM'];
?>
</td>
</tr>







</table>



</fieldset>


<?php
require_once("config.php");
$selet = "SELECT * FROM result_button WHERE status='enable'";
$tu = mysql_query($selet);
if(!$tu){
$msg = "failed to fetch from db";
echo $msg;
	
	}else{
		$num = mysql_num_rows($tu);
		
		if($num == 1){
			

		
$user = $_SESSION['SESS_D_USER_EXAM'];
$select ="SELECT * FROM exams_scores WHERE script_owner='$user'";
$ju = mysql_query($select);
if(!$ju){
$msg = "failed to fetch from db";
echo $msg;
}
else{
$mnum = mysql_num_rows($ju);
if($mnum != 0){
?>
<center><img src="img/chk.png" class="recheck" onclick="parent.location='recheck.php'" title="Please click here to check result(s) of courses taken" style="width:100%;margin-top:5px;"/></center>

<?php

}else{}
}}else{
	}
}

?>



</td>
</tr>

</table>
     	<script src="shutdown.js" type="text/javascript"></script>
     	<div id="logi"></div>
</div>

<div id="footer">
<?php include("footer.php");?>
</div>
</div>
</body>

</html>
