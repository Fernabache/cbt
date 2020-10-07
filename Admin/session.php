<?php
session_start();
		echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_id']."<BR/>" ;
		echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'] ."<BR/>";
		echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_fullname']."<BR/>";
		echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_email']."<BR/>";
		echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_level']."<BR/>";
		echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_gender']."<BR/>";
		echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_title']."<BR/>";
		echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_ip_address']."<BR/>" ;
		echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_os']."<BR/>" ;
		echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_token']."<BR/>";


?>
<img id="preimg" src="imageselector.php?id=<?php echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_id'];?>"/>