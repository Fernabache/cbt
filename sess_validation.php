<?php
session_start();
if(isset($_SESSION['SESS_D_USER_EXAM']) && !empty($_SESSION['SESS_D_USER_EXAM']) && isset($_SESSION['SESS_D_MEMBER_ID_EXAM']) && !empty($_SESSION['SESS_D_MEMBER_ID_EXAM']))
{
header("location:index.php");
exit;
}
?>