<?php
include("page_auth.php");

?>
<?php
require_once("config.php");
$cmd = "SELECT DISTINCT script_owner ,Score_approval ,fullname FROM exams_scores WHERE Score_approval='approved' ORDER BY fullname ";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);


?>
<?php
if($num != 0){
?>
<table cellspacing="3px" cellpadding="10px" width="100%" border="1px" style="">
<tr><th align="left">NAMES</th><th align="left">USERNAMES</th><th align="left">RESULTS --- &raquo;	</th><tr>
<?php

while($row = mysql_fetch_array($query)){
$user_t= $row['script_owner'];
$status = $row['Score_approval'];
$full = $row['fullname'];

include("mm.php");



?>



<?php

}
echo "</table>";
?>

<?php

}
else{
echo "<center><div style='margin:5%'><img src='image/no.png' style='width:40%'/></div></center> ";

}


?>