<?php
include('page_auth.php');
require_once("config.php");
$select = "SELECT * FROM lecturer_data";
$resul = mysql_query($select) or die(mysql_error());

if(mysql_num_rows($resul) != 0) {

while ($row = mysql_fetch_array($resul))
{

$member_id = $row['id'];
$cf = $row['username'];
$name = $row['Name'];
?>
<option value="<?php echo $cf;?>"><?php echo $name;?> (<?php echo $cf;?>)</option>
<?php


}

}

else{

echo '';

}
?>