<?php
ini_set("display_errors" ,"off");
require_once("config.php");
$populate = "SELECT * FROM register  ORDER BY Time_Stamp";

if($popul_query = mysql_query($populate)){
$num = mysql_num_rows($popul_query);
if($num != 0){
?><table cellpadding="10px" cellspacing="10px" border="2px" width="100%">
<tr><th align="left">Username</th><th align="left">Name</th><th align="left">Email</th><th align="left">Mobile</th><th align="left">Login Access</th><th align="left">Time stamp</th></tr>
<?php
while($row = mysql_fetch_array($popul_query)){
$id= $row["id"];
$username= $row["username"];
$name= $row["Name"];
$email= $row["email"];
$mobile= $row["mobile"];
$access= $row["access"];
$t= $row["Time_Stamp"];
include("registered_mem.php");




}
?></table><?php

}
else{
$msg = "No registered member yet!";
echo $msg;
}


}
else{
$msg = "failed to query db";
echo $msg;

}


?>