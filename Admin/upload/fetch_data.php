<?php
include("config.php");
$select = "SELECT * FROM uploads";
$query = mysql_query($select);
$nnum = mysql_num_rows($query);
if($query){
if($nnum != 0){
?>
<table cellspacing="3px" cellpadding="10px" border="2px">
<tr>
<th>No.</th>
<th>File Path</th>
<th>File Name</th>
<th>File Size</th>
<th>File Type</th>
<th>File Preview</th>
<th>Actions</th>
</tr>

<?php
while($row = mysql_fetch_array($query)){
$id = $row["id"];
$fp = $row["file_path"];
$fn = $row["file_name"];
$dv = $row["file_size"]/1000;
$fs = round($dv , 2);
$ft = $row["file_type"];
$tok = $row["token"];
include("tab.php");
}
?>
</table>
<?php
}
else{
$msg = "No data found in the database";
header("location:index.php?msg=$msg");
exit();
}
}
else{
$msg = "Failed to query database";
header("location:index.php?msg=$msg");
exit();
}
?>