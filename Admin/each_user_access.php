<?php
include("page_auth.php");
?>
<div class="egra" style="margin-top:20pt">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">GRANTING / REVOKING EACH USER'S ACCOUNT ACCESS</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to GRANT or REVOKE a particular user's login account .
</p>
</div>
<?php
if(isset($_POST['each_all_user_access']) && !empty($_POST['each_all_user_access'])){
require_once("config.php");
$slet = "";
if(isset($_POST['publish'])){
foreach($_POST['publish'] as $key ){
$slet = $key;
}

}

function check_data($chk){
	$chk = @trim($chk);
	if(get_magic_quotes_gpc()){
		
		}
		return mysql_real_escape_string($chk);
	
	}
$user = check_data($_POST['user']);






$command = "UPDATE register SET access = '$slet' WHERE username='$user' ";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('$user $slet')</script>";
echo $msg;
}


}
?>
<div style="margin-top:10pt">
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



function result_confirmm(str){
var xmlhttp;
if(str.length==0)
{
document.getElementById("searchh").innerHTML="";
document.getElementById("searchh").style.border="0px";
document.getElementById("searchh").style.padding="0px";
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

document.getElementById("searchh").style.display="block";
document.getElementById("searchh").innerHTML=xmlhttp.responseText;
document.getElementById("searchh").style.border="0px";
document.getElementById("searchh").style.padding="10px";

}



}

xmlhttp.open("GET","searchlive.php?q="+str,true);
xmlhttp.send();

}



function result_confirmer(str){
var xmlhttp;
if(str.length==0)
{
document.getElementById("searc").innerHTML="";
document.getElementById("searc").style.border="0px";
document.getElementById("searc").style.padding="0px";
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

document.getElementById("searc").style.display="block";
document.getElementById("searc").innerHTML=xmlhttp.responseText;
document.getElementById("searc").style.border="0px";
document.getElementById("searc").style.padding="10px";

}



}

xmlhttp.open("GET","searchlive.php?q="+str,true);
xmlhttp.send();

}


</script>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" autocomplete="off">
<table cellpadding="10px" cellspacing="5px" border="0px">
<tr>
<td>
<input type="text" placeholder="Enter matric number" name="user" onkeyup="result_confirm(this.value)" style="margin-left:0pt;" class="textn"/>

</td>
	<td>

<div id="search" style="margin-top:0;display:none;position:absolute;overflow:auto;box-shadow:1px 1px 1px 1px black;-moz-box-shadow:1px 1px 1px 1px black;-webkit-box-shadow:1px 1px 1px 1px black;z-index: 1000;background-color:white;opacity:0.9;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;-o--border-radius:10px;-ms-border-radius:10px"></div>
</td>
</tr>

<tr>
<td><select name="publish[]" class="optn">
<option value="granted">Grant user access</option>
<option value="revoked">Revoke  user access</option>
</select></td>
<td></td>
</tr>

<tr>
<td><input type="image" src="image/qu.png" style="width:80pt;"/><input type="hidden" name="each_all_user_access" value="superadmingrantingaccess"/>
</td>
<td>

</td>
</tr>
</table>

</form></div>


<?php
include("relogging.php");
?>
</div>
