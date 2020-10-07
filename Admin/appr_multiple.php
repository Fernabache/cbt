
<div style="margin:2pt;margin-bottom:50px">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">APPROVE / REVOKE QUESTIONS BASED ON EXAMINATION TYPE CATEGORIES</h3>
<div style="margin:10pt;">
<p style="letter-spacing:1px">

NOTE: If you Grant questions under a particular category ,Other questions that does not belong to that categories will not be approved and if you revoke questions under a particular category ,other questions that does not belong to that categories will be approved
</p>
</div>
<?php
if(isset($_POST['exams_type']) && !empty($_POST['exams_type'])){
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

if($slet == 'pending'){


$command = "UPDATE questions SET approval_status = '$slet' WHERE exam_type ='$cat' ";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$cmd1 = "UPDATE questions SET approval_status = 'approved' WHERE exam_type !='$cat'";
$ecm = mysql_query($cmd1);

if(!$ecm){
$msg="<script type='text/javascript'>alert('Failed to approved other questions categories!')</script>";
echo $msg;
exit;
}
$msg="<script type='text/javascript'>alert('Questions categoried under $cat is now $slet')</script>";
echo $msg;
}



}
elseif( $slet == 'approved'){

$command = "UPDATE questions SET approval_status = '$slet' WHERE exam_type ='$cat' ";


$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$cmd1 = "UPDATE questions SET approval_status = 'pending' WHERE exam_type !='$cat'";
$ecm = mysql_query($cmd1);

if(!$ecm){
$msg="<script type='text/javascript'>alert('Failed to revoke other questions categories!')</script>";
echo $msg;
exit;
}



$msg="<script type='text/javascript'>alert('Questions categoried under $cat is now $slet')</script>";
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
<td>CATEGORIES</td>
<td>
<?php
include("exa.php");
?>

</td>
</tr>


<tr>
<td><input type="hidden" name="exams_type" value="superadmingrantingaccess"/>
</td>
<td><input type="image" src="image/qu.png" style="width:80pt;height:25pt"/>
</td>
</tr>
</table>
</form>
</div>

</div>

