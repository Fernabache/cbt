<?php
if(isset($_POST["files"])){
error_reporting(0);

$file_tmp = $_FILES['ufile']['tmp_name'][0];
$file_name = $_FILES['ufile']['name'][0];
$file_size = $_FILES['ufile']['size'][0];
$file_type = $_FILES['ufile']['type'][0];
$file_error = $_FILES['ufile']['error'][0];
$file_path = "tmp/".$file_name;
$ext = end(explode(".",$_FILES['ufile']['name'][0]));
move_uploaded_file($file_tmp,$file_path);
$nam = md5(rand(1,1425638298));
$es = $nam.".".$ext;
$r = rename($file_path , "tmp/".$es);
$np = "tmp/".$es;
?>

<img src="<?php echo $np;?>" style="width:100;"/>
<?php


}
?>

<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<p>File1: <input type="file" name="ufile[]" style="" size="40"/> *</p>
<p>File2: <input type="file" name="ufile[]" style="" size="40"/> *</p>
<input type="hidden" name="files" value="wolexzo07dacracker"/>
<input type="submit" name="multi_submit" value="Upload"/>&nbsp;&nbsp;<input type="reset" value="Reset"/>
</form>