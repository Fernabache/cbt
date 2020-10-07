<html>
<head>
<title>
Data Management Page
</title>
</head>
<body style="background-color:transparent">
<center><h2 style="letter-spacing:3px">&raquo; UPLOADED FILES MANAGEMENT SECTION &laquo;</h2></center>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="ajaxsearch.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript">
function tim(){
setInterval("result()" ,2000);

}
tim();
</script>

<center>
<?php
if(isset($_GET['msg']) && !empty($_GET['msg'])){
$g = $_GET['msg'];
echo "<p style='text-align:center;color:gray'>&raquo; $g &laquo;</p>" ;

}

?>

<form><input type="text" id="sr" onkeyup="show(this.value)" placeholder="SEARCH FILES BY NAME AND TYPE" style="width:60%;height:40px"/></form>
<div id="username" style="margin-top:1pt;display:none;position:absolute;overflow:auto;margin-left:5%;box-shadow:1px 1px 1px 1px black;-moz-box-shadow:1px 1px 1px 1px black;-webkit-box-shadow:1px 1px 1px 1px black;z-index: 1000;background-color:aqua;opacity:0.9;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;-o--border-radius:10px;-ms-border-radius:10px;width:90%;" ></div>


<div id="search">
<img src="image/urln.gif"/>
</div>
</center>
</body>
</html>