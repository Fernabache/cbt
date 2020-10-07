<?php
require_once("config.php");


$num = mysql_num_rows($query);
$cmd = "SELECT * FROM register";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num != 0){
while($row = mysql_fetch_array($query)){
$user = $row['username'];
$status = $row['access'];
echo "<option value='$user'>";
echo $user . " ($status)";
echo "</option>";

}

}
else{
echo "No users";

}


?>