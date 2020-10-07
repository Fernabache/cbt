<form style="position:relative;float:left" method="POST" action="delete_process.php">
<input type="hidden" name="del_id" value="<?php echo $id?>"/>
<input type="hidden" name="cat" value="<?php echo rawurlencode($_SERVER['REQUEST_URI']);?>"/>
<input type="hidden" name="de_appr_que" value="dacracker"/>
<input type="image" src="image/del.png" style="height:30px;"/>
</form>