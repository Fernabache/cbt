<?php

include("auth.php");


?>
<html>
<head>
<title>
CBT Cpanel-Homepage
</title>
<script type="text/javascript" language="javascript">
CKEDITOR.replace( 'post' );
CKEDITOR.replace( 'first' );
CKEDITOR.replace( 'second' );
CKEDITOR.replace( 'third' );

CKEDITOR.replace( 'fourth' );
CKEDITOR.replace( 'answer' );
CKEDITOR.replace( 'ins' );
</script>
<script src="jquery-1.7.2.min.js"></script>

<script src="jquery.nicescroll.js" type="text/javascript"></script>
<script src="custom.js" type="text/javascript"></script>
<script src="js/shortcut.js" type="text/javascript"></script>
<script src="js/custom.js" type="text/javascript"></script>


<script type="text/javascript" language="javascript" src="ckeditor.js"></script>
<link rel="stylesheet" href="style/style.css" media="all"/>

</head>
<body>

<?php
include("header.php");

?>

<div id="container">
<div id="fir">
<?php
include('menu.php');

?>

</div>
<div id="sec">
<?php
if(isset($_GET["msg"]) && !empty($_GET["msg"]))
{
echo $_GET["msg"] ;
}
?>
<img src="image/hidden.png" style="display:none;height:40px;" id="hidden"/>
<div id="welco">
<div style="font-size:14pt;padding:7px">
<?php
include("welcome_profile.php");
?>
</div>

</div>
<div id="img_slide">
<img src="image/cb.gif" alt="slider" style="width:90%;padding:20pt;-moz-border-radius:20pt;border-radius:20pt;"/>
</div>

<div id="lnews">
<?php
include("news.php");

?>
</div>



</div>




<div id="permission" class="permission">
<div style="margin-bottom:50pt">
<div align="">
<img src="image/cancel.png" id="cancel" style="height:15px;width:15px;" /></div>
<div align="center">
<img src="image/grant.png" id="ec" /></div>
<?php
include('question_approval.php');
include('grant_result_publishing.php');
include('truncate.php');
include('truncate_attendance.php');

?></div>
</div>


<div id="revoke" class="revoke">
<div align="">
<img src="image/cancel.png" id="canc" style="height:15px;width:15px;" /></div>
<?php
include('all_user_access.php');
?>


</div>



<div id="revoke_admin" class="revoke_admin">
<div align="">
<img src="image/cancel.png" id="cancv" style="height:15px;width:15px;" /></div>
<?php
include('all_admin_access.php');
?>


</div>


<?php
include('n_cat.php');
?>






<?php
include("profile_access.php");
include("script_search.php");
include("subject_approval_form.php");

include("timer.php");
include("msg_alert.php");


?>

</div>

<div id="footer">
<?php
include("footer.php");
?>
</div>

</body>
</html>
