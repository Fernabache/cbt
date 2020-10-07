<?php
require_once("config.php");
$slect = "SELECT DISTINCT(script_owner) FROM exams_scores";

$slect_qry = mysql_query($slect);
if(!$slect_qry){
echo "Failed to connect to the db!";
}
else{
$num = mysql_num_rows($slect_qry);
if($num != 0){
while($rows = mysql_fetch_array($slect_qry)){

$user = $rows["script_owner"];

include("ab.php");
}


}
else{
echo "No registered user in the database!";
}

}

?>