<?php
include('page_auth.php');
?>
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">SET USERS' REGISTRATION PORTAL ACCESS STATUS</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to CLOSE OR OPEN THE REGISTRATION PORTAL.If the REGISTRATION PORTAL is set to CLOSED ,it means no user can register for an examination not until is set to OPENED .
</p>
</div>
<?php
include('rp.php');
?>
<p style="padding:5px;margin-left:3px;letter-spacing:3px;color:green;"><?php
include('rp_status.php');
?></p>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
<table cellpadding="10px" cellspacing="5px" border="0px">
<tr>
<td></td>
<td>
<select name="portal[]" class="optn">
<option value="opened">Open Registration Portal</option>
<option value="closed">Close Registration Portal</option>

</select>
</td>
</tr>

<tr>
<td>
<input type="hidden" name="reg_portal" value="<?php $ra = "wolexzo07dacrackeristhebossofcodehouse";$raa = sha1(uniqid($ra));echo $raa;?>"/>
</td>
<td>
<input type="image" src="image/qu.png" style="width:80pt;height:25pt;"/>
</td>
</tr>
</table>
</form>