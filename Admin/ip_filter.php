<div id="ip_filter">
<?php
require_once("config.php");
if(isset($_POST["ip_token"]) && !empty($_POST["ip_token"]) && isset($_POST["ip"]) && !empty($_POST["ip"])){

function ip_clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}

	$pattern = "/^(\d|[01]?\d\d|2[0-4]\d|25[0-5])\.(\d|[01]?\d\d|2[0-4]\d|25[0-5])\.(\d|[01]?\d\d|2[0-4]\d|25[0-5])\.(\d|[01]?\d\d|2[0-4]\d|25[0-5])$/";
if(!preg_match($pattern , $_POST["ip"])){
$msg = "Please enter a valid ip address";
echo $msg;
}
else{

	
	$ip = ip_clean($_POST["ip"]);
	$token = ip_clean($_POST["ip_token"]);

$tab = "CREATE TABLE IF NOT EXISTS ip_filter(
id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
ip_address TEXT NOT NULL ,
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
$select = "SELECT * FROM ip_filter WHERE ip_address='$ip'";
$ipq = mysql_query($select);
if(!$ipq){
	$msg="<script type='text/javascript'>alert('Failed to check if the ip already exist in the database!!')</script>";
				echo $msg;

}
else{
$num = mysql_num_rows($ipq);
if($num == 1){
	$msg="<script type='text/javascript'>alert('ip address already exist in the database!!')</script>";
				echo $msg;
				
}
else{
$ins = "INSERT INTO ip_filter(ip_address ,status, token , time_stamp) VALUES('$ip' ,'deny' ,'$token' ,now())";
$qu = mysql_query($ins);

if($qu){
	$msg="<script type='text/javascript'>alert('ip address denied successfully')</script>";
	echo $msg;
			
}
else{
	$msg="<script type='text/javascript'>alert('Failed to blacklist ip address!! ')</script>";
	echo $msg;

}
}

}

}
}

?>
<h2 style="letter-spacing:2px;">IP-ADDRESS FILTERING SYSTEM</h2>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
<table cellpadding="3px" cellspacing="3px">
<tr>
<td>Ip Address: </td>
<td><input type="text" name="ip" placeholder="xxx.xxx.xxx.xxxx" required="required" style="padding:10px;width:300px" /></td>

</tr>

<tr>
<td> <input type="hidden" name="ip_token" value="<?php echo sha1(uniqid(rand(1 , 12637)))?>"/></td>
<td><input type="image" src="image/qu.png" style="width:100px"/></td>

</tr>
</table>

</form>
<hr style="width:100%;" size="5px" color="navy"/>
<?php
$select = "SELECT * FROM ip_filter ORDER BY id DESC";
$q = mysql_query($select);
$num = mysql_num_rows($q);
if($num != 0){
echo "<form action='' method='POST'><ol type='A'/>";
while($row = mysql_fetch_array($q)){
$ips = $row["ip_address"];
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
<li><input type="checkbox" name="ip_d[]" value="<?php echo $ips;?>"/><?php echo $ips;?>&nbsp;( <?php  echo "ip-address " . $status;?> ) <a href="ip_del.php?id=<?php echo $id;?>&token=<?php echo $token;?>"><img src="image/delet.png" style="width:30px;margin-left:20pt"/></a></li>

<?php

}
echo "</ol><input type='hidden' name='deletl_secret' value='multiple_delete'/><input type='submit' value='Delete Selected' style='background-color:lightgreen;padding:10px;margin-left:2%;'/></form>";

}
else{
echo "No ip address found in the database!!";

}

?>



<?php
if(isset($_POST["deletl_secret"]) && !empty($_POST["deletl_secret"])){
	require_once("config.php");
	function ip_clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	$ip_d = "";
	
	foreach($_POST["ip_d"] as $keyy){
		$ip_d = ip_clean($keyy);
		
	$ins = "DELETE FROM ip_filter WHERE ip_address='$ip_d'";
$qu = mysql_query($ins);

if($qu){
	$msg="ip address <font style='color:green;font-weight:bold'>$ip_d </font>deleted successfully";
	echo "<p>".$msg."</p>";
	
}
else{
	$msg="Failed to delete ip address <font style='color:green;font-weight:bold'>$ip_d </font> ";
	echo "<p>".$msg."</p>";

}
		
		
		}
	
	
	}



?>

</div>
