<?php
include('page_auth.php');
?>
<?php
if(isset($_GET['user']) && !empty($_GET['user'])){
require_once("config.php");
$user = htmlentities($_GET['user'] ,ENT_QUOTES);

$sqlCommandd = "SELECT * FROM exams_scores WHERE script_owner='$user' ORDER BY id ";
$questt = "SELECT * FROM questions WHERE approval_status='approved'";
include("score_point.php");

$uscmd = "SELECT * FROM register WHERE username='$user'";
$squery = mysql_query($uscmd);
$snum = mysql_num_rows($squery);

if($snum == 0){
$msg = "invalid user $user";
echo $msg;


}
elseif($snum == 1){


$queee = mysql_query($sqlCommandd);
$numi = mysql_num_rows($queee);
if($numi != 0){

?>
<style type="text/css" media="all">
a {font-family:Times New Roman;text-decoration:none;color:black;font-style:italic}
a:hover{font-weight:bold;font-family:Times New Roman;text-decoration:none;color:green}
a:visited{font-weight:bold;font-family:Times New Roman;text-decoration:none;color:navy;}
</style>

<h2 style="padding:10px;background-color:white;border-top:3px solid black;margin:20pt ;text-align:center;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;-o-border-radius:10px;-ms-border-radius:10px;color:navy;font-family:Times New Roman;box-shadow:2px 2px 2px 2px whitesmoke;-moz-box-shadow:2px 2px 2px 2px whitesmoke;-webkit-box-shadow:2px 2px 2px 2px whitesmoke;-o-box-shadow:2px 2px 2px 2px whitesmoke;-ms-box-shadow:2px 2px 2px 2px whitesmoke;"><?php include('fullname.php');?><?php echo "(".$user.") Examination Script";?></h2>


<table cellpadding="5px" cellspacing="1px" width="95%" style="margin-left:10px;margin-right:10px;border-radius:10px" border="1px">
<tr bgcolor="white">

<th align="middle">ATTEMPTED QUESTIONS</th>
<th align="middle">USER SELECTED OPTION</th>
<th align="middle">CORRECT OPTION</th>
<th align="middle">FINAL COMMENT</th>
<th align="middle">SCORE POINT</th>
</tr>

<?php

while($row = mysql_fetch_array($queee)){
$id = $row['id'];
$user = $row['script_owner'];
$ans = $row['answer'];
$attempt = $row['attempted_num'];
$full = $row['fullname'];
$comment = $row['final_comment'];
$score = $row['score_point'];
$tok = $row['ques_token'];
include("c_option.php");
include("script_ext.php");

}
echo "<tr bgcolor='white'><td></td><td></td><td></td><td align='middle' style='border-top:2px solid black;border-bottom:2px solid black;border-left:2px solid black;'><b>TOTAL SCORES</b></td><td align='middle' style='border-top:2px solid black;border-bottom:2px solid black;border-right:2px solid black;'>$sum </td></tr>";
echo "</table>";

}
else{

echo "&raquo; No script found for user <b>$user </b>&laquo;";
echo "<center><img src='image/ns.png' style='width:30%'/></center>";
}
}
else{

echo "<b>No script found for $user</b>";
echo "<center><img src='image/ns.png' style='width:40%'/></center>";
}


}
else{

echo "<b>Parameter Missing!!!</b>";
}



?>