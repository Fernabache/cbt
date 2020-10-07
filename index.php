<?php
session_start();
include("auth.php");
$tok = sha1(uniqid(rand(278,29990033849402278)));
$agent = $_SERVER["HTTP_USER_AGENT"];
$ip = $_SERVER["REMOTE_ADDR"];
$user = $_SESSION['SESS_D_USER_EXAM'];
$sess = "true";
$cur_dat = date();
if(isset($_SESSION['EXAM_RESULT_STOPPED'])){
				unset($_SESSION['EXAM_RESULT_STOPPED']);
				header("location:selection_page.php?active_session=true&generated_token=$tok&user_agent=$agent&current_user=$user&current_ipAddr=$ip");

				}
				else{
				header("location:selection_page.php?active_session=true&generated_token=$tok&user_agent=$agent&current_user=$user&current_ipAddr=$ip");

				}

?>