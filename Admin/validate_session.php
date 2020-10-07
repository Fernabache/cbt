<?php
if(isset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_id']) || isset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'])){

$msg="<h3 style='color:green'>Please you can't Register because a session is active</h3>";
$ss = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'];
echo $msg ."<br/>";
echo "user <b>".$ss."</b> is logged in already<br/>";
echo "<p style='text-align:center'><a href='logout.php' target='_blank'>Logout</a> | <a href='index.php' target='_blank'>Homepage</a>"."</p>";
}
elseif(isset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_id']) && $_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] != 'Super'){

$msg="<h3 style='color:green'>Please you Don't have permission to Register a new account.Please contact ICT Department</h3>";
$ss = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'];
echo $msg ."<br/>";

}
else{

include("sh_reg.php");

}

?>