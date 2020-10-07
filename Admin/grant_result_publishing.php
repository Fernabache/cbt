<?php
include('page_auth.php');
?>

<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>



<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">GRANT PUBLISHING OF RESULTS</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to approve publishing of results or to revoke the publishing of the results.
</p>
</div>
<?php
if(isset($_POST['approv']) && !empty($_POST['approv'])){
require_once("config.php");
$slet = "";
if(isset($_POST['publish'])){
foreach($_POST['publish'] as $key ){
$slet = $key;
}

}

$command = "UPDATE exams_scores SET score_approval = '$slet' ";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$ra = "wolexzo07dacrackeristhebossofcodehouse";$raa = sha1(uniqid($ra));
$ins = "UPDATE portal SET portal_status ='closed' ,token='$ra' ,date_time=now() WHERE id='1'";
$msql = mysql_query($ins);

if(!$msql){
$msg="<script type='text/javascript'>alert('unable to update portal status')</script>";
echo $msg;
}

$msg="<script type='text/javascript'>alert('Database Queried Successfully')</script>";
echo $msg;
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="publish[]" style="">
<option value="approved">Approve Result Publishing</option>
<option value="pending">Revoke Result Publishing</option>
</select>
<input type="hidden" name="approv" value="approve_processor"/><br/>
<input type="image" class="hove" src="image/ap_r.png" style="width:100px;padding:2px"/>
</form></div>
</div>

<?php

}
else
{


}


?>