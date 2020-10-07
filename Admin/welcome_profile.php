<?php
include("page_auth.php");
?>
<table cellspacing="5pt" border="0px">
<tr>
<td valign="top">
<img src="image/cancel.png" id='ccel' style="width:15px;height:15px"/>
</td>
<td valign="top">
<?php
echo "<img class='p_image' style='width:50px;height:50px;border:1px solid green;border-radius:50% 50% 50% 50%;-moz-border-radius:10px;-webkit-border-radius:10px;-o-border-radius:10px;-ms-border-radius:10px;' src='imageselector.php?id=$_SESSION[CodeHouseGroup_Session_Examination_Assessment_id]'/>";
?>
</td>
<td >
<?php
echo "Welcome<b> ".$_SESSION['CodeHouseGroup_Session_Examination_Assessment_fullname']. "( ".$_SESSION['CodeHouseGroup_Session_Examination_Assessment_username']." )</b>";
?>

</td>
<td valign="top">
<?php
echo "<a href='logout.php'><img src='image/power.png' title='Click to logout' style='width:50px;height:50px;'/></a>  ";
?>
</td>
</tr>
</table>
