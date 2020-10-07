<?php

include("auth.php");


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
if($sele == "subj"){
header("location:question_post_s.php?token=$tok");

}
elseif($sele == "obj"){
header("location:question_post.php?token=$tok");

}
elseif($sele == "essay"){
header("location:question_post_e.php?token=$tok");

}
else{
$msg="<script type='text/javascript'>alert('Please select an option!')</script>";
echo $msg;
}


}
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
<fieldset class="field"><legend class="legen">SELECT EXAMINATION QUESTION TYPE</legend>

<select name="meth[]" class="slct" required="">
<option class="sti" value="">Select ................</option>
<option class="sti" value="obj">Objective Questions</option>
<option class="sti" value="subj">Subjective Questions</option>
<option class="sti" value="essay">Essay Questions</option>
</select>
<center>
<input type="hidden" name="rand" value="<?php echo sha1(rand(12,5625718));?>"/>
<input type="image" src="image/submm1.png" style="width:200px;"/>
</center>

</fieldset>
</form>

</div>


<div id="footer">
<?php
include("footer.php");
?>
</div>
</body>
</html>