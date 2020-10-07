<?php

require_once("config.php");
$cmd = "SELECT DISTINCT(exam_type) FROM questions";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num != 0){
while($row = mysql_fetch_array($query)){
$et = $row['exam_type'];
$sld = "SELECT * FROM questions WHERE exam_type='$et' AND approval_status='approved'";
$qu = mysql_query($sld);
if(!$qu){
echo "Failed to query!!";

}
else{
$nutm = mysql_num_rows($qu);


}


$sldd = "SELECT * FROM questions WHERE exam_type='$et' AND approval_status='pending'";
$quq = mysql_query($sldd);
if(!$quq){
echo "Failed to query!!";

}
else{
$nunm = mysql_num_rows($quq);


}
?>

</br><input type="checkbox" name="multiple_appr_i[]" value="<?php echo $et;?>"/>&nbsp;<?php echo $et;?>  <font style='letter-spacing:3pt;margin-left:10pt'>(<b><?php echo $nutm;?></b> question(s) approved and <b><?php echo $nunm;?></b> question(s) on pending)</font><br/>
<?php
}

}
else{
echo "No users";

}


?>