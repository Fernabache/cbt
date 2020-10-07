<?php
include("page_auth.php");

?>

<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>



<?php

require_once("config.php");
$cmd = "SELECT DISTINCT(categories) FROM questions ORDER BY id LIMIT 10";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num != 0){
?>
<table cellspacing="5px" cellpadding="5px" style="margin-bottom:30pt" width="100%">
<tr>
<td width="5%">
ACTIONS
</td>

<td>
<select name="app_actions[]">
<option value='approved'>Approve Publishing Result</option>
<option value='pending'>Pend Publishing Result</option>
</select>
</td>
</tr>


<?php
while($row = mysql_fetch_array($query)){
$cat = $row['categories'];
include("subject_status.php");
if($status == ""){

echo "<tr><td></td><td><input type='radio' name='subje' value='$cat'/>&nbsp;$cat&nbsp;&nbsp;(<b>no status </b>)</td></tr>";

}
else{
echo "<tr><td></td><td><input type='radio' name='subje' value='$cat'/>&nbsp;$cat&nbsp;&nbsp;(<b>$status</b>)</td></tr>";
}
}
echo "<tr><td><input type='hidden'  name='submit_subject_approval_button' value='hidden treasures'/></td><td><input type='image' src='image/qu1.png' style='width:90px;padding:5pt' /></td></tr></table>";
echo "";

}
else{
echo "No Questions categories Found in the database";

}


?>



<?php

}
else
{


}


?>

