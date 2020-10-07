<div id="quest">
<form method="POST" action='<?php echo $_SERVER['PHP_SELF'];?>'>

<p style="letter-spacing:3px;font-family;font-size:13pt;">
<?php
if(isset($_GET['pn']) && !empty($_GET['pn']) && is_numeric($_GET['pn'])){

echo $_GET['pn'] .". " . $quest ;
}
else{
echo "1. " . $quest ;

}

?></p>

<input type="hidden" name="id" value="<?php echo $id;?>"/>

<input type="hidden" name="qtoken" value="<?php echo $token;?>"/>
<input type="hidden" name="token" value="<?php echo sha1(md5(rand(123 ,902973829).time().uniqid()));?>"/>
<br/>
<input type="image" name="submit" value="JesusIsLord" src="/questions/image/submit.png" style="width:80px;margin-left:80%;margin-top:2%;" />

</form>
<?php
include("m_process.php");
?>
</div>