<?php
if(isset($_POST["valid_email"]) && !empty($_POST["valid_email"])){
require_once("config.php");
$se = "SELECT DISTINCT owner_email , script_owner FROM exams_scores";
$sq = mysql_query($se);

if($sq){
if(mysql_num_rows($sq) != 0){
while($emls = mysql_fetch_array($sq)){
$ma = $emls["owner_email"];
$so = $emls["script_owner"];
echo $ma . " | ".$so . "<br/>";


}
}
else{

$msg = "<script type='text/javascript'>alert('No result found in  the database to email!');</script>";
echo $msg;
}


}
else{

$msg = "<script type='text/javascript'>alert('Failed to fetch emails  from database!');</script>";
echo $msg;
}



}

?>
<form onsubmit="" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
<input type="hidden" style="width:500px" name="valid_email" value="<?php echo sha1(uniqid(rand(12, 536281)));?>"/>
<input type="image" src="image/mail_r.png" style="width:300px"  />
</form>




<form onsubmit="" method="post" action="">
<input type="hidden" style="width:500px" name="valid_sms" value="<?php echo sha1(uniqid(rand(12, 536281)));?>"/>
<input type="image" src="image/sms_r.png" style="width:300px" onclick="alert('System not currently active!')" />
</form>