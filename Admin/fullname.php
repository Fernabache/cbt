<?php
if(isset($_GET['user']) && !empty($_GET['user'])){
$user = htmlentities($_GET['user'] ,ENT_QUOTES);
require_once("config.php");
$select = "SELECT * FROM register WHERE username = '$user'";
$qu = mysql_query($select);
$num = mysql_num_rows($qu);
if($num == 1){
$row = mysql_fetch_array($qu);
$full = $row['Name'];
echo $full." " ;
}
else{

echo 'invalid user';
}
}
else{

echo 'parameter missing!!!';
}


?>