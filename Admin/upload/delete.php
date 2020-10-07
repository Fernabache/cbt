<?php
if(isset($_POST["secret_key"]) && isset($_POST["id"]) ){
function  wolex_cleaner($file_up){
$file_up = @trim($file_up);
if(get_magic_quotes_gpc()){
$file_up = stripslashes($file_up);
}
return mysql_real_escape_string($file_up);

}

require_once("config.php");
$key = wolex_cleaner($_POST["secret_key"]);
$id = wolex_cleaner($_POST["id"]); 
$sql = "DELETE FROM uploads WHERE id='$id' AND token='$key'";
$select = "SELECT * FROM uploads WHERE id='$id' AND token='$key'";
$sq = mysql_query($select);
$num = mysql_num_rows($sq);
if(!$sq){
$msg = "failed to query database 1!";
header("location:data.php?msg=$msg");
exit();

}
if($num == 1){
$ds = mysql_query($sql);
if(!$ds){
$msg = "failed to query database 2!";
header("location:data.php?msg=$msg");
exit();

}
else{
$path = $_POST['file_path'];
$nam = $_POST['file_name'];
unlink($path);
$msg = "Selected file ($nam) deleted successfully";
header("location:data.php?msg=$msg");
exit();

}





}
else{


}



}
else{


}

?>