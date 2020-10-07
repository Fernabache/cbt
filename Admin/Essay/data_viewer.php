<?php session_start();
if(!isset($_SESSION['CURRENT_IUO_DATA_NAME']) && !isset($_SESSION['CURRENT_IUO_DATA_USERNAME'])){
header("location:../essay_login.php");
exit();
}?>
<?php
require_once("../config.php");
$user = $_SESSION['CURRENT_IUO_DATA_USERNAME'];
$sele = "SELECT * FROM essay_submission WHERE lecturer_name='$user'";
$resi = mysql_query($sele);
$row = mysql_fetch_array($resi);
if(!$resi){
echo "failed to query data!";
}
else{
$count = mysql_num_rows($resi);
?><div style="margin:2%;">
<center>
<img src="../img/logo.jpg" style="width:120px;"/>
</center>
<p style="text-align:center;letter-spacing:3px;font-size:18pt;font-weight:bold;">EXAMINATION RESULT SHEET </p>
<table cellpadding="5px" width="100%" cellspacing="1px" border="1px">
<tr>
<th align="left">Names</th><th align="left">Username</th><th align="left">Course</th><th align="left">Score</th>
</tr>

<?php
while($row = mysql_fetch_array($resi)){
$id = $row["id"];
$name = $row["name"];
$user = $row["username"];
$path = $row["question_path"];
$token = $row["token"];
$paper = $row["paper_type"];
$score = $row["score"];
$subject = $row["subject"];
$lect = $row["lecturer_name"];
$date = $row["date_time"];
?><tr>
<td><p style="letter-spacing:2px;"><?php echo $name;?></p></td>
<td><?php echo $user;?></td>
<td><?php echo $subject;?></td>

<td><p style="letter-spacing:2px;"><?php echo $score;?></p></td></tr>
<?php

}?></table></div><?php
}
?>
