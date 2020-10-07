<div style="margin:7pt">
<img style="padding:17px;width:17px;height:20px;float:right" onclick="window.print()" title="Click this icon to print your result" src="image/print.png"/>

<h2 style="margin-bottom:10pt;text-transform:uppercase;color:green;padding:10px;letter-spacing:2px"><font style="font-family:Bradley Hand ITC;">Result Slip for</font> <?php
echo $ctitle.". ".$cname;
?></h2>



<table width="100%" border="0px" cellpadding="5px" cellspacing="5px">
<tr>
<td align='left' valign="top" width='30%'>

<img id="preimg" src="imageselector1.php?id=<?php echo $_GET['user'];?>" style="width:160px;margin:4px;border-radius:50% 50%;-moz-border-radius:50% 50%;-webkit-border-radius:50% 50%;-o-border-radius:50% 50%;-ms-border-radius:50% 50%;box-shadow:3px 1px 3px black;-webkit-box-shadow:3px 1px 3px black;-moz-box-shadow:3px 1px 3px black;"/>


</td>
<td align='left' valign="top" width='70%'>
<p class="spc">
<b>Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> <?php
echo $ctitle.". ".$cname;
?></p>

<p class="spc"><b>Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<?php
echo $cemail;
?></p>

<p class="spc">
<b>Mobile :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<?php
echo $cmobile;
?></p>

<p class="spc">
<b>Username :&nbsp;&nbsp;&nbsp;&nbsp;</b>
<?php
echo $cuname;
?></p>
<p class="spc">
<b>Birth Date :&nbsp;&nbsp;&nbsp;&nbsp;</b>
<?php
echo $cdob;
?></p>

<p class="spc">
<b>Token Gen :&nbsp;&nbsp;&nbsp;&nbsp;</b>
<?php
echo $ctok;
?></p>

</td>

</tr>
</table>

<style type="text/css">
p.spc{padding:10px}
</style>


<div style="border-bottom:2px solid black;border-left:2px solid black;border-right:2px solid black">
<h3 style="text-align:left;border-top:2px solid black;background-color:lightgreen;margin-bottom:3pt;padding:5px;font-style:italic;text-transform:uppercase;letter-spacing:2px;font-family:Chiller;">Each Subject Score</h3>
<?php include('profile_score.php')?>

</div>

<div style="border-bottom:2px solid black;border-left:2px solid black;border-right:2px solid black">
<h3 style="text-align:left;border-top:2px solid black;background-color:lightgreen;margin-top:10pt;padding:5px;font-style:italic;text-transform:uppercase;letter-spacing:2px;font-family:Chiller;">Full Result Details</h3>

<table width="100%" border="0px" cellpadding="5px" cellspacing="1px">
<tr>
<td align='left' width='60%'><b>Total Questions</b></td>
<td align='left' width='40%'><?php echo $qu_num." ";?></td>

</tr>



<tr>
<td><b>Attempted</b></td>
<td><?php echo "". $all_count."";?></td>


</tr>


<tr>
<td><b>Failed</b></td>
<td><?php $fa = $qu_num- $num; echo $fa." ";?></td>

</tr>


<tr>
<td><b>Passed</b></td>
<td><?php echo $num;?></td>

</tr>

<tr>
<td><b>Total Score</b></td>
<td><?php echo $num;?></td>

</tr>

<tr>
<td><b>Percentage</b></td>
<td><?php echo "". $m_percent."%";?></td>


</tr>

<tr>
<td><b>Comment</b></td>
<td><?php echo $msg;?></td>

</tr>

<tr>
<td><b>Status</b></td>
<td><?php echo $status;?></td>

</tr>
</table>
</div>



</div>