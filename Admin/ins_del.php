<?php
include('page_auth.php');
?>
<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>


<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

<input type="hidden" name="id" value="<?php echo $id?>"/>
<input type="hidden" name="instruction_del" value="<?php echo sha1(rand(1 ,5633462));?>"/>
<input type="image" src="image/delet.png" style="width:40px;margin:10px"/>
</form>


<?php

}
else
{


}


?>

