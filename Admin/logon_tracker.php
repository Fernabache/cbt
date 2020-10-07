<?php
require_once("config.php");
$user = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'];
$cmd = "SELECT * FROM login_tracker WHERE username='$user'";
$cmdd =mysql_query($cmd);
$count = mysql_num_rows($cmdd);
if($count == 1){
echo "".$count ." Time";
}
else{

echo " ".$count ." Times";
}

?>