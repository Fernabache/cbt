<?php
require_once("config.php");
$sql = "SELECT * FROM questions WHERE approval_status='approved' ORDER BY Categories ";
$query = mysql_query($sql);
$count = mysql_num_rows($query);

if($count != 0){

while($row = mysql_fetch_array($query)){
$id = $row["id"];
$cat = $row["categories"];
$type = $row["exam_type"];
$quest = $row["question"];
$first = $row["f_option"];
$second = $row["s_option"];
$third = $row["t_option"];
$fourth = $row["ft_option"];
$fifth="none" ;
include("queajax.php");



}


}

?>