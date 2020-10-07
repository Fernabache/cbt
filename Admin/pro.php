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

$mysqlCommand = "
CREATE TABLE IF NOT EXISTS exam_categories (
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL ,
under TEXT NOT NULL,
categories TEXT NOT NULL,
reg_date TEXT NOT NULL
)
";
$queryTable = mysql_query($mysqlCommand);
if(!$queryTable){

$msg = "<script type='text/javascript'>alert('Database Table Creation Failed! Please Check Your Connection')</script>";
header("location:index.php?msg=$msg");
exit;
}


$select = "INSERT INTO exam_categories (under ,categories , reg_date) VALUES('$title' ,'$cat' , now())";
$valid = "SELECT * FROM exam_categories  WHERE categories  = '$cat' AND under  = '$title'  ";
$validate = mysql_query($valid) ;
$validnum = mysql_num_rows($validate) ;

if ($validnum != 1){

$resul = mysql_query($select) ;
if($resul){
$msg = "<script type='text/javascript'>alert('$title added successfully!!')</script>";
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

$msg = "<script type='text/javascript'>alert('$title Category Already Exist!!')</script>";
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
