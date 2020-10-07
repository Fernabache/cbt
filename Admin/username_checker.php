<?php
if(isset($_GET["q"]) && !empty($_GET["q"])){
function chk($value){
$value = @trim($value);
if(get_magic_quotes_gpc()){
$value = stripslashes($value) ;
}
return mysql_real_escape_string($value);
}

$q = chk($_GET["q"]);
require_once("config.php");


$sqlCommand = "SELECT * FROM admin_register WHERE username='$q'";
$que = mysql_query($sqlCommand );
$num = mysql_num_rows($que);

if($num == 1){
$row = mysql_fetch_assoc($que);
echo "<b>" .$row["username"]. "</b> already taken! " ;
echo "<img src='image/wrong.png' style='width:15px;height:15px'/>" ;
}
else{
$row = mysql_fetch_assoc($que);
echo "<b>" .$_GET["q"]. "</b> is not taken! " ;
echo "<img src='image/correct.png' style='width:15px;height:15px'/>" ;


}

}
?>