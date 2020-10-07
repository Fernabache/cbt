<?php 
if(isset($_POST["user_app"])){
function valuee($str){
$str = @trim($str);
if(get_magic_quotes_gpc()){
$str = stripslashes($str);
}
return mysql_real_escape_string($str);

}
$score = valuee($_POST["score"]);
$user = valuee($_POST["user_app"]);
$uy = valuee($_POST["user_appi"]);
$idd = valuee($_POST["id"]);

if($score > 100 ){
$msg = "<script type='text/javascript'>alert('The value you entered is $score and the allowed value must be lesser than or equal to 100')</script>";
header("location:index.php?msg=$msg");
exit();

}

if(!is_numeric($score)){
$msg = "<script type='text/javascript'>alert('Enter valid data!')</script>";
header("location:index.php?msg=$msg");
exit();

}

$upd = "UPDATE essay_submission SET score='$score' WHERE id='$idd' AND username='$user'";
$rt = mysql_query($upd);
if($rt){
$msg = "<script type='text/javascript'>alert('$uy score updated to $score')</script>";
header("location:index.php?msg=$msg");

}
else{
$msg = "<script type='text/javascript'>Failed to update user $uy score point</script>";
header("location:index.php?msg=$msg");

}
}

?>