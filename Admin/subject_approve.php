<?php
require_once("config.php");
$cmd = "SELECT DISTINCT(categories) FROM questions ORDER BY id DESC LIMIT 10";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num != 0){
?>
<table cellspacing="5px" cellpadding="5px" width="100%">
<tr>
<td width="5%">
ACTIONS
</td>

<td>
<select name="app_action[]">
<option value='approved'>Approve Selected Subject</option>
<option value='pending'>Pend Selected Subject</option>
</select>
</td>
</tr>

<?php
while($row = mysql_fetch_array($query)){
$cat = $row['categories'];
include("subject_approval_status.php");
echo "<tr><td></td><td><input type='radio' name='subj' value='$cat'/>&nbsp;$cat&nbsp;&nbsp;(<b>$status</b>)</td></tr>";

}
echo "<tr><td><input type='hidden'  name='submit_subject_button' value='hidden treasures'/></td><td><input type='image' src='image/qu1.png' style='width:90px;padding:5pt' /></td></tr></table>";
echo "";

}
else{
echo "No Questions categories Found in the database";

}


?>