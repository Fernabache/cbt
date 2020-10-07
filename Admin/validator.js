function username(str){
var xmlhttp;
if(str.length==0)
{
document.getElementById("username").innerHTML="";
document.getElementById("username").style.border="0px";
document.getElementById("imgi").style.display="none";
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
document.getElementById("username").innerHTML=xmlhttp.responseText;
document.getElementById("username").style.border="0px";


}



}

xmlhttp.open("GET","username_checker.php?q="+str,true);
xmlhttp.send();

}


function email(str){
var xmlhttp;
if(str.length==0)
{
document.getElementById("email").innerHTML="";
document.getElementById("email").style.border="0px";
document.getElementById("img1").style.display="none";
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
document.getElementById("img1").style.display="block";
document.getElementById("email").innerHTML=xmlhttp.responseText;

document.getElementById("email").style.border="0px";


}



}

xmlhttp.open("GET","email_checker.php?q="+str,true);
xmlhttp.send();

}