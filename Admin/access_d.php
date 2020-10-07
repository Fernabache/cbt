<html>
<head>
<title>ACCESS DENIED PAGE</title>
<link rel="stylesheet" href="style/style.css" media="all"/>
</head>
<body style="background-color:lightgreen">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>

<center><img src="image/deny.png" style="width:40%;margin:2%"/></center>

</body>
</html>