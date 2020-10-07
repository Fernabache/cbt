
function msg_alert() {
var namex = /^[a-z0-9]+$/;
if (document.getElementById('content').value == "")
{
document.getElementById('res_msg').innerHTML = "Please Enter a value";
document.getElementById('content').focus();
return false;
}
else{

var xmlhttp;
if(window.XMLHttpRequest){

xmlhttp = new XMLHttpRequest();

}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

document.getElementById("res_msg").style.display="block";
document.getElementById("res_msg").innerHTML=xmlhttp.responseText;
document.getElementById("res_msg").style.border="0px";


}


}
var url = "msg_proc.php?nameg=" + escape(document.getElementById("content").value);

xmlhttp.open("GET",url ,true);
xmlhttp.send();

return false;

}


}

function tim(){
setInterval("result_msg()" ,1000);

}

