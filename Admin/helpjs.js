
function hellp_alert() {

if (document.getElementById('key').value == "")
{
document.getElementById('helpp_msg').innerHTML = "PLEASE ENTER THE HOT KEY!";
document.getElementById('key').focus();
return false;
}
else if (document.getElementById('keyf').value == "")
{
document.getElementById('helpp_msg').innerHTML = "PLEASE ENTER THE HOT KEY FUNCTIONS!";
document.getElementById('keyf').focus();
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

document.getElementById("helpp_msg").style.display="block";
document.getElementById("helpp_msg").innerHTML=xmlhttp.responseText;
document.getElementById("helpp_msg").style.border="0px";


}


}
var url = "help_proc.php?cat=" + escape(document.getElementById("cat").value) + "&key=" + escape(document.getElementById("key").value) + "&keyf=" + escape(document.getElementById("keyf").value) + "&token=" + escape(document.getElementById("help_token").value);

xmlhttp.open("GET",url ,true);
xmlhttp.send();

return false;

}


}

