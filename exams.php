<?php
include("auth.php");
?>
<html>
<head>
<?php
include("head_b.php");
?>

<title>IUO-CBT SYSTEM- WELCOME TO THE EXAMINATION PAGE</title>
</head>
<body>
<script type="text/javascript" src="js/controls.js"></script>

<div id="">
<div class="header">
<center>
<img src="img/banne.png" class="bnn"/>
<img src="img/un.png" class="bnnr"/>
</center>
</div>
<img id="preimg" src="<?php echo "studentphoto/S".$_SESSION['SESS_D_MAT_NO_EXAM'].".jpg";?>" class="proimger"/>
<?php require("btn_ctlr.php");?>
<div id="erf" >
	Welcome <b> <?php if($_SESSION['SESS_D_USER_EXAM'] != ""){ echo $_SESSION['SESS_D_USER_EXAM']. "&nbsp;&nbsp;(".$_SESSION['SESS_D_NAME_EXAM'].")";}else{echo $_SESSION['SESS_D_MAT_NO_EXAM'];} ?> </b> 
&nbsp;| &nbsp;<img src='image/logout.png' onmouseover="tooltip.pop(this, '#demo3_tip')" class='logout' style='width:20px' onclick="return(shu())"/>
</p>


<fieldset class="fdii">
<legend><img src="img/ep.png" class="selL1"/></legend>
<table width="100%" cellpadding="10px" cellspacing="10px" border="0px">
<tr>
<td width="86%" valign="top">

<?php 
require_once("config.php");
$select = "SELECT * FROM mode WHERE id = '1'";
$sleq = mysql_query($select);
if(!$sleq){
echo "Failed to a examination mode!";
}else{

$numbe = mysql_num_rows($sleq);

$rs = mysql_fetch_array($sleq);
$stat = $rs["status"];
if($stat == "essay_mode"){
include("pagination_e.php");
}
else{
include("pagination.php");

}


}

?>
</td>
<td width="" valign="top">
     	<script src="shutdown.js" type="text/javascript"></script>
	<script src="logit.js" type="text/javascript"></script>
	<script type="text/javascript" language="javascript" src="adax.js"></script>
<div class="timeclass" id="timeclasse"></div>
<div id="log"></div>
<div id="logi"></div>

<img src="img/chg.png" onclick="parent.location='changer.php?token=<?php echo sha1(rand(6000 , 1000000));?>'" style="width:120px"/>

<img src="img/e2850cce504f13b86304e7126a9b006e16734a98.png" style="width:120px;display:none;"/>

</td>
</tr>
</table>

</fieldset>
</div>
<div style="display:none;">
            <div id="demo2_tip">
            
            <h3>ATTENTION!!</h3>
            Please click this button to submit and check your result.
            <b>Note that you can only click this button once</b>
            
             </div>
                         <div id="demo3_tip">
            
            <h3>ATTENTION!!</h3>
            Please click this button to logout from this examination page.
            <b>Note that you cannot login again after you click this button.</b>
            
             </div>
            <div id="demo4_tip">
            
            <h3>ATTENTION!!</h3>
            Please click this button to submit your answer for this subjective question.
            <b>Note that failure to click this button will make the answer you entered into the TEXT FIELD BOX not to be submitted.</b>
            
             </div>
             </div>
<div id="footer">

</div>
</div>
</body>

</html>
