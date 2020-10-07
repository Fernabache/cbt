<?php

include("auth.php");


?>
<html>
<head>

<script src="jquery-1.7.2.min.js"></script>

<script src="jquery.nicescroll.js" type="text/javascript"></script>
<script src="custom.js" type="text/javascript"></script>

<title>
CBT Cpanel- <?php echo $title;?>
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




<div id="news_p">

<h2><?php echo $title;?></h2>
<font style="color:gray">Posted by Admin on <?php echo $date_time;?></font>
<p>
<img style="width:160px;height:150px;margin:20pt;border-radius:50% 50%;-moz-border-radius:50% 50%;-webkit-border-radius:50% 50%;-o-border-radius:50% 50%;-ms-border-radius:50% 50%;" src="cp_news_imageselector.php?id=<?php echo $id;?>"/>
<?php echo $full;?>

</p>


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