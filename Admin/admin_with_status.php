<?php
require_once("config.php");
$cmd = "SELECT * FROM admin_register";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);

if($num != 0){
echo "<table cellpadding='5px' cellspacing='5px' border=''><tr><th>USERNAMES</th><th>FULLNAMES</th><th>ACCOUNT LOGIN STATUS</th><th>LEVEL STATUS</th><th>GENERATED TOKEN</th></tr>";
while($row = mysql_fetch_array($query)){
$user = $row['username'];
$full = $row['fullname'];
$access = $row['access'];
$level = $row['level'];
$tok = $row['token'];
echo "<tr><td>";
echo $user;
echo "</td><td>$full</td><td>";
echo $access;
echo "</td><td>$level</td><td>$tok</td></tr>";
}
echo "</table>";
}
else{
echo "No users";

}


?>