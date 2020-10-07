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
CBT Cpanel- Posted Questions Section
</title>
<script type="text/javascript" language="javascript" src="ckeditor.js"></script>
<link rel="stylesheet" href="style/style.css" media="all"/>

</head>
<body>

<?php
include("header.php");

?>

<div id="container">

<div id="new_sec">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>




<div id="posted">
<img src="image/oq.png" onclick="parent.location='qcategory.php'" title="Please click this button to view other question categories" style="width:200px;;margin:10px;"/>

<center><img src="image/pqs.png" style="width:50%"/></center>


<?php
if(isset($_GET["category"])){
?><p style="color:navy;text-align:center;letter-spacing:2px;">
<?php
include("notification_counter.php");
?></p>
<?php
include("pagination.php");
}
elseif(isset($_GET["type"])){
?>
<p style="color:navy;text-align:center;letter-spacing:2px">
<?php
include("notify.php");
?></p>
<?php
include("pagination1.php");
}
else{
header("location:qcategory.php?msg=Parameter missing!!");
}

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
