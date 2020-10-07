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
CBT Cpanel - Examination Master List
</title>
<script type="text/javascript" language="javascript" src="ckeditor.js"></script>
<link rel="stylesheet" href="style/style.css" media="all"/>

</head>
<body style="background-image:url(img/fadep.jpg);background-repeat:no-repeat;background-position:50% 50% ;">

<?php
include("header.php");

?>
<img src="img/expand.png" onclick="parent.location='full_screen.php'" style="width:30px;margin:10pt;"/>

<div align="center">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>
<div style="margin-top:5pt;margin-bottom:20pt">


<script type="text/javascript" language="javascript" src="mfetchy.js"></script>
<script type="text/javascript" language="javascript">
result_msging();
</script>


<center><img src="image/gt.png" style="width:50%;margin-bottom:2%"/></center>

<div id="search" style="display:none">


</div>
<div id="url">
<img src="image/url.gif"  /></div>

</div>

</div>


<div id="footer">
<?php
include("footer.php");
?>
</div>












</body>
</html>
