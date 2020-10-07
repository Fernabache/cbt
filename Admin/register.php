<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Administrator Registration Page</title>
<link rel="stylesheet" href="style/style.css" media="all"/>
<link rel="shortcut icon" href="" type="image/x-icon"/>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>

<script type="text/javascript">
function readURL(input){
if(input.files && input.files[0]){
var reader = new FileReader();
reader.onload = function (e) {
$('#img_prev').attr('src' , e.target.result);

};
reader.readAsDataURL(input.files[0]);

}

}

</script>
</head>
<body style="background-image:url(image/bvg.png);">
<center><img src="image/regis.png" style="width:70%;margin:3%"/></center>

<div id="hg">

<p>
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>
</p>

<div>
<?php
if(isset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_id']) && $_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == 'Super'){

?>
<table cellpadding="" cellspacing="" border="0" width="100%">
<tr>
<td width="60%" valign="top"></td>
<td width="40%" valign="top">
<div style="margin-right:3%;margin-bottom:5%">
<?php include("register.html");?>
</div>

</td>

</tr>

</table>



<?php

}
else{
header("location:access_d.php");

}

?></div>
<script type="text/javascript" language="javascript">

function username(str){
var xmlhttp;

if(str.length==0)
{
document.getElementById("username").innerHTML="";
document.getElementById("username").style.border="0px";
document.getElementById("form_style").style.backgroundImage="url(image/bgh.png)";
document.getElementById("img").style.display="none";
return;
}

if(window.XMLHttpRequest){

xmlhttp = new XMLHttpRequest();

}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

document.getElementById("username").style.display="block";
document.getElementById("img").style.display="block";
document.getElementById("form_style").style.background="white";
document.getElementById("username").innerHTML=xmlhttp.responseText;

document.getElementById("username").style.border="0px";


}



}

xmlhttp.open("GET","username_checker.php?q="+str,true);
xmlhttp.send();

}


function emal(str){
var xmlhttp;
var mailval = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
if(!str.match(mailval))
{
document.getElementById("email").innerHTML="";
document.getElementById("form_style").style.backgroundImage="url(image/bgh.png)";
document.getElementById("email").style.border="0px";
document.getElementById("imgg").style.display="none";
return;
}

if(window.XMLHttpRequest){

xmlhttp = new XMLHttpRequest();

}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

document.getElementById("email").style.display="block";
document.getElementById("imgg").style.display="block";
document.getElementById("form_style").style.background="white";
document.getElementById("email").innerHTML=xmlhttp.responseText;

document.getElementById("email").style.border="0px";


}



}

xmlhttp.open("GET","email_checker.php?q="+str,true);
xmlhttp.send();

}

function chang(){
document.getElementById("username").innerHTML="";
document.getElementById("form_style").style.backgroundImage="url(image/bgh.png)";
document.getElementById("username").style.border="0px";
document.getElementById("img").style.display="none";
return;
}


function changr(){
document.getElementById("email").innerHTML="";
document.getElementById("form_style").style.backgroundImage="url(image/bgh.png)";
document.getElementById("email").style.border="0px";
document.getElementById("imgg").style.display="none";
return;
}

</script>

</div>

</body>
</html>