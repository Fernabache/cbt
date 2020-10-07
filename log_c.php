<?php

require("config.php");
$sel = "SELECT * FROM logoff WHERE status='granted'"; 
$l = mysql_query($sel);
if(!$l){
$msg = "Failed to connect to db!";
echo $msg;
}
else{
$ru = mysql_num_rows($l);
if($ru > 0){

$rt = system("reboot");
echo $rt;

}
else{
	
	}
}

	
?>
