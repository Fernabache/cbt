
<div id="panel">



<?php
include('delete_q.php');
?>

<img src="image/upd.png" class="bt" style="width:100px;height:30px"/><img src="image/can.png" class="can_bt" style="display:none;height:30px"/>

<?php
require_once("config.php");
$cmd = "SELECT * FROM questions WHERE id='$id' AND approval_status='pending'";
$exe = mysql_query($cmd);
$nu = mysql_num_rows($exe);
if($nu != 0){
include('approve.php');
}
else{
include('revoke_approval.php');
}
?>

<?php
if($qtype == 'objective'){
include("obj.php");
}
elseif($qtype == 'subjective'){
include("subj.php");
}
else{
echo "No paper type!";
}
?>

</div>