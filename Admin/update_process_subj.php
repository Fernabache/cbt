
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
$ans  = clk($_POST['answer']);


$command = "UPDATE questions SET question = '$q' , answer='$ans' ,date_time = now() WHERE id='$id' ";
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