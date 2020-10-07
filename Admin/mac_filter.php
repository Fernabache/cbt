<div id="mac_filter">
<?php
require_once("config.php");
if(isset($_POST["mac_token"]) && !empty($_POST["mac_token"]) && isset($_POST["mac"]) && !empty($_POST["mac"])){

function ip_clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}

	$pattern = "/^([0-9a-fA-F]{2}:){5}[0-9a-fA-F]{2}$/";
if(!preg_match($pattern , $_POST["mac"])){
$msg = "Please enter a valid mac address";
echo $msg;
}
else{

	
	$ip = ip_clean($_POST["mac"]);
	$token = ip_clean($_POST["mac_token"]);

$tab = "CREATE TABLE IF NOT EXISTS mac_filter(
id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
mac_address TEXT NOT NULL ,
status TEXT NOT NULL ,
token TEXT NOT NULL,
time_stamp TEXT NOT NULL
)";

$qip = mysql_query($tab);	

if(!$qip){
	$msg="<script type='text/javascript'>alert('Table Creation Failed!')</script>";
				echo $msg;
				exit();
}
$select = "SELECT * FROM mac_filter WHERE mac_address='$ip'";
$ipq = mysql_query($select);
if(!$ipq){
	$msg="<script type='text/javascript'>alert('Failed to check if the mac address already exist in the database!!')</script>";
				echo $msg;

}
else{
$num = mysql_num_rows($ipq);
if($num == 1){
	$msg="<script type='text/javascript'>alert('mac address already exist in the database!!')</script>";
				echo $msg;
				
}
else{
$ins = "INSERT INTO mac_filter(mac_address ,status, token , time_stamp) VALUES('$ip' ,'deny' ,'$token' ,now())";
$qu = mysql_query($ins);

if($qu){
	$msg="<script type='text/javascript'>alert('mac address denied successfully')</script>";
	echo $msg;
			
}
else{
	$msg="<script type='text/javascript'>alert('Failed to blacklist mac address!! ')</script>";
	echo $msg;

}
}

}

}
}

?>
<h2 style="letter-spacing:2px;">MAC-ADDRESS FILTERING SYSTEM</h2>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
<table cellpadding="3px" cellspacing="3px">
<tr>
<td>Mac Address: </td>
<td><input type="text" name="mac" placeholder="xx:xx:xx:xx:xx:xx" required="required" style="padding:10px;width:300px" /></td>

</tr>

<tr>
<td> <input type="hidden" name="mac_token" value="<?php echo sha1(uniqid(rand(1 , 12637)))?>"/></td>
<td><input type="image" src="image/qu.png" style="width:100px"/></td>

</tr>
</table>

</form>
<hr style="width:100%;" size="5px" color="navy"/>
<?php
$select = "SELECT * FROM mac_filter ORDER BY id DESC";
$q = mysql_query($select);
$num = mysql_num_rows($q);
if($num != 0){
echo "<form action='' method='POST'><ol type='A'/>";
while($row = mysql_fetch_array($q)){
$ips = $row["mac_address"];
$status = $row["status"];
$id = $row["id"];
$token = $row["token"];
if($status == "deny"){
$status = "Denied";

}
else{

}
?>
<br/>
<li><input type="checkbox" name="mac_d[]" value="<?php echo $ips;?>"/><?php echo $ips;?>&nbsp;( <?php  echo "Mac-address " . $status;?> ) <a href="mac_del.php?id=<?php echo $id;?>&token=<?php echo $token;?>"><img src="image/delet.png" style="width:30px;margin-left:20pt"/></a></li>

<?php

}
echo "</ol><input type='hidden' name='del_secret' value='multiple_delete'/><input type='submit' value='Delete Selected' style='background-color:lightgreen;padding:10px;margin-left:2%;'/></form>";

}
else{
echo "No mac address found in the database!!";

}

?>

<?php
if(isset($_POST["del_secret"]) && !empty($_POST["del_secret"])){
	require_once("config.php");
	function ip_clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	$mac_d = "";
	
	foreach($_POST["mac_d"] as $key){
		$mac_d = ip_clean($key);
		
	$ins = "DELETE FROM mac_filter WHERE mac_address='$mac_d'";
$qu = mysql_query($ins);

if($qu){
	$msg="mac address <font style='color:green;font-weight:bold'>$mac_d </font>deleted successfully";
	echo "<p>".$msg."</p>";
			
}
else{
	$msg="Failed to delete mac address <font style='color:green;font-weight:bold'>$mac_d </font> ";
	echo "<p>".$msg."</p>";

}
		
		
		}
	
	
	}



?>

</div>
