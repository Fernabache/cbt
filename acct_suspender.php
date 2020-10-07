<?php
require_once('config.php');
$user_acct = $_SESSION['SESS_D_USER_EXAM'];
$email_acct = $_SESSION['SESS_D_EMAIL_EXAM'];
$db_acct = "SELECT * FROM register WHERE username='$user_acct' AND email='$email_acct'";
$qu_acct = mysql_query($db_acct);
$num_acct = mysql_num_rows($qu_acct);
$fet_acct = mysql_fetch_array($qu_acct);

$p_acct = $fet_acct['access'];
if($p_acct == "revoked"){
$msg="<b>Access Denied! because your result is published</b>";
echo $msg;
exit;
}
?>