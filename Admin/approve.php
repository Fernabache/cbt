
<form style="float:left" method="POST" action="approv_process.php">
<input type="hidden" name="approv_id" value="<?php echo $id?>"/>
<input type="hidden" name="cat" value="<?php echo rawurlencode($_SERVER['REQUEST_URI']);?>"/>
<input type="hidden" name="que_appr_que" value="dacracker_approval_question"/>
<input type="hidden" name="current_p" value="<?php if(isset($_GET['pn']) && !empty($_GET['pn'])){ echo $_GET['pn'];}else{echo "1";}?>"/>
<input type="image" src="image/appr.png" style="height:30px;padding:0px"/>
</form>