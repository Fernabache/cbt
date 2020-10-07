
<script type="text/javascript" language="javascript" src="helpjs.js"></script>
<div id="help_posting">
<p id="helpp_msg" style="text-align:center;margin:10px;color:green;letter-spacing:2px;font-size:10pt;text-transform:uppercase;"></p>

<center>
<form onsubmit="return(hellp_alert())">
<table cellpadding="10px" cellspacing="10px" border="0px">
<tr>
<td>CATEGORIES :</td>
<td>
<select name="cat[]" id="cat" style="width:500px;height:50px;padding:5px;">
<option value="user_interface" style="height:50px;padding:5px;">Users' Interface</option>
<option value="admin_interface" style="height:50px;padding:5px;">Administrators' Interface</option>
</select>
</td>

</tr>


<tr>
<td>SHORTCUT KEYS :</td>
<td>
<input type="text" name="key" id="key" style="width:500px;height:50px;padding:10px;" placeholder="Enter your shortcut key"/>
</td>

</tr>



<tr>
<td valign="top">KEY FUNCTIONS :</td>
<td>
<textarea name="key_f" id="keyf" cols="60" rows="11" style="resize:none;overflow:auto"></textarea>
</td>

</tr>


<tr>
<td >
<input type="hidden" name="help_token" id="help_token" value="<?php echo sha1(uniqid()); ?>"/>
</td>
<td><input type="image" src="image/mini_btt.png" style="width:120px;"/>
</td>

</tr>


</table>

</form>
</center>
</div>