<?php
include('page_auth.php');
?>
<div id="main_profile" align="center">


<div align="left">
<img src="image/cancel.png" id="pro_c" style="height:15px;width:15px;" /></div>
<center><img src="image/p.png" style="width:400px;padding:10pt"/></center>

<div style="float:left;width:20%">
<img style="width:200px;border:1px solid green;border-radius:50% 50% 50% 50%;-moz-border-radius:10px;-webkit-border-radius:10px;-o-border-radius:10px;-ms-border-radius:10px;box-shadow:2px 2px 2px black;-moz-box-shadow:2px 2px 2px black;-webkit-box-shadow:2px 2px 2px black;-ms-box-shadow:2px 2px 2px black;-o-box-shadow:2px 2px 2px black" src="imageselector.php?id=<?php echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_id'];?>"/>

</div>

<div style="float:left;width:80%">

<div align="center" style="border:2px solid green;padding:5px;width:600px;margin-bottom:40pt">


<table width="100%" border="0px" cellspacing="2px" cellpadding="10px">


<tr>
<td>
<b>
Title</b>
</td>
<td>
<?php
echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_title'];

?>
</td>
</tr>

<tr>
<td>

<b>
Name</b>
</td>
<td>
<?php
echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_fullname'];

?>
</td>
</tr>

<tr>
<td>

<b>
Username</b>
</td>
<td>
<?php
echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'];

?>
</td>
</tr>

<tr>
<td>

<b>
Email</b>
</td>
<td>
<?php
echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_email'];

?>
</td>
</tr>

<tr>
<td>
<b>
Level</b>
</td>
<td>
<?php
echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'];

?>
</td>
</tr>

<tr>
<td>
<b>
Gender</b>
</td>
<td>
<?php
echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_gender'];

?>
</td>
</tr>


<tr>
<td>
<b>
You have logged in</b>
</td>
<td>
<?php
include('logon_tracker.php');

?>
</td>
</tr>


<tr>
<td>
<b>
Registered ip</b>
</td>
<td>
<?php
echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_ip_address'];

?>
</td>
</tr>

<tr>
<td>
<b>
Registered os</b>
</td>
<td>
<?php
echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_os'];

?>
</td>
</tr>





<tr>
<td>
<b>
Generated Token</b>
</td>
<td>
<?php
echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_token'];

?>
</td>
</tr>





</table>
</div>


</div>

</div>