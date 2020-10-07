<?php

if(isset($_POST['subb'])){

$cat = $_POST['cate'];

$title = "";
if(isset($_POST["title"])){
foreach($_POST["title"] as $key){
$title = $key;
}

}

require_once("connection.php");

$mysqlCommand = "
CREATE TABLE IF NOT EXISTS photo_categories (
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL ,
under TEXT NOT NULL,
categories TEXT NOT NULL,
reg_date TEXT NOT NULL
)
";
$queryTable = mysql_query($mysqlCommand);
if(!$queryTable){

$msg = "<script type='text/javascript'>alert('Database Table Creation Failed! Please Check Your Connection')</script>";
echo $msg;

}
else{


$select = "INSERT INTO photo_categories (under ,categories , reg_date) VALUES('$title' ,'$cat' , now())";
$valid = "SELECT * FROM photo_categories  WHERE categories  = '$cat' AND under  = '$title'  ";
$validate = mysql_query($valid) ;
$validnum = mysql_num_rows($validate);

if ($validnum != 1){

$resul = mysql_query($select) ;
if($resul){
$msg = "<script type='text/javascript'>alert('$title added successfully!!')</script>";
echo $msg;

}
else{
$msg = "<script type='text/javascript'>alert('Unable to query Database!!')</script>";
echo $msg;

}
}

else{

$msg = "<script type='text/javascript'>alert('$title Category Already Exist!!')</script>";
echo $msg;

}
}
}
else{
$msg = "<script type='text/javascript'>alert('parameter!!')</script>";

}
?>

<h3 style="padding-bottom:10px;border-bottom:1px dashed black">ADD TO PHOTO ALBUM CATEGORIES </h3>

<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST">
<table cellpadding="5px" cellspacing="5px">
<tr>
<td>All Categories</td>
<td>
<select name="titlel[]" class="optn">
<?php include('cats.php');?>
</select></td>

</tr>

<tr>
<td>Categories</td>
<td>
<select name="title[]" class="optn">
<option value="Album Titles">Photo Gallery </option>

</select>

</td>

</tr>


<tr>
<td>Add Title</td>
<td>
<input type="text" required="" autocomplete="off" class="textn" name="cate" placeholder="Add Title"/>
</td>

</tr>

<tr>
<td><input type="hidden" value="dacracker" name="subb" /></td>
</td>
<td>
<input type="image" style="width:80px" src="image/acat.png" /></td>

</tr>

</table>

</form>


<h3 style="padding-bottom:10px;border-bottom:1px dashed black">DELETE FROM PHOTO ALBUM CATEGORIES</h3>

<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST">
<table cellpadding="5px" cellspacing="5px">
<tr>
<td>All Categories</td>
<td>
<select name="delth[]" class="optn">
<?php include('cats.php');?>
</select></td>

</tr>



<tr>
<td><input type="hidden" value="dacracker" name="categh" /></td>
</td>
<td>
<input type="image" style="width:80px" src="image/dcat.png" /></td>

</tr>

</table>

</form>

<?php

if(isset($_POST['categh'])){


$delth = "";
if(isset($_POST["delth"])){

foreach($_POST["delth"] as $key){

$delth = $key;
}

}

require_once("connection.php");

$mysqlCommand = "
CREATE TABLE IF NOT EXISTS photo_categories (
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL ,
under TEXT NOT NULL,
categories TEXT NOT NULL,
reg_date TEXT NOT NULL
)
";
$queryTable = mysql_query($mysqlCommand);
if(!$queryTable){

$msg = "<script type='text/javascript'>alert('Database Table Creation Failed! Please Check Your Connection')</script>";
echo $msg;

}
else{


$select = "DELETE FROM photo_categories WHERE categories  = '$delth'";
$valid = "SELECT * FROM photo_categories WHERE categories  = '$delth'";
$validate = mysql_query($valid) ;
$validnum = mysql_num_rows($validate) ;

if($validnum != 0){

$resul = mysql_query($select) ;
if($resul){
$msg = "<script type='text/javascript'>alert('$delth deleted successfully!!')</script>";
header("location:add_c.php");

}
else{
$msg = "<script type='text/javascript'>alert('Unable to query Database!!')</script>";
echo $msg;

}
}

else{

$msg = "<script type='text/javascript'>alert('$delth Category Does not Exist!!')</script>";
echo $msg;

}
}
}
else{
$msg = "<script type='text/javascript'>alert('parameter!!')</script>";

}
?>

