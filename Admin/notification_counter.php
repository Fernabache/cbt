<?php
require_once("config.php");
function valu($str){
$str = @trim($str);
if(get_magic_quotes_gpc()){
$str = stripslashes($str);
}
return mysql_real_escape_string($str);

};
$cat = valu($_GET['category']);
$p_command = "SELECT * FROM questions WHERE categories='$cat' AND approval_status = 'pending'" ;
$a_command = "SELECT * FROM questions WHERE categories='$cat'" ;

$exec = mysql_query($p_command);
$count = mysql_num_rows($exec);
$execute = mysql_query($a_command);
$ct = mysql_num_rows($execute);

if($count == 0){
$msg="<blink>You have<b> $count </b>question on pending out of $ct questions</blink> ";
echo $msg;
}
elseif($count == 1){
$msg="<blink>You have<b> $count </b>question on pending out of $ct questions<blink> ";
echo $msg;

}
else{
$msg="<blink>You have<b> $count </b>questions on pending out of $ct questions<blink> ";
echo $msg ;
}

?>