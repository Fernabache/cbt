<?php
include("page_auth.php");
?>
<tr >

<td align="middle" bgcolor="whitesmoke"><a href="question_given.php?id=<?php echo $attempt;?>&token=<?php echo $tok;?>" target="_blank"><?php echo "View question ". "";?></td>
<td align="middle" bgcolor="lightgray"><b><?php
if(strlen($ans) > 2){
}else{
 echo $ans ;
}
?></b>

<?php
if(strlen($ans) > 2){
}else{
if($ans != $c_ans){

?>
&nbsp; &nbsp;<a href="upgrade.php?correct_answer=<?php echo $c_ans;?>&user=<?php echo $user;?>&attempt=<?php echo $attempt;?>&token=<?php echo $tok;?>"><img src="image/upgra.png" style="width:80px"/></a>

<?php
}
}

?>

</td>
<td align="middle" bgcolor="aqua"><b>

<?php 
if(strlen($c_ans) > 2){
}else{
echo $c_ans ;

}

?>

</b></td>
<td align="middle" bgcolor="lightgreen"><?php echo $comment ;?></td>
<td align="middle" bgcolor="white"><b><?php echo $score;?></b></td>

</tr>