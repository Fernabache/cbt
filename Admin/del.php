<?php

if(isset($_POST['subb'])){

$cat = $_POST['cate'];

$title = "";
if(isset($_POST["title"])){
foreach($_POST["title"] as $key){
$title = $key;
}

}

require_once("config.php");

$select = "DELETE FROM exam_categories  WHERE categories  = '$cat' AND under  = '$title' ";
$valid = "SELECT * FROM exam_categories  WHERE categories  = '$cat' AND under  = '$title'  ";
$validate = mysql_query($valid) ;
$validnum = mysql_num_rows($validate) ;

if ($validnum == 1){

$resul = mysql_query($select) ;
if($resul){

$msg = "<script type='text/javascript'>alert('$title deleted successfully!!')</script>";
header("location:index.php?msg=$msg");
exit;
}
else{

$msg = "<script type='text/javascript'>alert('Unable to query Database!!')</script>";
header("location:index.php?msg=$msg");
exit;
}
}

else{

$msg = "<script type='text/javascript'>alert('$title Does not Exist!!')</script>";
header("location:index.php?msg=$msg");
exit;
}

}
else{

$msg = "<script type='text/javascript'>alert('parameter!!')</script>";
header("location:index.php?msg=$msg");
exit;
}
?>
