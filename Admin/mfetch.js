function result_msg(){
var xmlhttp;
if(window.XMLHttpRequest){

xmlhttp = new XMLHttpRequest();

}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

document.getElementById("search_msg").style.display="block";
document.getElementById("search_msg").innerHTML=xmlhttp.responseText;
document.getElementById("search_msg").style.border="0px";

}



}
var url = "msg_msg.php";

xmlhttp.open("GET",url ,true);
xmlhttp.send();

}
