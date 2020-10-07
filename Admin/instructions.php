<?php

include("auth.php");
include("level_validate.php");



?>

<html>
<head>

<script type="text/javascript" language="javascript">
CKEDITOR.replace( 'post' );
CKEDITOR.replace( 'first' );
CKEDITOR.replace( 'second' );
CKEDITOR.replace( 'third' );

CKEDITOR.replace( 'fourth' );
CKEDITOR.replace( 'answer' );
CKEDITOR.replace( 'ins' );
</script>
<script src="jquery-1.7.2.min.js"></script>

<script src="jquery.nicescroll.js" type="text/javascript"></script>
<script src="custom.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
function confir(){
var tab = document.getElementById("tab").value;
var cat = document.getElementById("cat").value;
var txt = document.getElementById("txt").value;
if(tab == ""){
alert("Please enter your instructions");
document.getElementById("tab").focus();
return false;
}
else if(cat == ""){
alert("Please select instructions categories");
document.getElementById("cat").focus();
return false;

}

else if(txt == ""){
alert("Please enter your instructions title");
document.getElementById("txt").focus();
return false;

}
else{
var answer = window.confirm("Are you sure you want to submit " + cat + " instructions");
if(answer){
return true;
}else{
return false;
}


}
}
</script>
<title>
CBT Cpanel-Examination Instructions Posting Section
</title>
<script type="text/javascript" language="javascript" src="ckeditor.js"></script>
<link rel="stylesheet" href="style/style.css" media="all"/>

</head>
<body>
<?php
if(isset($_POST['exam_instruction'])){

function clean($value){
$value = @trim($value);
if(get_magic_quotes_gpc()){
$value = stripslashes($value);
}
return mysql_real_escape_string($value);

}

$title = clean($_POST['htitle']);
$ins = clean($_POST['ins']);

$cat = "";
if(isset($_POST['cat']) && !empty($_POST['cat'])){
foreach($_POST['cat'] as $key){
$cat = $key;
}

}


require_once("config.php");
$tab = "
CREATE TABLE IF NOT EXISTS instruction(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
title TEXT NOT NULL ,
categories TEXT NOT NULL,
instruction TEXT NOT NULL ,
date_time varchar(100) NOT NULL
)
";
$tab_q = mysql_query($tab);
if(!$tab_q){
		$msg="<script type='text/javascript'>alert('failed to create table!')</script>";
		echo $msg;


}else{


if($cat == "examination"){
$select = "SELECT * FROM instruction  WHERE categories = 'examination'";
$rq = mysql_query($select);
$rq_count = mysql_num_rows($rq);

if($rq_count != 1){
$insert = "INSERT INTO instruction(title , categories , instruction ,date_time ) VALUES('$title' ,'$cat' ,'$ins' , now())";
$query = mysql_query($insert);
if($query){
		$msg="<script type='text/javascript'>alert('Examination Instructions Posted Successfully')</script>";
		echo $msg;
}
else{
		$msg="<script type='text/javascript'>alert('failed to insert data into database')</script>";
		echo $msg;

}
}
else{
$insert = "UPDATE instruction SET title = '$title', categories = '$cat' , instruction = '$ins' , date_time = now() WHERE categories = 'examination'";
$query = mysql_query($insert);
if($query){
		$msg="<script type='text/javascript'>alert('Examination Instructions Updated Successfully')</script>";
		echo $msg;
}
else{
		$msg="<script type='text/javascript'>alert('failed to update data!')</script>";
		echo $msg;

}

}




}
else if($cat == "registration"){
$select = "SELECT * FROM instruction  WHERE categories = 'registration'";
$rq = mysql_query($select);
$rq_count = mysql_num_rows($rq);

if($rq_count != 1){
$insert = "INSERT INTO instruction(title , categories , instruction ,date_time ) VALUES('$title' ,'$cat' ,'$ins' , now())";
$query = mysql_query($insert);
if($query){
		$msg="<script type='text/javascript'>alert('Registration instructions Posted Successfully')</script>";
		echo $msg;
}
else{
		$msg="<script type='text/javascript'>alert('failed to insert data into database')</script>";
		echo $msg;

}
}
else{
$insert = "UPDATE instruction SET title = '$title', categories = '$cat' , instruction = '$ins' , date_time = now() WHERE categories = 'registration'";
$query = mysql_query($insert);
if($query){
		$msg="<script type='text/javascript'>alert('Registration instructions Updated Successfully')</script>";
		echo $msg;
}
else{
		$msg="<script type='text/javascript'>alert('failed to update data!')</script>";
		echo $msg;

}

}




}


else if($cat == "exam_title"){
$select = "SELECT * FROM instruction  WHERE categories = 'exam_title'";
$rq = mysql_query($select);
$rq_count = mysql_num_rows($rq);

if($rq_count != 1){
$insert = "INSERT INTO instruction(title , categories , instruction ,date_time ) VALUES('$title' ,'$cat' ,'$ins' , now())";
$query = mysql_query($insert);
if($query){
		$msg="<script type='text/javascript'>alert('Examination Title Posted Successfully')</script>";
		echo $msg;
}
else{
		$msg="<script type='text/javascript'>alert('failed to insert data into database')</script>";
		echo $msg;

}
}
else{
$insert = "UPDATE instruction SET title = '$title', categories = '$cat' , instruction = '$ins' , date_time = now() WHERE categories = 'exam_title'";
$query = mysql_query($insert);
if($query){
		$msg="<script type='text/javascript'>alert('Examination Title Updated Successfully')</script>";
		echo $msg;
}
else{
		$msg="<script type='text/javascript'>alert('failed to update data!')</script>";
		echo $msg;
}

}
}

else{

		$msg="<script type='text/javascript'>alert('no option select!')</script>";
		echo $msg;

}


}



}

?>

<?php
include("header.php");

?>
<center><img src="image/ei.png" style="width:70%;margin:10pt"/></center>
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>

<div class="exam_instruction">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" onsubmit="return(confir())" >

<table cellpadding="5px" cellspacing="5px" border="0px">


<tr>

<td valign="top">
<select style="width:560px" id="cat" name="cat[]" >
<option value="">Select instructions Categories - - - - - - -</option>
<option value="examination">Examination instructions</option>
<option value="registration">Registration instructions</option>
<option value="exam_title">Examination Title</option>
</select>
</td>
</tr>


<tr>

<td valign="top">
<input type="text" id="txt" value="Heading" style="width:560px;padding:5px;height:34px;" name="htitle"/>
</td>
</tr>


<tr>

<td valign="top"><textarea name="ins" id="tab" class="ckeditor" cols="" rows="">Write examination instructions here</textarea></td>
</tr>

<tr>

<td valign="top">
<input type="hidden" name="exam_instruction"/>
<input type="image" src="image/sub_post.png"  style="width:120px"/></td>
</tr>
</table>

</form>

<hr/>
<?php
include("instruction_fetch.php");
?>
</div>


<div id="footer">
<?php
include("footer.php");
?>
</div>
</body>
</html>