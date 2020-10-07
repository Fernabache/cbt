
<?php
if(isset($_POST['up_data']) && !empty($_POST['up_data'])){
require_once("config.php");
function clk($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}


$id  = clk($_POST['id']);	
$q  = clk($_POST['ques']);
$f  = clk($_POST['f']);
$s  = clk($_POST['s']);
$t  = clk($_POST['t']);
$ft  = clk($_POST['ft']);

$ans = "";
if(isset($_POST['answer'])){
foreach($_POST['answer'] as $key ){
$ans = $key;
}

}

$command = "UPDATE questions SET question = '$q' , f_option = '$f' , s_option='$s' , t_option='$t' , ft_option='$ft' ,answer='$ans' ,date_time = now() WHERE id='$id' ";
$exec = mysql_query($command);
if(!$exec){
$page = $_POST['pn'];
$msg="<script type='text/javascript'>alert('Query Failed!')</script>";
header("location:posted_questions.php?pn=$page&msg=$msg");
}
else{
$page = $_POST['pn'];
$msg="<script type='text/javascript'>alert('Selected Question Updated Successfully')</script>";
header("location:posted_questions.php?pn=$page&msg=$msg");
}


}
else{
$msg="<script type='text/javascript'>alert('Paramter Missing!!')</script>";
header("location:posted_questions.php?msg=$msg");

}
?>