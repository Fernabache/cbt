<?php
include("page_auth.php");
 
?>
<?php
require_once('config.php');
require_once('timtalk.php');

$db = "SELECT * FROM exam_timer WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);
if($num != 0){
$data = mysql_fetch_array($qu);
$tim = $data['timer'];
$tim = $tim/1000;

echo "<p style='font-size:12pt;letter-spacing:2px;color:green;border:2px solid black;margin-bottom:3%;padding:15px;'>The Current Examination time is : <b style='font-size:20pt'>".secondsToTime($tim)."</b> [Format:Hour(s):Minute(s):Second(s)]</p>";


}
else{
echo "No time set in the database";
}

?>