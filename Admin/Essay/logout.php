<?php
session_start();
if(isset($_SESSION['CURRENT_IUO_DATA_NAME']) && isset($_SESSION['CURRENT_IUO_DATA_USERNAME'])){
unset($_SESSION['CURRENT_IUO_DATA_NAME']);
unset($_SESSION['CURRENT_IUO_DATA_USERNAME']);
unset($_SESSION['CURRENT_IUO_DATA_ACCESS']);
header("location:../essay_login.php");
}
else{
echo "<p style='color:green;letter-spacing:2px;'>no active session!</p>";
}
?>