<div style="margin:20pt;padding:10pt" align="left">
<center><img src="image/slp.png" style="margin-bottom:2%;width:50%"/></center>
<div style="font-weight:bold;font-size:15pt"><img src="image/bu.png" style="width:15px;height:15px" alt="bullet"/> <?php echo $q;?></div>
<?php
if($pap=="subjective"){
echo "<div style='margin-top:10%'></div>";
}
else{
?>

<div style="margin:4pt;padding:5pt">a.<?php echo " ". $f;?></div>
<div style="margin:4pt;padding:5pt">b.<?php echo " ".$s;?></div>
<div style="margin:4pt;padding:5pt">c.<?php echo " ".$t;?></div>
<div style="margin:4pt;padding:5pt">d.<?php echo " ".$ft;?></div>
<div style="margin:4pt;padding:5pt">e.<?php echo " none";?></div>
<?php
}
?>
<div style="margin:4pt;padding:5pt;font-weight:bold">Correct Option for this question = <?php echo " ".$ans;?></div>




</div>