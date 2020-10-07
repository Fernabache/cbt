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
</script>
<script src="jquery-1.7.2.min.js"></script>

<script src="jquery.nicescroll.js" type="text/javascript"></script>
<script src="custom.js" type="text/javascript"></script>

<title>
Result Checker
</title>
<script type="text/javascript" language="javascript" src="ckeditor.js"></script>
<link rel="stylesheet" href="style/style.css" media="all"/>

</head>
<body style="background-color:white">

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
include('scorer.php');
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