<script type="text/javascript" language="javascript">
function result_confirm(str){
var xmlhttp;
if(str.length==0)
{
document.getElementById("search").innerHTML="";
document.getElementById("search").style.border="0px";
document.getElementById("search").style.padding="0px";
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

document.getElementById("search").style.display="block";
document.getElementById("search").innerHTML=xmlhttp.responseText;
document.getElementById("search").style.border="0px";
document.getElementById("search").style.padding="10px";

}



}

xmlhttp.open("GET","searchlive.php?q="+str,true);
xmlhttp.send();

}

</script>
