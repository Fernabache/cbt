<?php
include("page_auth.php");
require_once("config.php");
$cmd = "SELECT DISTINCT(categories) FROM questions";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num != 0){
while($row = mysql_fetch_array($query)){
$et = $row['categories'];

echo "<option value='$et'>";
echo $et;
echo "</option>";
}

}
else{
echo "No users";

}


?>