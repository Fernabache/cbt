<?php


include_once ('connection.php');

if(isset($_GET['q'])){
function chk($value){
$value = @trim($value);
if(get_magic_quotes_gpc()){

$value = stripslashes($value);

}

return mysql_real_escape_string($value);


}



    $keyword = 	chk($_GET['q']) ;




$query = "select * from dugomembers where username like '%$keyword%'  ";

//echo $query;
$result = mysql_query($query);
if($result){
    if(mysql_num_rows($result)!=0){
          while($row = mysql_fetch_array($result)){
		  $member = $row['member_id'];
$first = $row['firstname'];
$last = $row['lastname'];
$user = $row['username'];
$middle = $row['middlename'];
$email = $row['email'];
$skey = $row['security'];

$gen = $row['gender'];
$dob = $row['dob'];

$status = $row['status'];



$country = $row['country'];
		  
		  
		  
     include('member_request.php') ;
    }
    }else {
        echo 'No Results for :"'.$_GET['q'].'"';
    }
  
}
}else {
    echo 'Parameter Missing';
}




?>
