<?php
include("page_auth.php");

?>
<?php
if(isset($_GET['user']) && !empty($_GET['user'])){
require_once("config.php");
$owner = htmlentities($_GET['user'] ,ENT_QUOTES);

$sqlCommand = "SELECT * FROM exams_scores WHERE script_owner='$owner' AND final_comment='correct' AND Score_approval='approved'";
$sqlCmd = "SELECT * FROM exams_scores WHERE script_owner='$owner' AND final_comment='wrong' AND Score_approval='approved'";
$all = "SELECT * FROM exams_scores WHERE script_owner='$owner' AND Score_approval='approved'";
$all_query = mysql_query($all);
$all_count = mysql_num_rows($all_query);





$quest = "SELECT * FROM questions WHERE approval_Status='approved'";
$quest_query = mysql_query($quest);
$qu_num = mysql_num_rows($quest_query); 

$wr = mysql_query($sqlCmd);
$wr_count = mysql_num_rows($wr);

$que = mysql_query($sqlCommand );
$num = mysql_num_rows($que);
$row = mysql_fetch_array($que);

$percent = ($num/$qu_num)*100;
$m_percent = round($percent ,2);
$uscmd = "SELECT * FROM register WHERE username='$owner'";
$squery = mysql_query($uscmd);
$snum = mysql_num_rows($squery);
$ferct = mysql_fetch_array($squery);


$cname = $ferct["Name"];
$cemail = $ferct["email"];
$cmobile = $ferct["mobile"];
$ctitle = $ferct["title"];
$cuname = $ferct["username"];
$cdob = $ferct["dob"];
$chob = $ferct["hobby"];
$ctok = $ferct["token"];

if($snum == 1){

if($all_count != 0){

if($m_percent < 50){

$msg = "Failed! Try Again";
$status = "Not Admitted Yet";
include('sco_ext.php');
}
elseif($m_percent >= 50 && $m_percent < 90)
{
$msg = "Passed! Congrat"  ;
$status = "Admitted";
include('sco_ext.php');

}
elseif($m_percent > 90)
{
$msg = "Superb! Congrat"  ;
$status = "Admitted";
include('sco_ext.php');

}
else{
$msg = ""  ;
echo $msg;

}

}

else{
$msg = "<p style='padding:10px'>Please check back for your result</p>"  ;
include("stat.php");

}

}
else{

$msg = "invalid user $owner";
echo $msg;



}

}
else{

$msg = "<b>Parameter Missing!!!</b>";
echo $msg;



}



?>