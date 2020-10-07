<?php

include("page_auth.php");
require_once("config.php"); 
if(isset($_POST['instruction_del']) && isset($_POST['id'])){
$id = $_POST['id'];
$delete_inst = "DELETE FROM instruction WHERE id='$id'";
$ins_query_del = mysql_query($delete_inst);
if($ins_query_del){
		$msg="<script type='text/javascript'>alert('Selected Post Deleted successfully!!!')</script>";
		echo $msg;

}
else{
		$msg="<script type='text/javascript'>alert('Failed to  Delete Selected Post')</script>";
		echo $msg;

}

}
$select_inst = "SELECT * FROM instruction";
$ins_query = mysql_query($select_inst);
$ins_num = mysql_num_rows($ins_query);

if($ins_query){
if($ins_num == 0){
echo"<h2 style='text-align:center'>No instruction found in the database!!</h2>";

}
else{
while($row = mysql_fetch_array($ins_query)){


$id = $row["id"];
$title = $row["title"];
$cat = $row["categories"];
$ins = $row["instruction"];
$date_time = $row["date_time"];
echo "<div style='margin:10pt;padding:10pt;'>";
echo "<h3 style='letter-spacing:3pt;margin:10pt;text-decoration:underline;text-transform:uppercase'>$title</h3><p style='letter-spacing:1pt;color:lightgray;margin-bottom:10pt;'>Posted under <b>$cat</b> categories</p>";
echo $ins ."<br/>";
include("ins_del.php");

echo "</div>";


}
}

}
else{
echo"<h3 style='text-align:center'>Failed to fetch data from the database!!</h3>";


}


?>

