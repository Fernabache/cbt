<form action="update_process.php" method="POST">
<div id="hid">
<p style="color:gray;letter-spacing:3px"><?php echo "Category &raquo; ". $cat;?></p>
<div><h2><?php echo "" . $quest ;?></h2></div>

<ul type="a">
<li class="q">&nbsp;<?php echo $first;?></li>
<li class="q">&nbsp;<?php echo $second;?></li>
<li class="q">&nbsp;<?php echo $third;?></li>
<li class="q">&nbsp;<?php echo $fourth;?></li>
<li class="q">&nbsp;<?php echo $fifth;?></li>

</ul>
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
<td>
1st Option
</td>
<td>
<textarea cols='50' style='resize:none' name='f' rows='5'><?php echo $first;?></textarea>
</td>
<td>
<?php echo "Option a = " .$first;?>
</td>
</tr>


<tr>
<td>2nd Option
</td>
<td>
<textarea cols='50' style='resize:none' name='s' rows='5'><?php echo $second;?></textarea>
</td>
<td>
<?php echo "Option b = " .$second;?>
</td>
</tr>
<tr>
<td>3rd Option
</td>
<td>
<textarea cols='50' style='resize:none' name='t' rows='5'><?php echo $third;?></textarea>
</td>
<td>
<?php echo "Option c = " .$third;?>
</td>
</tr>

<tr>
<td>4th Option
</td>
<td>
<textarea cols='50' style='resize:none' name='ft' rows='5'><?php echo $fourth;?></textarea>
</td>
<td>
<?php echo "Option d = " .$fourth;?>
</td>
</tr>
<tr>
<td>Correct Option
</td>
<td>

<select name="answer[]"  style="width:300px">
<option value="a">First Option</option>
<option value="b">Second Option</option>
<option value="c">Third Option</option>
<option value="d">Fourth Option</option>
<option value="e">None</option>
</select>
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
