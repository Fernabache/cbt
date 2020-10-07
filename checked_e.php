<?php
require_once("config.php");
$owner = $_SESSION['SESS_D_USER_EXAM'];
$sqlCommand = "SELECT * FROM exams_scores WHERE script_owner='$owner' AND attempted_num='$id' AND answer='e'";
$que = mysql_query($sqlCommand );
$num = mysql_num_rows($que);

if($num == 1){
echo "checked='checked'";
}

else{


}
?>