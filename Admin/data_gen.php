<?php
include("config.php");
$sele = "SELECT * FROM `register` WHERE username LIKE '%14/%'";
$query = mysql_query($sele);
$num = mysql_num_rows($query);
echo "Total student = $num";
echo "<table cellspacing='10px' cellpadding='10px' border='1px'><tr><td>Id</td><td>Matric No</td><td>Name</td><td>Level</td></tr>";
while($row = mysql_fetch_array($query)){
$id = $row["id"];
$user = $row["username"];
$name = $row["Name"];
$level = $row["Level"];
echo "<tr><td>$id</td> <td>$user</td><td>$name</td><td>$level</td></tr>";
}
echo "</table>";

?>
