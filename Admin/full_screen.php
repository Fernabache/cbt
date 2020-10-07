<?php
include("auth.php");
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
<body style="background-image:url(img/fadep.jpg);background-repeat:repeat;background-position:50% 50% ;">
<img style="padding:17px;width:17px;height:20px;float:right" onclick="window.print()" title="Click this icon to print your result" src="image/print.png"/>
<div align="center">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>
<div style="margin-top:5pt;margin-bottom:4pt">

<img src="img/result_s.png" style="width:50%;"/>
<script type="text/javascript" language="javascript" src="mfetchy.js"></script>
<script type="text/javascript" language="javascript">
result_msging();
</script>



<div id="search" style="display:none">


</div>
<div id="url">
<img src="image/url.gif"  /></div>

</div>

</div>
</body>
</html>