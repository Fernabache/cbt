<?php


$user_p = htmlentities($_GET['user'] ,ENT_QUOTES);;

$sub_p = "SELECT DISTINCT categories FROM questions WHERE approval_status = 'approved'";
$query_p = mysql_query($sub_p);
$num_p = mysql_num_rows($query_p);
if($num_p != 0){
echo "<table cellpadding='5px' width='100%' cellspacing='1px' border='0px'>";
echo "<tr><th align='left' width='60%'>SUBJECTS </th><th align='left' width='40%'>SCORES </th></tr>";
while($subject = mysql_fetch_array($query_p)){

$cat_p = $subject['categories'];
include("subject_sc.php");

if($scor_p ==  ""){
echo "<tr><td>$cat_p</td><td>0</td></tr>";
}
else{
echo "<tr><td>$cat_p</td><td>$scor_p</td></tr>";
}

}
echo "<tr><td><b>Aggregate</b></td><td><b>$total_p</b></td></tr>";
echo "</table>";

} 
else{
echo "No subject found in the database";

}

?>