<?php


include_once ('config.php');

if(isset($_GET['q'])){
function chk($value){
$value = @trim($value);
if(get_magic_quotes_gpc()){

$value = stripslashes($value);

}

return mysql_real_escape_string($value);


}



    $keyword = 	chk($_GET['q']) ;




$query = "SELECT * FROM register where username like '%$keyword%' or Admission_No like '%$keyword%' or Name like '%$keyword%' LIMIT 5 ";

//echo $query;
$result = mysql_query($query);
if($result){
    if(mysql_num_rows($result)!=0){
          while($row = mysql_fetch_array($result)){
		$name = $row["Name"];
		$user = $row["username"];
		$access = $row["access"];
		echo "<p>$user --- $name---$access</p>";
    }
    }else {
        echo 'No Results for :"'.$_GET['q'].'"';
    }
  
}
}else {
    echo 'Parameter Missing';
}




?>
