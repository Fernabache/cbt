<?php

require_once("config.php"); 
$select_inst = "SELECT * FROM instruction WHERE categories='exam_title'";
$ins_query = mysql_query($select_inst);
$ins_num = mysql_num_rows($ins_query);

if($ins_query){
if($ins_num == 0){
echo"<h2 style='text-align:center'>No examination title found in the database!!</h2>";

}
else{
while($row = mysql_fetch_array($ins_query)){
$id = $row["id"];
$title = $row["title"];
$cat = $row["categories"];
$ins = $row["instruction"];
$date_time = $row["date_time"];
echo "<div style='margin:10pt;padding:10pt;'>";
echo $ins ."<br/>";

echo "</div>";


}
}

}
else{
echo"<h3 style='text-align:center'>Failed to fetch data from the database!!</h3>";


}
