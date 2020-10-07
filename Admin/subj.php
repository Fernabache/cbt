<form action="update_process_subj.php" method="POST">
<div id="hid">
<p style="color:gray;letter-spacing:3px"><?php echo "Category &raquo; ". $cat;?></p>
<div><h2><?php echo "" . $quest ;?></h2></div>

<div style="margin-bottom:10%;"></div>
</div>
<div class="show_update" style="display:none">
<table>
<tr>
<td>
Question
</td>

<td>
<textarea cols='50' style='resize:none' name='ques' rows='5'><?php echo $quest;?></textarea>
</td>
<td>
<?php echo $quest;?>
</td>
</tr>

<tr>
<td>Answer
</td>
<td>

<textarea cols='50' style='resize:none' name='answer' rows='5'><?php echo $ans;?></textarea>

</td>
<td>
<?php echo "Database stored option : <b>" .$ans ."</b>"; ?>
</td>
</tr>
<tr>
<td>
<input type="hidden" name="pn" value="<?php if(isset($_GET['pn']) && !empty($_GET['pn'])){ echo $_GET['pn']; }else{ echo "1";};?>"/>
<input type="hidden" name="id" value="<?php echo $id ;?>"/>
<input type="hidden" name="up_data" value="<?php echo "data_update";?>"/>
</td>
<td>
<input type="image" src="image/up.png" style="width:80px;height:40px;"/>
</td>
</tr>
</table>

</div>
</form>
