<?php
include("auth.php");
include("level_validate.php");

?>
<html>
<head>

<script src="jquery-1.7.2.min.js"></script>

<script src="jquery.nicescroll.js" type="text/javascript"></script>
<script src="custom.js" type="text/javascript"></script>

<title>
CBT Cpanel- Submitted Examination Script
</title>
<script type="text/javascript" language="javascript" src="ckeditor.js"></script>
<link rel="stylesheet" href="style/style.css" media="all"/>

</head>
<body style="background-image:url('image/bgh.png')">

<?php
include("header.php");

?>

<div align="center">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>
<div style="margin-top:20pt;margin-bottom:20pt">

<div>
<?php
include('plister.php');
?>
</div>

</div>

</div>


<div id="footer">
<?php
include("footer.php");
?>
</div>












</body>
</html>
