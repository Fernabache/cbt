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

<script type="text/javascript">
function readURL(input){
if(input.files && input.files[0]){
var reader = new FileReader();
reader.onload = function (e) {
$('#img_prev').attr('src' , e.target.result);

};
reader.readAsDataURL(input.files[0]);

}

}

</script>
<title>
CBT Cpanel-News Posting Page
</title>
<script type="text/javascript" language="javascript" src="ckeditor.js"></script>
<link rel="stylesheet" href="style/style.css" media="all"/>

</head>
<body>
<?php
if(isset($_POST['cpanel_news'])){
function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
$title = clean($_POST['htitle']);
$short = clean($_POST['short']);
$full = clean($_POST['long']);
$token = clean($_POST['cpanel_news']);
if (!is_uploaded_file($_FILES['upload']['tmp_name'])){
$msg="<script type='text/javascript'>alert('No file to Upload!')</script>";
header("location:cp_news.php?msg=$msg");
exit();
}
if ($_FILES['upload']['size'] > 300000){

$msg="<script type='text/javascript'>alert('File Upload Exceed 300kb!')</script>";
header("location:cp_news.php?msg=$msg");
exit();

}
	
if ($_FILES['upload']['type'] == 'image/jpeg' || $_FILES['upload']['type'] == 'image/png' || $_FILES['upload']['type'] == 'image/gif' || $_FILES['upload']['type'] == 'image/pjpeg')
{

$uploadfile = clean($_FILES['upload']['tmp_name']);
$uploadname = clean($_FILES['upload']['name']);
$uploadsize = clean($_FILES['upload']['size']);
$uploadtype = clean($_FILES['upload']['type']);
$uploaddata = clean(file_get_contents($uploadfile)); 

require_once("config.php");
$tab = "
CREATE TABLE IF NOT EXISTS cp_news(
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
photo LONGBLOB DEFAULT NULL,
picsize varchar(100) DEFAULT NULL,
picname varchar(100) DEFAULT NULL,
pictype varchar(100) DEFAULT NULL,
title TEXT NOT NULL ,
short TEXT NOT NULL ,
full TEXT NOT NULL ,
categories TEXT NOT NULL,
token TEXT NOT NULL,
date_time varchar(100) NOT NULL
)
";
$tab_q = mysql_query($tab);
if(!$tab_q){
		$msg="<script type='text/javascript'>alert('failed to create table!')</script>";
		echo $msg;


}else{

$insert = "INSERT INTO cp_news(photo, picsize, picname, pictype,title ,short , full , categories , token ,date_time ) VALUES('$uploaddata', '$uploadsize', '$uploadname', '$uploadtype','$title' ,'$short' ,'$full' ,'general' , '$token' , now())";
$query = mysql_query($insert);
if($query){
		$msg="<script type='text/javascript'>alert('News Posted Successfully')</script>";
		echo $msg;
}
else{
		$msg="<script type='text/javascript'>alert('failed to insert data into database')</script>";
		echo $msg;

}



}
}
else{
		$msg="<script type='text/javascript'>alert('invalid picture format')</script>";
		echo $msg;

}
}

?>

<?php
include("header.php");

?>
<center><img src="image/cp_ne.png" style="width:70%;margin:10pt"/></center>
<div class="cp_news">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>
<form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>">

<table cellpadding="5px" cellspacing="5px" border="0px">
<tr>
<td valign="top"></td>
<td valign="top">
<input type="text" style="width:560px;padding:5px;height:34px;" name="htitle" value="Heading"/>
</td>
</tr>
<tr>
<td valign="top"></td>
<td valign="top">
<input type="file" style="width:560px;" name="upload" title="Please upload a picture  to post with your news " onchange="readURL(this)" required="required" placeholder="upload news image"/>
	<div style="margin:1%"><img src="image/no-avatar.jpg" id="img_prev" style="width:120px;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;-o-border-radius:10px;-ms-border-radius:10px;"/></div>
	
</td>
</tr>

<tr>
<td valign="top"></td>
<td valign="top"><textarea name="short" class="ckeditor" cols="" rows="">short Post</textarea></td>
</tr>

<tr>
<td valign="top"></td>
<td valign="top"><textarea name="long" class="ckeditor" cols="" rows="">Full Post</textarea></td>
</tr>

<tr>
<td valign="top"><input type="hidden" name="cpanel_news" value="<?php $sha = rand(1 ,253629149);$enc=sha1(md5($sha));echo $enc;?>"/></td>
<td valign="top"><input type="image" src="image/sub_post.png" style="width:120px"/></td>
</tr>
</table>

</form>

</div>
<div id="footer">
<?php
include("footer.php");
?>
</div>
</body>
</html>