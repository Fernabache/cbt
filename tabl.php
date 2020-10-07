
<table width="100%" border="0px" cellpadding="5px" cellspacing="1px">
<tr>
<td align='left' valign="top" width='30%'>
<img id="preimg" src="<?php echo "studentphoto/S".$_SESSION['SESS_D_MAT_NO_EXAM'].".jpg";?>" style="width:120px;margin:4px;border-radius:50% 50%;-moz-border-radius:50% 50%;-webkit-border-radius:50% 50%;-o-border-radius:50% 50%;-ms-border-radius:50% 50%;box-shadow:3px 1px 3px black;-webkit-box-shadow:3px 1px 3px black;-moz-box-shadow:3px 1px 3px black;"/>

</td>
<td align='left' valign="top" width='50%'>
<table cellpadding="5px" border="0px" cellspacing="5px" style="letter-spacing:3px">
<tr>
<td><b>Name</b> </td>
<td><?php
echo $_SESSION['SESS_D_NAME_EXAM'];
?></td>

</tr>


<tr>
<td><b>Mat. No</b></td>
<td><?php
echo $_SESSION['SESS_D_USER_EXAM'];
?></td>

</tr>

<tr>
<td><b>Gender</b></td>
<td><?php
echo $_SESSION['SESS_D_GENDER_EXAM'];
?></td>

</tr>

<tr>
<td><b>Level</b></td>
<td><?php
echo $_SESSION['SESS_D_LEVEL_EXAM'];
?></td>

</tr>


<tr>
<td><b>Dept</b></td>
<td><?php
echo $_SESSION['SESS_D_DEPT_EXAM'];
?></td>

</tr>


</table>
</td>


<td align='left' valign="top" width='20%'>

<center> <img src="img/logo.jpg" style="width:120px;"/></center>
</td>

</tr>
</table>
