<?php

$user = $_SESSION['CURRENT_IUO_DATA_USERNAME'];
require_once("../config.php");

$sql = mysql_query("SELECT * FROM essay_submission WHERE lecturer_name='$user' ORDER BY id");
//////////////////////////////////// wolexzo07's Pagination Logic ////////////////////////////////////////////////////////////////////////
$nr = mysql_num_rows($sql); // Get total of Num rows from the database query

if($nr == 0){

$msg = "<center><p style='margin:1%;letter-spacing:2pt'>No script submitted yet</p></center>";
echo $msg;
exit();

}


if (isset($_GET['pn'])) { // Get pn from URL vars if it is present
    $pn = preg_replace('#[^0-9]#i', '', $_GET['pn']); // filter everything but numbers for security(new)
    //$pn = ereg_replace("[^0-9]", "", $_GET['pn']); // filter everything but numbers for security(deprecated)
} else { // If the pn URL variable is not present force it to be value of page number 1
    $pn = 1;
} 
//This is where we set how many database items to show on each page 
$itemsPerPage = 10; 
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
$sql2 = mysql_query("SELECT * FROM essay_submission WHERE lecturer_name='$user' ORDER BY id $limit"); 
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
// Build the Output Section Here?
$count = mysql_num_rows($sql);

?>


<p style="margin-top:10pt;margin-bottom:10pt;text-align:center;letter-spacing:2px;">&raquo;&raquo; TOTAL SUBMITTED EXAMINATION SCRIPT = <?php echo $count;?> &laquo;&laquo;</p>
<table cellpadding="5px" width="100%" cellspacing="1px" border="1px">
<tr>
<th align="left">No.</th><th align="left">Names</th><th align="left">Username</th><th align="left">Subject</th><th align="left">Exam Script</th><th align="left">Compute Score</th><th align="left">Score</th>
</tr>
<?php include("updatee.php");?>

<?php
$outputList = '';
include("top.php");
for ( $i = 0; $i < $count; $i++ )
{
   $i++;
}

while($row = mysql_fetch_array($sql2)){
$id = $row["id"];
$name = $row["name"];
$user = $row["username"];
$path = $row["question_path"];
$token = $row["token"];
$paper = $row["paper_type"];
$score = $row["score"];
$subject = $row["subject"];
$lect = $row["lecturer_name"];
$date = $row["date_time"];



 $outputList .= ""
 ?>
 <tr>
<td><p style="letter-spacing:2px;"><?php echo $id.".";?></p></td>
<td><p style="letter-spacing:2px;"><?php echo $name;?></p></td>
<td><?php echo $user;?></td>
<td><?php echo $subject;?></td>
<td><a href="<?php echo "/iuo/".$path;?>" target="_blank" title="Click to download the student (<?php echo $user;?>) examination script"><?php echo $user;?></a></td>
<td>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="text" maxlength="3" required="" style="height:30px;width:50px;padding:5px;float:left;border:1px solid blue;" name="score" />
<input type="hidden" name="user_app" value="<?php echo $user;?>"/>
<input type="hidden" name="user_appi" value="<?php echo " ".$name;?>"/>
<input type="hidden" name="id" value="<?php echo " ".$id;?>"/>
<input type="image" src="../img/submit.png" style="width:80px;float:left"/></form></td>
<td><p style="letter-spacing:2px;font-weight:bold;"><?php echo $score;?></p></td></tr>
 
 <?php

}
// close while loop
?>
</table>
   <div style="-webkit-box-shadow:2px 2px 2px 2px black;-o-box-shadow:2px 2px 2px 2px black;-ms-box-shadow:2px 2px 2px 2px black;border-radius:10px;-webkit-border-radius:10px;-moz-border-radius:10px;padding:10px ;margin-left:7px;margin-bottom:7px;margin-top:1px;width:500px">

      <div style=""><?php "$outputList"; ?></div>
	 <div style=""><?php echo $paginationDisplay; ?></div>
  </div> 