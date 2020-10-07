function result(str){
var xmlhttp;
if(window.XMLHttpRequest){

xmlhttp = new XMLHttpRequest();

}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

document.getElementById("search").style.display="block";

document.getElementById("search").innerHTML=xmlhttp.responseText;
document.getElementById("search").style.border="0px";

}



}
var url = "mpager.php?pn=" + str;

xmlhttp.open("GET",url ,true);
xmlhttp.send();

}




function result_msging(){
var xmlhttp;
if(window.XMLHttpRequest){

xmlhttp = new XMLHttpRequest();

}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

document.getElementById("search").style.display="block";
document.getElementById("search").innerHTML=xmlhttp.responseText;
document.getElementById("url").style.display="none";

}



}
var url = "mpager.php";

xmlhttp.open("GET",url ,true);
xmlhttp.send();

}



