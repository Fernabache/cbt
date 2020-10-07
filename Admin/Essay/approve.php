<?php 
if(isset($_POST["result_app"])){
require_once("../config.php");
function valuee($str){
$str = @trim($str);
if(get_magic_quotes_gpc()){
$str = stripslashes($str);
}
return mysql_real_escape_string($str);

}

$slet = "";
if(isset($_POST['quest_app'])){
foreach($_POST['quest_app'] as $key ){
$slet = $key;
}

}

$user = valuee($_POST["user_app"]);

$upd = "UPDATE essay_submission SET score_approval='$slet' WHERE lecturer_name ='$user'";
$rt = mysql_query($upd);
if($rt){
$msg = "<script type='text/javascript'>Result is now $slet</script>";
header("location:index.php?msg=$msg");

}
else{
$msg = "<script type='text/javascript'>Failed to update score_app  </script>";
header("location:index.php?msg=$msg");

}
}



?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="quest_app[]" style="width:250px;padding:5px;">
<option value="approved" style="padding:5px;" title="Please select this option if you want to publish the students result">Approve Examination Result</option>
<option value="pending" style="padding:5px;" title="Please select this option if you want to pend publishing of students result">Pend Examination Result</option>

</select>
<input type="hidden" value="<?php echo crypt(rand(1 ,5621));?>" name="result_app"/>
<input type="hidden" value="<?php echo $_SESSION['CURRENT_IUO_DATA_USERNAME'];?>" name="user_app"/>
<input type="image" src="../img/submit.png" style="width:100px;float:left" />
</form>

<p style="padding-top:10pt;letter-spacing:2px;color:green"><?php require("re_stat.php");?></p>