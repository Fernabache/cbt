<center>
<form onchange="result(this.value)">
<select>
<option value="a">a</option>
<option value="b">b</option>
<option value="c">c</option>
<option value="d">d</option>
<option value="e">e</option>
</select>
</form>
<div id="search" style="display:none;" ></div>
</center>
<script type="text/javascript" language="javascript">
function result(str){
var xmlhttp;
if(str.length==0)
{
document.getElementById("search").innerHTML="";
document.getElementById("search").style.border="0px";

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


}



}
var url = "upgrade.php?opt=" + str + "&id=" + escape(document.getElementById("id").value) + "&tokken=" + escape(document.getElementById("tok").value) + "&subject=" + escape(document.getElementById("subjec").value) + "&typing=" + escape(document.getElementById("typet").value);

xmlhttp.open("GET",url ,true);
xmlhttp.send();

}

</script>