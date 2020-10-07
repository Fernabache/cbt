<?php
include("page_auth.php");
?>
<div id="eac_score">
<div align="">
<img src="image/cancel.png" id="subject_cancel" style="height:15px;width:15px;" /></div>
<center><img src="image/EMS.png" id="ec"/></center>

<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>





<h3 style="padding-bottom:10px;border-bottom:1px dashed black">APPROVE EXAMINATION QUESTIONS BASED ON SUBJECT CATEGORIES </h3>
<?php
if(isset($_POST["submit_subject_button"]) && !empty($_POST["submit_subject_button"])){
require_once("config.php");
$action = "";
if(isset($_POST["app_action"]) && !empty($_POST["app_action"])){
foreach($_POST["app_action"] as $keyy){
$action = $keyy ;
}

}




$sub = htmlentities($_POST["subj"] , ENT_QUOTES);

$selectCmd = "UPDATE questions SET approval_status = '$action' WHERE categories='$sub' ";
$qu = mysql_query($selectCmd);
if($qu){
$msg="<script type='text/javascript'>alert('Select subjects ($sub ) is now $action')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('operation failed!!')</script>";
echo $msg;

}



}
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
<?php
include('subject_approve.php');

?>
</form>


<?php

}
else
{


}


?>

<?php
include('each_score_form.php');

include("appr_based_cat.php");

?>
</div>