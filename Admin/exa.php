<?php

require_once("config.php");
$cmd = "SELECT DISTINCT(categories) FROM exam_categories WHERE under='Examination Type'";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num != 0){
while($row = mysql_fetch_array($query)){
$et = $row['categories'];

?>

<p><input type="checkbox" name="multiple_appr_i[]" value="<?php echo $et;?>"/>&nbsp;<?php echo $et;?> </p>
<?php
}

}
else{
echo "No users";

}


?>