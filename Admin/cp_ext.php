<?php
include("page_auth.php");
?>
<div id="cp_new">

<table cellspacing="3px" cellpadding="3px" border="0px">
<tr>
<td valign="top"><img style="width:160px;height:150px;border-radius:50% 50%;-moz-border-radius:50% 50%;-webkit-border-radius:50% 50%;-o-border-radius:50% 50%;-ms-border-radius:50% 50%;" src="cp_news_imageselector.php?id=<?php echo $id;?>"/></td>
<td valign="top">
<h3 style="text-transform:uppercase"><a href="full_news_display.php?id=<?php echo $id ;?>&token=<?php echo $token ;?>" target="_blank" class="tlink"><?php echo $title ;?></a></h3>
<div style="text-transform:lowercase"><?php echo $short ;?></div>

<p align="right">
<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>


<a href="delete_cp.php?id=<?php echo $id ;?>&tokler=<?php echo $token ;?>" class="cp" ><img src="image/delet.png" style="width:30px" title="click this button to delete selected article"/></a>



<?php

}
else
{


}


?>


&nbsp;&nbsp;<a target="_blank" href="full_news_display.php?id=<?php echo $id ;?>&token=<?php echo $token ;?>" class="cp"><img src="image/read_more.png" style="width:35px" title="click this button to read more"/></a></p>
</td>

</tr>

</table>
</div>

<style type="text/css">
.tlink , .cp{
color:green;text-decoration:none;

}

.tlink:hover , .cp:hover{
color:white;
text-decoration:underline;
font-weight:bold;
font-size:15pt;
}

.cp:hover{
color:orange;
text-decoration:underline;
font-size:12pt;

}

#cp_new {
border-radius:30px;
-webkit-border-radius:30px;
-o-border-radius:30px;
-ms-border-radius:30px;
-moz-border-radius:30px;
background-image:url(image/nbh.png);
padding:10px;
margin:10pt;
box-shadow:2px 2px 0px 0px;
-moz-box-shadow:2px 2px 0px 0px;
-webkit-box-shadow:2px 2px 0px 0px;
-o-box-shadow:2px 2px 0px 0px;
-ms-box-shadow:2px 2px 0px 0px;

}
#cp_new:hover {
border-radius:30px;
-webkit-border-radius:30px;
-o-border-radius:30px;
-ms-border-radius:30px;
-moz-border-radius:30px;
background-image:url(image/nb.png);
padding:10px;
margin:10pt;
font-weight:bold;
color:gray;
letter-spacing:0px;
box-shadow:2px 2px 0px 0px;
-moz-box-shadow:2px 2px 0px 0px;
-webkit-box-shadow:2px 2px 0px 0px;
-o-box-shadow:2px 2px 0px 0px;
-ms-box-shadow:2px 2px 0px 0px;

}
</style>