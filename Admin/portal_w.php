<?php
include('page_auth.php');
?>
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">SET PORTAL ACCESS STATUS</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to CLOSE OR OPEN THE EXAMINATION PORTAL.If the EXAMINATION PORTAL is set to CLOSED ,it means no user can start the examination even if the user is still currently logged on .
</p>
</div>
<?php
include('portal.php');
?>
<p style="padding:5px;margin-left:3px;letter-spacing:3px;color:green"><?php
include('p_status.php');
?></p>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
<table cellpadding="10px" cellspacing="5px" border="0px">
<tr>
<td></td>
<td>
<select name="portal[]" class="optn">
<option value="opened">Open Examination Portal</option>
<option value="closed">Close Examination Portal</option>

</select>
</td>
</tr>

<tr>
<td>
<input type="hidden" name="hidden_treasure" value="<?php $ra = "wolexzo07dacrackeristhebossofcodehouse";$raa = sha1(uniqid($ra));echo $raa;?>"/>
</td>
<td>
<input type="image" src="image/qu.png" style="width:80pt;"/>

</td>
</tr>
</table>
</form>
<?php
include("regportal_ctrl.php");
?>