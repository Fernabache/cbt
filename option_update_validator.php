<?php
require_once('config.php');
$dbd = "SELECT * FROM option_update WHERE id='1'";
$quq = mysql_query($dbd);
$numeri = mysql_num_rows($quq);
$fetr = mysql_fetch_array($quq);
if($numeri != 0){
$pp = $fetr['status'];
if($pp == 'Allow'){

include("option_update.php");


}
elseif($pp == 'Disallow'){

$msg="<img src='image/sor.png' style='width:250px;'/>";
echo "<p style='color:green'>" .$msg . "</p>" ;



}
else{
echo "";

}

}
else{

echo "" ;

}
?>