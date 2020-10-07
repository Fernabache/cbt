<?php
include("msg_status.php");
$select = "SELECT * FROM msg_data" ;
$q  = mysql_query($select);
$num  = mysql_num_rows($q);

if($q){
if($num != "0"){

while($row = mysql_fetch_array($q)){
$first = $row["msg"] ;
$id = $row["id"] ;
$status = $row["status"] ;

?>
<div style="padding:10px;margin:10px">
<p style="letter-spacing:4px;text-transform:uppercase;margin-bottom:10pt;">&raquo;POSTED MESSAGE TO ALL USERS&laquo;</p>
<p style="letter-spacing:2px;text-transform:lowercase"><?php echo $first;?></p>
</div>
<?php
}

}
else{

echo "<center>No data found in the database</center>";
}

}
else{
echo "failed to fetch data";


}
?>
