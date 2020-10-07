<?php
require_once("config.php");
$select_inst = "SELECT * FROM instruction WHERE categories='examination'";
$ins_query = mysql_query($select_inst);
$ins_num = mysql_num_rows($ins_query);

if($ins_query){
if($ins_num == 0){
echo"<h2 style='text-align:center'>No instruction found in the database!!</h2>";

}
else{
$row = mysql_fetch_array($ins_query);
$title = $row["title"];
$ins = $row["instruction"];
$date_time = $row["date_time"];

echo "<div style='margin:0pt;padding:5pt;'>";
echo "<h3 style='letter-spacing:6pt;margin:0pt;text-decoration:underline;text-transform:uppercase'>$title</h3>";
echo "<div style='letter-spacing:3pt;font-style:italic;padding:5pt'>".$ins ."</div>";

echo "</div>";


}

}
else{
echo"<h3 style='text-align:center'>Failed to fetch data from the database!!</h3>";


}


?>
