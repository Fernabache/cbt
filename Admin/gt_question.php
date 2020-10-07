<?php
include("page_auth.php");
if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['token']) && !empty($_GET['token'])){
require_once("config.php");
$id = htmlentities($_GET['id'] ,ENT_QUOTES);
$tok= htmlentities($_GET['token'] ,ENT_QUOTES);
$que= "SELECT * FROM questions WHERE id='$id' AND token = '$tok'";
$query = mysql_query($que);
$num = mysql_num_rows($query);
if($num == 1){
$row = mysql_fetch_array($query);
$cat = $row['categories'];
$q = $row['question'];
$pap = $row['paper_type'];
$f = $row['f_option'];
$s = $row['s_option'];
$t = $row['t_option'];
$ft = $row['ft_option'];
$ans = $row['answer'];
include('q_ext.php');

}
else{
$msg = "<b>invalid question</b>";
echo $msg ;
}

}
else{
$msg = "<b>Parameter Missing!!!</b>";
echo $msg;


}
?>