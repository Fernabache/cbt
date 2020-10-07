<?php
include("page_auth.php");
?>

<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>



<div style="margin:2pt;margin-bottom:50px">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">APPROVE QUESTIONS RANDOMLY BASED ON SUBJECT CATEGORIES AND EXAMINATION TYPE</h3>
<div style="margin:10pt;">
<p style="letter-spacing:1px">

NOTE: Please use the section to randomly approve question(s) based on the subject category , examination type and the number of question(s) specified.
</p>
</div>
<?php
if(isset($_POST['exams_type_sub_rand']) && !empty($_POST['exams_type_sub_rand'])){
require_once("config.php");
function santi($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
$numb = santi($_POST["numb"]);


if(empty($_POST["numb"])){
$msg="<script type='text/javascript'>alert('Please enter the number of questions you want to randomly approve!')</script>";
echo $msg;
}
elseif(!is_numeric($_POST["numb"])){
$msg="<script type='text/javascript'>alert('Please enter a valid number!')</script>";
echo $msg;
}

else{
$numb = santi($_POST["numb"]);

$slet = "";
if(isset($_POST['publish'])){
foreach($_POST['publish'] as $key ){
$slet = $key;
}

}

$cat = "";
if(isset($_POST['cat'])){
foreach($_POST['cat'] as $key ){
$cat = $key;
}

}

$sub = "";
if(isset($_POST['sub'])){
foreach($_POST['sub'] as $key ){
$sub = $key;
}

}


if( $slet == 'approved'){

$command = "UPDATE questions SET approval_status = '$slet' WHERE exam_type ='$cat' AND categories='$sub' AND approval_status='pending' ORDER BY RAND() LIMIT $numb ";


$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Questions categoried under $cat that are $sub subject(s) is now $slet')</script>";
echo $msg;
}

}
else{
$msg="<script type='text/javascript'>alert('No action was selected')</script>";
echo $msg;

}
}
}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<table cellpadding="2px" cellspacing="6px">
<tr>
<td>ACTIONS</td>
<td>
<select name="publish[]" style="width:200px">
<option value="approved">Grant Questions</option>

</select>
</td>
</tr>

<tr>
<td>EXAMS TYPE</td>
<td>
<select name="cat[]" style="width:200px">
<?php
include("exams.php");
?>
</select>
</td>
</tr>

<tr>
<td>SUBJECTS</td>
<td>
<select name="sub[]" style="width:200px">
<?php
include("cat.php");
?>
</select>
</td>
</tr>

<tr>
<td>NO. OF QUES.</td>
<td>
<input type="text" name="numb" class="inpt" style="width:200px"/>
</td>
</tr>

<tr>
<td><input type="hidden" name="exams_type_sub_rand" value="superadmingrantingaccess"/>
</td>
<td><input type="image" src="image/qu.png" style="width:80pt;height:25pt"/>
</td>
</tr>
</table>
</form>
</div>

</div>



<?php

}
else
{
echo "<center><img src='image/deny.png' style='width:40%;margin:3%'/></center>";


}


?>
