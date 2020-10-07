<?php
include("randomizer.php");


foreach($attemp as $key){


}

$sql = mysql_query("SELECT * FROM questions WHERE id != '$key' AND approval_status='approved' ORDER BY Categories ");
$w = mysql_fetch_array($sql);
$q = $w['question'];
echo "<p>".$q."</p>";
//////////////////////////////////// wolexzo07's Pagination Logic ////////////////////////////////////////////////////////////////////////
$nr = mysql_num_rows($sql); // Get total of Num rows from the database query

echo $nr;