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
CKEDITOR.replace( 'short' );
CKEDITOR.replace( 'long' );
</script>
<script src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" language="javascript" src="ckeditor.js"></script>
<link rel="stylesheet" href="style/style.css" media="all"/>
<script src="custom.js" type="text/javascript"></script>
<title>
CBT Cpanel-Examination Questions Posting Section
</title>


</head>
<body>

<?php
include("header.php");

?>

<p style="text-align:center;color:green;letter-spacing:2px;margin-top:5px;">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?></p>


<div id="class" align="middle">
<?php
if(isset($_POST['rand']) && !empty($_POST['rand'])){
$sele = "";
if(isset($_POST['meth'])){
foreach($_POST['meth'] as $key){
$sele = $key;
}
}


$tok = $_POST['rand'];
if($sele != ""){
header("location:posted_questions.php?category=$sele&token=$tok");

}
else{
$msg="<script type='text/javascript'>alert('Please select an option!')</script>";
echo $msg;
}


}
?>

<fieldset class="field"><legend class="legen">VIEW POSTED EXAMINATION QUESTIONS</legend>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
<table cellpadding="5px"  cellspacing="5px">
<tr>
<td>
<p style="margin:5pt">View Based On Subjects</p>
<select name="meth[]"  style="width:500px">
<?php
include('catego.php');
?>
</select>
</td>
</tr>
<tr>

<td>

<center>
<input type="hidden" name="rand" value="<?php echo sha1(rand(12,5625718));?>"/>
<input type="image" src="image/submm1.png" style="width:200px;"/>
</center></form>
</td>
</tr>
<tr>

<td>
<?php
if(isset($_POST['rander']) && !empty($_POST['rander'])){
$sele = "";
if(isset($_POST['meth'])){
foreach($_POST['meth'] as $key){
$sele = $key;
}
}


$tok = $_POST['rander'];
if($sele != ""){
header("location:posted_questions.php?type=$sele&token=$tok");

}
else{
$msg="<script type='text/javascript'>alert('Please select an option!')</script>";
echo $msg;
}


}
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
<p style="margin:5pt">View Based On Exam Type</p>
<select name="meth[]"  style="width:500px">
<?php
include('type.php');
?>
</select>
</td>
</tr>

<tr>

<td>

<center>
<input type="hidden" name="rander" value="<?php echo sha1(rand(12,5625718));?>"/>
<input type="image" src="image/submm1.png" style="width:200px;"/>
</center>
</td>
</tr>
</table>
</form>
</fieldset>


</div>


<div id="footer">
<?php
include("footer.php");
?>
</div>
</body>
</html>
