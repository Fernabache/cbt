<?php
include("page_auth.php");

$que= "SELECT * FROM questions WHERE id='$attempt' AND token = '$tok'";
$query = mysql_query($que);
$num = mysql_num_rows($query);
if($num != 0){
$row = mysql_fetch_array($query);

$c_ans = $row['answer'];


}
else{
$msg = "<b>invalid question</b>";
echo $msg ;
}


?>