<?php
include("page_auth.php");
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>


<h3 style="padding-bottom:10px;border-bottom:1px dashed black">APPROVE EXAMINATION RESULTS BASED ON SUBJECT CATEGORIES</h3>
<?php
if(isset($_POST["submit_subject_approval_button"]) && !empty($_POST["submit_subject_approval_button"])){
require_once("config.php");
$action = "";
if(isset($_POST["app_actions"]) && !empty($_POST["app_actions"])){
foreach($_POST["app_actions"] as $keyy){
$action = $keyy ;
}

}




$sub = htmlentities($_POST["subje"] , ENT_QUOTES);

$selectCmd = "UPDATE exams_scores SET Score_approval = '$action' WHERE subject ='$sub' ";
$qu = mysql_query($selectCmd);
if($qu){
$msg="<script type='text/javascript'>alert('Select subject scores ($sub ) is now $action')</script>";
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
include('each_subject_score_approval.php');

?>
</form>



<?php

}
else
{


}


?>

