<?php
require_once("connection.php");
$cmd = "SELECT * FROM photo_categories ORDER BY categories";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num != 0){
while($row = mysql_fetch_array($query)){
$id = $row['id'];
$under = $row['under'];
$cat = $row['categories'];
echo "<option value='$cat'>";
echo $cat ;
echo "</option>";
}

}
else{
echo "No users";

}


?>