<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Files Uploader</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false">

<div >

<?php
if(isset($_GET['msg']) && !empty($_GET['msg'])){
$g = $_GET['msg'];
echo "<p style='text-align:center;color:lightgray'>&raquo; $g &laquo;</p>" ;

}
include("upload.html");
?>

</div>


</body>
</html>
