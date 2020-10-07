<?php

if(isset($_GET['nameg']) && !empty($_GET['nameg'])){


function replace_wolex($open_tag ,$close_tag , $string){
$n_string = str_replace($open_tag,"",$string);
$nn_st = str_replace($close_tag,"",$n_string);
return $nn_st;
}

$open_tag = "<p>";
$close_tag = "</p>";
$first = replace_wolex($open_tag ,$close_tag , $_GET['nameg']);
require_once("config.php");

$tab = "
CREATE TABLE IF NOT EXISTS msg_data (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
msg TEXT NOT NULL,
status TEXT NOT NULL,
time_stamp TEXT NOT NULL 
) 

";

$conne = mysql_query($tab);

if(!$conne){
echo "failed to create tab";
exit;

}

$select = "SELECT * FROM msg_data";
$sleq = mysql_query($select);
if($sleq){
$mynum = mysql_num_rows($sleq);
if($mynum == 1){

$ins = "UPDATE msg_data SET msg='$first' , time_stamp= now() WHERE id='1'";
$query = mysql_query($ins);
if($query){
echo "Message posted successfully ";

}
else{
echo "Data failed to submit update";


}


}
elseif($mynum == 0){


$ins = "INSERT INTO msg_data(msg , status , time_stamp) VALUES('$first' , 'enabled' , now())";
$query = mysql_query($ins);
if($query){
echo "Message posted successfully";

}
else{
echo "Data failed to submit";


}


}
else{
echo "No action to be performed";


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
