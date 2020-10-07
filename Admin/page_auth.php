<?php
if(!isset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_id']) && empty($_SESSION['CodeHouseGroup_Session_Examination_Assessment_id']) && !isset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_token']) && empty($_SESSION['CodeHouseGroup_Session_Examination_Assessment_token'])){
$msg = "<script type='text/javascript'>alert('You are not authorized to view this page')</script>";
header("location:index.php?msg=$msg");
exit;
}

?>