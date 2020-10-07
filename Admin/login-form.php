<?php
session_start();
?>
<html>
<head>
<title>Administrator Login Page</title>
<link rel="stylesheet" href="style/style.css" media="all"/>
<link rel="shortcut icon" href="" type="image/x-icon"/>
<script type="text/javascript" src="custom.js" ></script>
<script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="onScreenKeyboard.css"/>

		<script src="jquery.onScreenKeyboard.js"></script>
		<script>
			$(function () {
				$('.osk-trigger').onScreenKeyboard({
					rewireReturn : 'submit',
					rewireTab : true
				});
			});
		</script>
<script type="text/javascript">
$(document).ready(function(){
$("#poll").mouseover(function(){
$("#poll").attr("src" ,"image/j1.png");
$("#poll").mouseout(function(){
$("#poll").attr("src" ,"image/j2.png");
})

});

	
$(".cancel").click(function(){
$("#powered").hide("slower");

});

$("#mar").mouseover(function(){
$(this).stop();
$("#mar").mouseout(function(){
$(this).start();

});
});
});


</script>
</head>
<body style="background-image:url(image/bvg.png);">

<center><img src="image/admin_login.png" style="width:50%;margin:1%"/></center>
<div align="center">

<?php
if(isset($_GET['msg']) && !empty($_GET['msg']))
{
?>

<p id="ptag" style="">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>
</p>

<?php
}
?>
<div id="form_style">
<img src="image/admin.png" class="imt"/>
<?php
if(isset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_id']) || isset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'])){

$msg="<p style='color:green'>Please you can't Login because a session is active</p>";
$ss = $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'];
echo $msg ."<br/>";
echo "user <b>".$ss."</b> is logged in already<br/>";
echo "<p style='text-align:center'><a href='logout.php' target='_blank'>Logout</a> | <a href='index.php' target='_blank'>Homepage</a>"."</p>";
}
else{
?>
<form method="POST" action="log_processor.php">
<table cellspacing="4px" cellpadding="4px">

<tr>

<td>
<input type="text" autocomplete="off" class="osk-trigger" required="required" data-osk-options="disableReturn" placeholder="Enter Username" style="" name="user"  id="inpt"/>
</td>

</tr>


<tr>
<td>
<input type="password" autocomplete="off" class="osk-trigger" data-osk-options="disableReturn" placeholder="Enter Password" required="required" name="pass"  id="inpt"/>
</td>

</tr>




<tr>
<td>
<select required="required" name="level[]" class="inpt">
<option value="">Select level</option>
<option value="Super">Super Administrator</option>
<option value="Admin">Administrator</option>

</select>
</td>

</tr>

<tr>

<td>
<input name="url" id="user" type="hidden" value="<?php if(isset($_GET['u']) && !empty($_GET['u'])){echo $_GET['u'];} else{echo "index.php";}?>" />
<input type="hidden" name="ans" value="validate"/>
<input type="hidden" name="auth" value="<?php $salt = 'wolexzo07dacracker';$token=sha1(rand() .$salt);echo $token;?>"/>
<input type="image" src="image/j2.png" id="poll" style="padding:0px;width:140px;"/>

</td>

</tr>

</table>
</form>

<?php
}

?></div>
</div>
<div id="powered">
<img src="image/cancel.png" id="cancel" class="cancel"/>
<center><P id="fon"><marquee id="mar" behaviour="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrolldelay="3" scrollamount="2" width="80%"><?php
$tim = time();
$dat = date("Y" , $tim);
echo "Copyright&nbsp;&copy; ".$dat . ". ";
?>
All Right Reserved.Designed and Programmed by Xelow Global Concept &trade;</marquee></P></center>
</div>

</body>
</html>