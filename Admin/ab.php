<?php 
$stud = "SELECT * FROM register WHERE username != '$user'";
$stud_query = mysql_query($stud);

$rot = mysql_fetch_array($stud_query);
$id = $rot["id"];
$users[] = $rot["username"];
$userss = $rot["username"];
echo "<p> $userss</p>";


?>
