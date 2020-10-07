<div id="s_script">
<div align="">
<img src="image/cancel.png" id="s_can" style="height:15px;width:15px;" /></div>
<center>
<img src="image/sec.png" id="ec"/>
<div style="padding:15pt;border:1px solid black;width:90%;background-color:transparent;border-radius:20px;-moz-border-radius:20px;-webkit-border-radius:20px;-o-border-radius:20px;-ms-border-radius:20px;box-shadow:2px 2px 1px 0px black;-moz-box-shadow:2px 2px 1px 0px black;-webkit-box-shadow:2px 2px 1px 0px black;-o-box-shadow:2px 2px 1px 0px black;-ms-box-shadow:2px 2px 1px 0px black;">
<form>
<table width="100%" cellspacing="0px" cellpadding="0px">
<tr>
<td width="99.8%">
<input type="text"  required="" onkeyup="username(this.value)"  name="user" placeholder="Search Examination Script"  style="width:95%;padding:10px;"/>

</td>
<td width="0.2%">
<img src="image/loading_animate.gif" style="display:none;height:30px;width:30px;" id="img"/>

<img src="image/loading_static.gif" style="height:30px;width:30px;" id="imgg"/>

</td>

</tr></table>
</form>
</div></center>
<div id="username" style="display:none;margin-left:10%;margin-top:10pt"></div>


<script type="text/javascript" language="javascript">

function username(str){
var xmlhttp;

if(str.length==0)
{
document.getElementById("username").innerHTML="";
document.getElementById("username").style.border="0px";
document.getElementById("img").style.display="none";
document.getElementById("imgg").style.display="block";
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
document.getElementById("imgg").style.display="none";
document.getElementById("username").innerHTML=xmlhttp.responseText;

document.getElementById("username").style.border="0px";


}



}

xmlhttp.open("GET","user_d.php?q="+str,true);
xmlhttp.send();

}


</script>

</div>
