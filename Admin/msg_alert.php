
<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>
<div id="msg_alert">
	<p align="right" ><img src="image/cancel.png" class="userss_msg" style="margin:2px;width:20px;"/></p>

<center><img src="image/alertm.png" style="width:50%;margin:10pt"/></center>
<script type="text/javascript" language="javascript" src="msg.js"></script>
<script type="text/javascript" language="javascript" src="mfetch.js"></script>
<script type="text/javascript" language="javascript">
tim();
</script>
<p id="res_msg" style="text-align:center;margin:10px;color:green;letter-spacing:2px;"></p>


<form onsubmit="return(msg_alert())">

<p><textarea id="content" class="ckeditor" rows="" cols="" style="resize:none"></textarea></p>

<input type="image" src="image/pmess.png" style="width:120px;margin-top:10px;"/>

</form>
<div id="search_msg">


</div>
</div>
<?php

}

?>
