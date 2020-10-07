<?php session_start();
if(!isset($_SESSION['CURRENT_IUO_DATA_NAME']) && !isset($_SESSION['CURRENT_IUO_DATA_USERNAME'])){
header("location:../essay_login.php");
exit();
}
?>
<html>
<head>
<title>Examination Script Manager - <?php echo $_SESSION['CURRENT_IUO_DATA_NAME']; ?></title>
<link rel="stylesheet" href="../style/essay.css"/>
</head>
<body>
<div class="header">
<center>
<img src="../img/banne.png" style="width:50%;padding:15px;;"/></center>
</div>
<div class="container">
<div class="first">
<div class="dir">
<p style="border-bottom:1px dashed black;letter-spacing:2px;margin-top:20px;font-size:10pt;padding:5pt;font-weight:bold;">USER PROFILE</p>

 <img src="../img/logout.png" onclick="parent.location='logout.php'" style="width:90px;padding-top:10pt;padding-bottom:20pt;" title="Please click here to Logout "/>

 <div class="form_update">
 <div class="">
 <form action="" enctype="form/multipart" method="POST">
 <input type="file" name="file"/>
 <input type="hidden" name="user" value="<?php echo $_SESSION['CURRENT_IUO_DATA_USERNAME'];?>"/>
 <br/>
 <input type="image" src="../img/upload_p.png" style="width:100px"/>
 </form>
 </div>
 
 </div>
 

 <p class="tyu">Welcome <b><?php echo $_SESSION['CURRENT_IUO_DATA_USERNAME']; ?></b> </p>
<table cellpadding="10px" width="100%" cellspacing="0px" border="0px">
<tr>
<td><b>Position</b></td>
<td><p style="font-size:9pt;text-transform:uppercase;">Lecturer</p></td>

</tr>
<tr>
<td><b>Name</b></td>
<td>
<p style="font-size:9pt;text-transform:uppercase;">
<?php echo $_SESSION['CURRENT_IUO_DATA_NAME']; ?></p>
</td>

</tr>
</table>



<p style="border-bottom:1px dashed black;letter-spacing:2px;margin-top:20px;font-size:10pt;padding:5pt;font-weight:bold;">DOWNLOAD RESULT SHEET</p>

<br/> 
<form method="POST" action="excel_convertor.php">
<input type="hidden" name="exporter_excel" value="<?php echo $_SESSION['CURRENT_IUO_DATA_USERNAME'];?>" />

<input type="image" src="image/down.png" class="imdd"/></form>

<p style="border-bottom:1px dashed black;letter-spacing:2px;margin-top:20px;font-size:10pt;padding:5pt;font-weight:bold;">RESULT MANAGEMENT</p>

<img src="../img/impact.jpg" style="width:50%;padding:10pt"/>
<?php
include("approve.php");
?>
</div>



</div>
<div class="second">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>
<div class="secondd">
<?php include("pager.php");?>
</div>
</div>
</div>
<div class="footer">

</div>
</body>
</html>