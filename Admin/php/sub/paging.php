<?php
include('config.php');
//////////////  QUERY THE MEMBER DATA INITIALLY LIKE YOU NORMALLY WOULD
$sql = mysql_query("SELECT * FROM sub_quest WHERE approval_status='approved'");
//////////////////////////////////// wolexzo07's Pagination Logic ////////////////////////////////////////////////////////////////////////
$nr = mysql_num_rows($sql); // Get total of Num rows from the database query

if($nr == 0){

$msg = "<center><p style='margin:1%;letter-spacing:2pt'>No questions approved yet</p></center>";
header("location:error.php?msg=$msg");
exit();

}


if (isset($_GET['pn'])) { // Get pn from URL vars if it is present
    $pn = preg_replace('#[^0-9]#i', '', $_GET['pn']); // filter everything but numbers for security(new)
    //$pn = ereg_replace("[^0-9]", "", $_GET['pn']); // filter everything but numbers for security(deprecated)
} else { // If the pn URL variable is not present force it to be value of page number 1
    $pn = 1;
} 
//This is where we set how many database items to show on each page 
$itemsPerPage = 1; 
// Get the value of the last page in the pagination result set
$lastPage = ceil($nr / $itemsPerPage);
// Be sure URL variable $pn(page number) is no lower than page 1 and no higher than $lastpage
if ($pn < 1) { // If it is less than 1
    $pn = 1; // force if to be 1
} else if ($pn > $lastPage) { // if it is greater than $lastpage
    $pn = $lastPage; // force it to be $lastpage's value
} 
// This creates the numbers to click in between the next and back buttons
// This section is explained well in the video that accompanies this script
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
} else if ($pn == $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
}
// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
// Now we are going to run the same query as above but this time add $limit onto the end of the SQL syntax
// $sql2 is what we will use to fuel our while loop statement below
$sql2 = mysql_query("SELECT * FROM register  ORDER BY Time_Stamp $limit"); 
//////////////////////////////// END wolexzo07's Pagination Logic ////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////// wolexzo07's Pagination Display Setup /////////////////////////////////////////////////////////////////////
$paginationDisplay = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display
if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    // If we are not on page 1 we can place the Back button
    if ($pn != 1) {
        $previous = $pn - 1;
        $paginationDisplay .=  '&nbsp;  <a id="last" href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> <img src="image/p1.png" style="width:60px;height:40px" class="p1"/></a> ';
    } 
    // Lay in the clickable numbers display here between the Back and Next links
    // If we are not on the very last page we can place the Next button
    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
	
        $paginationDisplay .=  '&nbsp;  <a id="next" href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '"> <img src="image/n1.png" style="width:60px;height:40px" class="n1"/><br/></a> ';
    } 
	$paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    
	 $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
    
}
///////////////////////////////////// END wolexzo07's Pagination Display Setup ///////////////////////////////////////////////////////////////////////////
// Build the Output Section Here
include("top.php");?>
     <h3 style="letter-spacing:3px;font-weight:normal;">Total Numbers Of Registered Students: <b><?php echo $nr; ?></b></h3>
 
<table cellpadding="10px" cellspacing="10px" border="2px" width="100%">
<tr><th align="left">Username</th><th align="left">Name</th><th align="left">Email</th><th align="left">Mobile</th><th align="left">Login Access</th><th align="left">Time stamp</th></tr>

<?php
$outputList = '';
while($row = mysql_fetch_array($sql2)){
$id= $row["id"];
$username= $row["username"];
$name= $row["Name"];
$email= $row["email"];
$mobile= $row["mobile"];
$access= $row["access"];
$t= $row["Time_Stamp"];
$vv = $row["Level"];

 $outputList .= include("registered_mem.php");

}
?>
</table>
<?php
// close while loop
?>
   <div style="-webkit-box-shadow:2px 2px 2px 2px black;-o-box-shadow:2px 2px 2px 2px black;-ms-box-shadow:2px 2px 2px 2px black;border-radius:10px;-webkit-border-radius:10px;-moz-border-radius:10px;padding:10px ;margin-left:7px;margin-bottom:7px;margin-top:1px;width:500px">

      <div style=""><?php "$outputList"; ?></div>
	 <div style=""><?php echo $paginationDisplay; ?></div>
  </div> 