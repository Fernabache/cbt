<form style="position:relative;float:left" method="POST" action="revoke_process.php">
<input type="hidden" name="rev_id" value="<?php echo $id?>"/>
<input type="hidden" name="cat" value="<?php echo rawurlencode($_SERVER['REQUEST_URI']);?>"/>
<input type="hidden" name="re_appr_que" value="dacracker"/>
<input type="hidden" name="current_p" value="<?php if(isset($_GET['pn']) && !empty($_GET['pn'])){ echo $_GET['pn'];}else{echo "1";}?>"/>
<input type="image" src="image/rev.png" style="height:30px;"/>
</form>