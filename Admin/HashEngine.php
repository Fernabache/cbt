<?php
if(isset($_POST['sub'])){
$salt = "wolexzo07dacrackerthewhitehackerhacker";
$pass = md5(sha1($_POST['pass'].$salt));
$ran = md5(sha1(uniqid($_POST['pass'])));
echo "Salted Hash of <b>".$_POST['pass']."</b> = " . $pass;
echo "<br/>random Hash <b>".$_POST['pass']."</b> = " . $ran;
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="text" name="pass" style="width:300px;padding:5px" placeholder="Encrypt password"/>
<input type="submit" value="encrypt" name="sub"/>
</form>