

<tr>
<td><?php echo $id ;?></td>
<td><?php echo $fp ;?></td>
<td><?php echo $fn ;?></td>
<td><?php echo $fs."kb" ;?></td>
<td><?php echo $ft ;?></td>
<td><img src="<?php echo $fp ;?>" style="width:200px;"/></td>
<td>
<form action="delete.php" method="POST">
<input type="hidden" name="secret_key" value="<?php echo $tok;?>"/>
<input type="hidden" name="file_path" value="<?php echo $fp;?>"/>
<input type="hidden" name="file_name" value="<?php echo $fn;?>"/>
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<input type="image" src="image/del.png" style="width:80px"/>
</form>
</td>
</tr>

