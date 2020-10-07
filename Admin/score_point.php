<?php

$sqlCommand = "SELECT SUM(score_point) AS summ FROM exams_scores WHERE script_owner='$user' ";
$que = mysql_query($sqlCommand );
$num = mysql_num_rows($que);

while($row = mysql_fetch_array($que)){
$sum = $row['summ'];

}





?>