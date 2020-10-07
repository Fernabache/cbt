<html>
<head>
<title>
Data Management Page
</title>
</head>
<body style="background-color:transparent">
<center><h2 style="letter-spacing:3px">&raquo; SEARCH FOR ANY UPLOADED FILES &laquo;</h2></center>
<script type="text/javascript" src="ajaxsearch.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>

<center>
<?php
if(isset($_GET['msg']) && !empty($_GET['msg'])){
$g = $_GET['msg'];
echo "<p style='text-align:center;color:gray'>&raquo; $g &laquo;</p>" ;

}

?>

<form><input type="text" id="sr" onkeyup="show(this.value)" placeholder="SEARCH FILES BY NAME AND TYPE" style="width:60%;height:40px"/></form>
<div id="username">

</div>
</center>
</body>
</html>