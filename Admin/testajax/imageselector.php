<?php
if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['securitykey']) && !empty($_GET['securitykey'])){

function clean($value) {
$value = @trim($value);
if (get_magic_quotes_gpc()){
$value = stripslashes($value) ;

}
return mysql_real_escape_string($value);

}

$id = clean($_GET['id']) ;
$skey = clean($_GET['securitykey']) ;
require_once('connection.php');
$selet = "SELECT * FROM dugomembers WHERE member_id = '$id' AND security = '$skey'";
$result = mysql_query($selet) or die(mysql_error());

if(mysql_num_rows($result) != 0) {

$row = mysql_fetch_array($result);
$type = $row['pictype'];
$size = $row['picsize'];
$image = $row['photo'];

header("content-type: ".$type);


echo $image;
}

else {

echo 'image is not in our database' ;
exit;
}


}
else 
{
die('parameter missing');

}


?>