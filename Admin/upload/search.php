
<?php
if(isset($_GET["q"]) && !empty($_GET["q"])){
function  wolex_clean($file_up){
$file_up = @trim($file_up);
if(get_magic_quotes_gpc()){
$file_up = stripslashes($file_up);
}
return mysql_real_escape_string($file_up);

}
$q = wolex_clean($_GET["q"]);
include("config.php");
$select = "SELECT * FROM uploads WHERE file_name LIKE '%$q%' OR file_type LIKE '%$q%'";
$query = mysql_query($select);
$nnum = mysql_num_rows($query);
if($query){
if($nnum != 0){
?>
<table cellspacing="3px" cellpadding="10px" width="100%" border="2px">
<tr style="background-color:aqua">
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
echo $msg;
}
}
}
else{
$msg = "Failed to query database";
echo $msg;
}
?>
