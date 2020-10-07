<?php

include("auth.php");
if(!isset($_GET['token']) && empty($_GET['token'])){
$msg = "paramater missing";
header("location:qmethod.php?msg=$msg");

}

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
<img src="image/change.png" onclick="parent.location='qmethod.php'" title="Please click this button to select the question type" style="width:160px;;margin:10px;"/>

<center><img src="image/exs.png" style="width:70%;margin:10pt"/></center>
<div class="cp_news">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>

<form method="Post" action="process.php">
<div id="dres">
<table cellpadding="5px"  cellspacing="5px">
<tr>
<td>
<p style="margin:5pt">Subjects:</p>
<select name="cat[]"  style="width:500px">
<?php
include('catego.php');
?>
</select>
</td>
</tr>

<tr>

<td>
<p style="margin:5pt">Exam Type:</p>
<select name="cattype[]"  style="width:500px">
<?php
include('type.php');
?>
</select>
</td>
</tr>

<tr>

<td>
<p style="margin:5pt">Select Session:</p>
<select name="session[]"  style="width:500px">
<?php
include('sessions.php');
?>
</select>
</td>
</tr>

<tr>

<td>
<p style="margin:5pt">Select Semester:</p>
<select name="semester[]"  style="width:500px">
<?php
include('semester.php');
?>
</select>
</td>
</tr>

<tr>

<td valign="top">

<textarea name="post" class="ckeditor" id="" rows="" cols="" style="resize:none">
Post Examination Question
</textarea>


</td>
</tr>


<tr>

<td valign="top">
<textarea name="first" class="ckeditor" id="" rows="" cols="" style="resize:none">
First Option
</textarea>

</td>
</tr>

<tr>

<td valign="top">
<textarea name="second" class="ckeditor" id="" rows="" cols="" style="resize:none">
Second Option
</textarea>



</td>
</tr>

<tr>

<td valign="top">
<textarea name="third" class="ckeditor" id="" rows="" cols="" style="resize:none">
Third Option
</textarea>


</td>
</tr>


<tr>

<td valign="top">
<textarea name="fourth" class="ckeditor" id="" rows="" cols="" style="resize:none">
Fourth Option
</textarea>


</td>
</tr>

<tr>

<td valign="top">
<p style="margin:5pt">Correct Option:</p>
<select name="answer[]"  style="width:300px">
<option value="a">First Option</option>
<option value="b">Second Option</option>
<option value="c">Third Option</option>
<option value="d">Fourth Option</option>
<option value="e">None</option>
</select>
</td>
</tr>

<tr>

<td>
<input type="hidden" name="user" value="<?php echo "wolexzo07";?>"/>
<input type="hidden" name="qtype" value="<?php echo "objective";?>"/>
<input type="hidden" name="tokken" value="<?php echo $_GET['token'];?>"/>

<input type="image" id="submit" src="image/sub.png"/>
<script type="text/javascript" language="javascript">
function clk(){
confirm("Are you sure you want to submit");
}

</script>
</td>
</tr>
</table>
</div>
</form>


<div id="footer">
<?php
include("footer.php");
?>
</div>
</body>
</html>