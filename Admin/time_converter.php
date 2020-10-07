<?php
include("page_auth.php");

?>
<h3 class="hhh">TIME CONVERTER CALCULATOR</h3>

<?php include("convert.php");?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
<table cellpadding="5px" width="60%" border="0px" cellspacing="1px">
<tr>
<td ></td>
<td >
<select name="from_time[]" class="optn" required="">
<option value="">Convert From</option>
<option value='hours'>Hours</option>
<option value='minutes'>Minutes</option>
<option value='seconds'>Seconds</option>
<option value='milliseconds'>Milliseconds</option>
</select>

</td>

</tr>

<tr>
<td></td>
<td>
<select name="to_time[]" class="optn" required="">
<option value="">Convert To</option>
<option value='hours'>Hours</option>
<option value='minutes'>Minutes</option>
<option value='seconds'>Seconds</option>
<option value='milliseconds'>Milliseconds</option>
</select>
</td>

</tr>

<tr>
<td></td>
<td><input type="text" placeholder="compute value" required="" name="comput" class="textn"/>
</td>

</tr>

<tr>
<td><input type="hidden" value="calculator" name="calc"/></td>
<td><input type="image" src="image/convert.png" style="width:100px;"/></td>

</tr>
</table>
</form>


