<?php
include('page_auth.php');
require_once("config.php");
$select = "SELECT * FROM exam_categories WHERE under='Examination Subject' ORDER BY id DESC";
$resul = mysql_query($select) or die(mysql_error());

if(mysql_num_rows($resul) != 0) {

while ($row = mysql_fetch_array($resul))
{

$member_id = $row['id'];
$cf = $row['categories'];
include('option_bind.php');


}

}

else{

echo '';

}
?>