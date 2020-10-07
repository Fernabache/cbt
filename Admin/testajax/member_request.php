
<table cellpadding="3px" border="0" bordercolor="red" cellspacing="5px" width="100%">
<tr>
<td width="20%" valign="top" >

<img id="preimg" src="imageselector.php?id=<?php echo $member;?>&securitykey=<?php echo $skey;?>" style="margin-top:6pt;height:190px;width:155px;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;-o-border-radius:10px;box-shadow:2px 2px 2px 2px black;-moz-box-shadow:2px 2px 2px 2px black;-webkit-box-shadow:2px 2px 2px 2px black;-ms-box-shadow:2px 2px 2px 2px black;-o-box-shadow:2px 2px 2px 2px black"/>
</td>

<td width="80%" valign="top" style="color:;font-weight:bold">
<fieldset><legend style="color:purple">Personal Information </legend>

<p><font style="color:navy">Name: </font>&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:purple;"><i><?php echo $first . " ".$middle . " ".$last ;?></i></font></p>
<p><font style="color:navy">Country: </font>&nbsp;<font style="color:purple;"><i><?php echo $country ;?></i></font></p>
<p><font style="color:navy">Gender: </font>&nbsp;&nbsp;<font style="color:purple;"><i><?php echo $gen ;?></i></font></p>
<p><font style="color:navy">Status:</font>&nbsp;&nbsp;<font style="color:orange;font-weight:bold"><i><?php echo $status ;?></i></font></p>
<p>

<?php
if(isset($_SESSION['SESS_D_USER_NAME']) || isset($_SESSION['SESS_D_SECURITY_KEY']) || isset($_SESSION['SESS_D_EMAIL'])){

include('fd_list.php');
}


else{




}
?>
</p>






</fieldset>
</td>


</tr>

</table>

