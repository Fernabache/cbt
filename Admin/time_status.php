<?php
include("page_auth.php");

?>
<h3 class="hhh">SET EXAMINATION TIME STATUS ( ON/OFF)</h3>
<p style="padding:5px;margin-left:3px;letter-spacing:3px;color:green"><?php
include('tim_status.php');
?></p>
<?php
if(isset($_POST['timer_status']) && !empty($_POST['timer_status'])){
require_once('config.php');
$db = "SELECT * FROM exam_timer WHERE id='1'";
$qu = mysql_query($db);
$num = mysql_num_rows($qu);

$status = "";
if(isset($_POST['status']) && !empty($_POST['status'])){
foreach($_POST['status'] as $key){
$status = $key;
}

}

if($num != 0){
$up_stat = "UPDATE exam_timer SET status = '$status' WHERE id = '1'";
$tim_qu = mysql_query($up_stat);
if($tim_qu){
echo "<script type='text/javascript'>alert('Timing status is now $status')</script>" ;


}
else{
echo "<script type='text/javascript'>alert('Failed to set timing status')</script>" ;


}

}
else{

echo "<script type='text/javascript'>alert('No timing data found in the database')</script>" ;

}


}
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table cellpadding="3px" width="60%" border="0px">
<tr>
<td ></td>
<td>
<select name="status[]" class="optn">
<option value="on">On</option>
<option value="off">Off</option>

</select>
</td>

</tr>

<tr>
<td>
<input type="hidden" name="timer_status" value="dacracker_xelow"/>
</td>
<td>
<input type="image" src="image/set_st.png" style="width:100px;"/>
</td>

</tr>
<table>
</form>