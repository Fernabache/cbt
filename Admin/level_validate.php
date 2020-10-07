

<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] != "Super"){
	$msg="<script type='text/javascript'>alert('You are not authorized to view this page!')</script>";
	header("location:index.php?msg=$msg");
    exit();

}

?>