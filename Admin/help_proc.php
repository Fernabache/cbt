<?php

if(isset($_GET['token']) && !empty($_GET['token'])){

function value($str){
$str = @trim($str);
if(get_magic_quotes_gpc()){
$str = stripslashes($str);
}
return mysql_real_escape_string($str);

}
require_once("config.php");

$key = value($_GET["key"]);

$key_f = value($_GET["keyf"]);

$token = value($_GET["token"]);

$cat = value($_GET["cat"]);

$tab = "
CREATE TABLE IF NOT EXISTS help_keys (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
category TEXT NOT NULL,
shortcut_key TEXT NOT NULL,
key_function TEXT NOT NULL,
token TEXT NOT NULL,
time_stamp TEXT NOT NULL 
) 

";

$conne = mysql_query($tab);

if(!$conne){
echo "failed to create tab";
exit;

}

$select = "SELECT * FROM help_keys WHERE shortcut_key='$key' AND category='$cat' ";
$sleq = mysql_query($select);
if($sleq){
$mynum = mysql_num_rows($sleq);
if($mynum == 1){

echo "This shortcut key already exist!!";

}
else{


$ins = "INSERT INTO help_keys(category , shortcut_key , key_function , token , time_stamp) VALUES('$cat' , '$key' , '$key_f' , '$token' , now())";
$query = mysql_query($ins);
if($query){
echo " shortcut key ($key) posted successfully";

}
else{
echo "Data failed to be submitted";


}


}


}
else{
echo "failed to select table";

}



}
else{


echo "Parameter missing!!";

}



?>