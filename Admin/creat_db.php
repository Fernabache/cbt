<?php
include('page_auth.php');
?>
<div class="gr" style="margin:2pt;margin-bottom:20px">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">QUERY CBT DATABASE USING SQL COMMAND</h3>

<?php
if(isset($_POST['table_creator']) && !empty($_POST['table_creator'])){
require_once("config.php");
function value($str){
$str = @trim($str);
if(get_magic_quotes_gpc()){
$str = stripslashes($str);
}
return mysql_real_escape_string($str);

}

$tab = $_POST["tab"];
if(empty($tab)){
$msg="<script type='text/javascript'>alert('Please you can not submit empty query!!')</script>";
echo $msg;

}
else{

$command = "$tab";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Database queried successfully')</script>";
echo $msg;
}

}
}
?>
<div style="margin-top:10pt">
<div style="margin:10pt;"> 
<p style="letter-spacing:1px">

NOTE: Please this section is strictly meant for only experienced database Administrator that knows how to use structured query language(SQL) commands.Operations that can be performed are CREATE TABLE , DROP TABLE , TRUNCATE TABLE,INSERT ,DELETE TABLE ,ALTER TABLE, UPDATE TABLE
</p>
<script type="text/javascript" language="javascript">
function confir_db(){
var tab = document.getElementById("tab").value;
if(tab == ""){
alert("Please enter an SQL Command!");
document.getElementById("tab").focus();
return false;
}
else{
var answer = window.confirm("Are you sure you want to execute this query?");
if(answer){
return true;
}else{
return false;
}


}
}
</script>
</div>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" onsubmit="return(confir_db())">
<table cellpadding="2px" cellspacing="5px">
<tr>
<td valign="top">Enter SQL Command </td>
<td>
<textarea cols="50" required="" id="tab" placeholder="Enter your SQL command here" name="tab" rows="10" style="resize:none"></textarea>
</td>
</tr>

<tr>
<td><input type="hidden" name="table_creator" value="superadmingrantingaccess"/>
</td>
<td><input type="image" src="image/qu.png" style="width:80pt;height:25pt"/>
</td>
</tr>
</table>
</form>
</div>
</div>
