<?php
include("page_auth.php");
?>
<?php
require_once("config.php");

$select_inst = "SELECT * FROM cp_news ORDER BY id DESC LIMIT 5";
$ins_query = mysql_query($select_inst);
$ins_num = mysql_num_rows($ins_query);

if($ins_query){
if($ins_num == 0){
echo"<center><img src='image/ndb.png' style='width:40%'/></center>";

}
else{
while($row = mysql_fetch_array($ins_query)){



$id = $row["id"];
$short = $row["short"];
$full = $row["full"];
$title = $row["title"];
$token = $row["token"];
$cat = $row["categories"];
$date_time = $row["date_time"];

include("cp_ext.php");


}

}

}
else{
echo"<h3 style='text-align:center'>Failed to fetch data from the database!!</h3>";


}


?>