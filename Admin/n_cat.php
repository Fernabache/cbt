<?php include('page_auth.php');?>
<div id="n_cat">
<div align="">
<img src="image/cancel.png" id="n_canc" style="height:15px;width:15px;" /></div>
<center><img src="image/suby.png" id="ec"/></center>
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">ADD EXAMINATION SUBJECT,SESSION , SEMESTER AND EXAMINATION TYPE FOR DATA BINDING </h3>

<form action="pro.php"  method="POST">
<table cellpadding="5px" cellspacing="5px">
<tr>
<td>Categories</td>
<td>
<select name="title[]" class="optn">
<option value="Examination subject">Examination subjects </option>
<option value="Examination Type">Examination Type</option>
<option value="session">Examination session </option>
<option value="semester">Examination semester</option>
</select></td>

</tr>


<tr>
<td>Add Entry</td>
<td>
<input type="text" required="" autocomplete="off" class="textn" name="cate" placeholder="Add entry"/>
</td>

</tr>

<tr>
<td><input type="hidden" value="dacracker" name="subb" /></td>
</td>
<td>
<input type="image" style="width:80px" src="image/acat.png" /></td>

</tr>

</table>

</form>

<h3 style="padding-bottom:10px;border-bottom:1px dashed black">DELETE EXAMINATION SUBJECT,SESSION , SEMESTER AND EXAMINATION TYPE FOR DATA BINDING</h3>

<form action="del.php"  method="POST">
<table cellpadding="5px" cellspacing="5px">
<tr>
<td>Categories</td>
<td>
<select name="title[]" id="slet" class="optn">
<option value="Examination subject">Examination subjects </option>
<option value="Examination Type">Examination Type</option>
<option value="session">Examination session </option>
<option value="semester">Examination semester</option>
</select></td>

</tr>


<tr>
<td>Add Entry</td>
<td>
<input type="text" required="" autocomplete="off"  class="textn" name="cate" placeholder="Add entry"/>
</td>

</tr>

<tr>
<td><input type="hidden" value="dacracker" name="subb" /></td>
</td>
<td>
<input type="image" style="width:80px" src="image/dcat.png" /></td>

</tr>

</table>

</form>


</div>