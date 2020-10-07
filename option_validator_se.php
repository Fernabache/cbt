<?php
require_once('config.php');
$dbg = "SELECT * FROM allow_status WHERE id='1'";
$qur = mysql_query($dbg);
$numr = mysql_num_rows($qur);
$fety = mysql_fetch_array($qur);
if($numr != 0){
$po = $fety['status'];
if($po == 'Allow'){
echo " <b style='color:maroon'>Selected Option = " . $row["answer"]." ;</b>";
echo "&nbsp;&nbsp;";
echo " <b style='color:maroon'>"."wrong"."</b>&nbsp;<img src='image/wrong.png' style='height:20px;width:20px'/>";

}
elseif($po == 'Disallow'){
echo " <b style='color:maroon'>Selected Option = " . $row["answer"]." ;</b>";
echo "&nbsp;&nbsp;";

}
else{
echo "";

}

}
else{

echo "" ;

}
?>