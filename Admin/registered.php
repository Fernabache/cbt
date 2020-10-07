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
CBT Cpanel - Registered Students
</title>
<script type="text/javascript" language="javascript" src="ckeditor.js"></script>
<link rel="stylesheet" href="style/style.css" media="all"/>

</head>
<body>

<?php
include("header.php");

?>
<img src="image/reg_user.png" style="width:100%;"/>

<div align="center">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?></div>

<?php

include("php/msg_alert.php");
?>



<div id="footer">
<?php
include("footer.php");
?>
</div>












</body>
</html>
