<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>


<div style="margin:2pt;margin-bottom:50px">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">APPROVE / REVOKE QUESTIONS BASED ON SUBJECT CATEGORIES AND EXAMINATION TYPE</h3>
<div style="margin:10pt;">
<p style="letter-spacing:1px">

NOTE: If you Grant questions under a particular subject category and exams type ,
Other questions that does not belong to that subject category and exams type will not be
 approved and if you revoke questions under a particular subject category and exams type ,
 other questions that does not belong to that subject category and exams type will be approved
</p>
</div>
<?php
if(isset($_POST['exams_type_sub']) && !empty($_POST['exams_type_sub'])){
require_once("config.php");
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

if($slet == 'pending'){


$command = "UPDATE questions SET approval_status = '$slet' WHERE exam_type ='$cat' AND categories='$sub'";
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
elseif( $slet == 'approved'){

$command = "UPDATE questions SET approval_status = '$slet' WHERE exam_type ='$cat' AND categories='$sub' ";


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
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<table cellpadding="2px" cellspacing="6px">
<tr>
<td>ACTIONS</td>
<td>
<select name="publish[]" style="width:200px">
<option value="approved">Grant Questions</option>
<option value="pending">Revoke Questions</option>
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
<td><input type="hidden" name="exams_type_sub" value="superadmingrantingaccess"/>
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


}


?>



<?php
include("random_approval.php");
?>
