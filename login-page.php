<?php
include("main.php");
include('sess_validation.php');
?>
<html>
<head>
<?php
include("head_b.php");
?>
<title>IUO-CBT SYSTEM- LOGIN PAGE</title>
</head>
<body>
<div class="header">
<center>
<img src="img/banne.png" class="bnn"/>
<img src="img/un.png" class="bnnr"/>
</center>
</div>







<div id="cnt" align="center">


<?php

if((isset($_GET["msg"]) && !empty($_GET["msg"]) && !isset($_GET["token_generated"]))){

echo $_GET["msg"];

}else{

}?>




<div id="fgh">


<div class="sc">


<img src="img/log.png" style="height:;width:200px;margin-left:7pt;margin-top:5pt"/>

<form method="POST" action="process_log.php" onsubmit="return(confir())">

<table cellpadding="5px" cellspacing="5px" style="" border="0">						

<tr>
<td valign="top">
<p class="pp">Username</p>
<input type="text" name="mat" autocomplete="off" required="" placeholder="Enter your matric number" id="fmp" class="mp"/></td>
<td valign="top" style="letter-spacing:2px"></td>
</tr>

<tr>
<td>
<p class="pp">Password</p>
<input type="password" name="pass" autocomplete="off" required="" placeholder="Enter password" id="smp" class="mp"/></td>
<td style="letter-spacing:2px"></td>
</tr>
<tr>

<td><center><input type="image" src="image/l.png" class="lbt" style="width:305px;"/></center>
<p>
<?php
$token = sha1(md5("wolexzo07isabigboystudentthatisgoingtoovertakeeverywherethispresentyear2015"));
if((isset($_GET["msg"]) && !empty($_GET["msg"])) && (isset($_GET["token_generated"]) && !empty($_GET["token_generated"]) && ($_GET["token_generated"]==$token)) ){

echo "<p style='letter-spacing:2px;color:green;margin-top:10pt;'>".$_GET['msg']."</p>";

}else{?>

<p style="display:none;">
<a href="register.php" target="_blank" style="letter-spacing:2px;text-decoration:none;color:black">Register an account</a>
</p>

<?php
}
?>
</p>
</td>
<td></td>
</tr>
</table>
</form>
</div>

</div>







</div>

<script type="text/javascript" language="javascript">
function confir(){
var tab = document.getElementById("fmp").value;
var cat = document.getElementById("smp").value;
if(tab == ""){
alert("Please enter your username or email address or  mobile number!");
document.getElementById("tab").focus();
return false;
}
else if(cat == ""){
alert("Please enter your password!");
document.getElementById("cat").focus();
return false;

}

else{
return true;


}
}
</script>

     	<script src="shutdown.js" type="text/javascript"></script>
     	<div id="logi"></div>


<div id="footer">
<?php
include("footer.php");
?>
</div>


</body>
</html>
