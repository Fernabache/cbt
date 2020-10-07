<?php
include('page_auth.php');
?>

<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>




<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">C.B.T MODE ACTIVATION </h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to activate the C.B.T mode in order to conduct Objective and subjective examinations or Essay examinations.
</p>
</div>
<?php
if(isset($_POST['mode_activation']) && !empty($_POST['mode_activation'])){
require_once("config.php");
$slet = "";
if(isset($_POST['quest_app'])){
foreach($_POST['quest_app'] as $key ){
$slet = $key;
}

}
require_once("config.php");
$tab = "
CREATE TABLE IF NOT EXISTS mode(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
status TEXT NOT NULL,
token TEXT NOT NULL,
date_time TIMESTAMP NOT NULL
)
";
$query = mysql_query($tab);
if(!$query){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
exit;
}
$token = sha1(uniqid().time());
$select = "SELECT * FROM mode WHERE id = '1'";
$sleq = mysql_query($select);
$numbe = mysql_num_rows($sleq);

if($numbe == 1){
$command = "UPDATE mode SET status = '$slet' ,date_time=now() ,token='$token' WHERE id='1'";
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to update data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Mode is set to $slet')</script>";
echo $msg;
}

}
else{
$inse = "INSERT INTO mode (status , token ,date_time) VALUES('$slet' ,'$token' ,now())";
$exec = mysql_query($inse);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to insert data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Mode is set to $slet')</script>";
echo $msg;
}
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="quest_app[]" style="">
<option value="objective_subjective">Objective & Subjective Mode</option>
<option value="essay_mode">Essay Exams Mode</option>
</select>
<input type="hidden" name="mode_activation" value="questions_approval"/><br/>
<input type="image" class="hov" src="image/ap_r.png" style="width:100px;padding-top:5px"/>
</form></div>
<p><?php include("mode_status.php");?></p>
</div>




<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">C.B.T MULTIPLE EXAMINATION MODE ACTIVATION </h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to activate the C.B.T MULTIPLE EXAMINATION MODE in order to concurrent Objective and subjective examinations .
</p>
</div>
<?php
if(isset($_POST['multiple_mode_activation']) && !empty($_POST['multiple_mode_activation'])){
require_once("config.php");
$slet = "";
if(isset($_POST['quest_app'])){
foreach($_POST['quest_app'] as $key ){
$slet = $key;
}

}
require_once("config.php");
$tab = "
CREATE TABLE IF NOT EXISTS cross_platform_mode(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
status TEXT NOT NULL,
token TEXT NOT NULL,
date_time TIMESTAMP NOT NULL
)
";
$query = mysql_query($tab);
if(!$query){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
exit;
}
$token = sha1(uniqid().time());
$select = "SELECT * FROM cross_platform_mode WHERE id = '1'";
$sleq = mysql_query($select);
$numbe = mysql_num_rows($sleq);

if($numbe == 1){
$command = "UPDATE cross_platform_mode SET status = '$slet' ,date_time=now() ,token='$token' WHERE id='1'";
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to update data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Multiple Examination Mode is set to $slet')</script>";
echo $msg;
}

}
else{
$inse = "INSERT INTO cross_platform_mode (status , token ,date_time) VALUES('$slet' ,'$token' ,now())";
$exec = mysql_query($inse);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to insert data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Multiple Examination Mode is set to $slet')</script>";
echo $msg;
}
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="quest_app[]" style="">
<option value="enable">Enable Multiple Examination Mode</option>
<option value="disable">Disable Multiple Examination Mode</option>
</select>
<input type="hidden" name="multiple_mode_activation" value="questions_approval"/><br/>
<input type="image" class="hov" src="image/ap_r.png" style="width:100px;padding-top:5px"/>
</form></div>
<p><?php include("cross_status.php");?></p>
</div>









<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">C.B.T MULTIPLE MODE RESTRICTION BYPASS </h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to activate to bypass multiple examination restrictions</p>
</div>
<?php
if(isset($_POST['mode_activation_bypass']) && !empty($_POST['mode_activation_bypass'])){
require_once("config.php");
$slet = "";
if(isset($_POST['quest_app'])){
foreach($_POST['quest_app'] as $key ){
$slet = $key;
}

}
require_once("config.php");
$tab = "
CREATE TABLE IF NOT EXISTS mode_bypass(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
status TEXT NOT NULL,
token TEXT NOT NULL,
date_time TIMESTAMP NOT NULL
)
";
$query = mysql_query($tab);
if(!$query){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
exit;
}
$token = sha1(uniqid().time());
$select = "SELECT * FROM mode_bypass WHERE id = '1'";
$sleq = mysql_query($select);
$numbe = mysql_num_rows($sleq);

if($numbe == 1){
$command = "UPDATE mode_bypass SET status = '$slet' ,date_time=now() ,token='$token' WHERE id='1'";
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to update data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Mode is set to $slet')</script>";
echo $msg;
}

}
else{
$inse = "INSERT INTO mode_bypass (status , token ,date_time) VALUES('$slet' ,'$token' ,now())";
$exec = mysql_query($inse);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to insert data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Mode is set to $slet')</script>";
echo $msg;
}
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="quest_app[]" style="width:230px">
<option value="enable">Enable</option>
<option value="disable">Disable</option>
</select>
<input type="hidden" name="mode_activation_bypass" value="cbtmode"/><br/>
<input type="image" class="hov" src="image/ap_r.png" style="width:100px;padding-top:5px"/>
</form></div>
<p><?php include("bypass_status.php");?></p>
</div>








<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">C.B.T FULL RESULT SCREEN DISPLAYS</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to activate the FULL RESULT SCREEN DISPLAYS.
</p>
</div>
<?php
if(isset($_POST['full_mode_activation']) && !empty($_POST['full_mode_activation'])){
require_once("config.php");
$slet = "";
if(isset($_POST['quest_app'])){
foreach($_POST['quest_app'] as $key ){
$slet = $key;
}

}
require_once("config.php");
$tab = "
CREATE TABLE IF NOT EXISTS full_result_mode(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
status TEXT NOT NULL,
token TEXT NOT NULL,
date_time TIMESTAMP NOT NULL
)
";
$query = mysql_query($tab);
if(!$query){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
exit;
}
$token = sha1(uniqid().time());
$select = "SELECT * FROM full_result_mode WHERE id = '1'";
$sleq = mysql_query($select);
$numbe = mysql_num_rows($sleq);

if($numbe == 1){
$command = "UPDATE full_result_mode SET status = '$slet' ,date_time=now() ,token='$token' WHERE id='1'";
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to update data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Full Result Display Mode is set to $slet')</script>";
echo $msg;
}

}
else{
$inse = "INSERT INTO full_result_mode (status , token ,date_time) VALUES('$slet' ,'$token' ,now())";
$exec = mysql_query($inse);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to insert data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Full Result Display Mode is set to $slet')</script>";
echo $msg;
}
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="quest_app[]" style="">
<option value="enable">Enable Full result Display</option>
<option value="disable">Disable Full result Display</option>
</select>
<input type="hidden" name="full_mode_activation" value="questions_approval"/><br/>
<input type="image" class="hov" src="image/ap_r.png" style="width:100px;padding-top:5px"/>
</form></div>
<p><?php include("full_status.php");?></p>
</div>









<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">ESSAY QUESTIONS APPROVAL</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to approve all posted essay questions or to revoke all posted eassay questions.
</p>
</div>
<?php
if(isset($_POST['essay_approv_q']) && !empty($_POST['essay_approv_q'])){
require_once("config.php");
$slet = "";
if(isset($_POST['quest_app'])){
foreach($_POST['quest_app'] as $key ){
$slet = $key;
}

}

$command = "UPDATE questions SET approval_status = '$slet' WHERE paper_type='essay'";
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Database Queried Successfully')</script>";
echo $msg;
}






}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="quest_app[]" style="">
<option value="approved">Approve Questions Publishing</option>
<option value="pending">Revoke Questions Publishing</option>
</select>
<input type="hidden" name="essay_approv_q" value="questions_approval"/><br/>
<input type="image" class="hov" src="image/ap_r.png" style="width:100px;padding-top:5px"/>
</form></div>
</div>



<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">POSTED QUESTIONS APPROVAL</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to approve all posted questions or to revoke all posted questions.
</p>
</div>
<?php
if(isset($_POST['approv_q']) && !empty($_POST['approv_q'])){
require_once("config.php");
$slet = "";
if(isset($_POST['quest_app'])){
foreach($_POST['quest_app'] as $key ){
$slet = $key;
}

}

$command = "UPDATE questions SET approval_status = '$slet'";
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Database Queried Successfully')</script>";
echo $msg;
}






}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="quest_app[]" style="">
<option value="approved">Approve Questions Publishing</option>
<option value="pending">Revoke Questions Publishing</option>
</select>
<input type="hidden" name="approv_q" value="questions_approval"/><br/>
<input type="image" class="hov" src="image/ap_r.png" style="width:100px;padding-top:5px"/>
</form></div>
</div>





<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">FEES AUTHENTICATION MANAGEMENT </h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to activate the FEES AUTHENTICATION SYSTEM in order to allow/disallow student login into the examination page.
</p>
</div>
<?php
if(isset($_POST['fee_data']) && !empty($_POST['fee_data'])){
require_once("config.php");
$slet = "";
if(isset($_POST['quest_app'])){
foreach($_POST['quest_app'] as $key ){
$slet = $key;
}

}
require_once("config.php");
$tab = "
CREATE TABLE IF NOT EXISTS fee_data(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
status TEXT NOT NULL,
token TEXT NOT NULL,
date_time TIMESTAMP NOT NULL
)
";
$query = mysql_query($tab);
if(!$query){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
exit;
}
$token = sha1(uniqid().time());
$select = "SELECT * FROM fee_data WHERE id = '1'";
$sleq = mysql_query($select);
$numbe = mysql_num_rows($sleq);

if($numbe == 1){
$command = "UPDATE fee_data SET status = '$slet' ,date_time=now() ,token='$token' WHERE id='1'";
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to update data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Fees Authentication is $slet')</script>";
echo $msg;
}

}
else{
$inse = "INSERT INTO fee_data (status , token ,date_time) VALUES('$slet' ,'$token' ,now())";
$exec = mysql_query($inse);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to insert data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Fees Authentication is $slet')</script>";
echo $msg;
}
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="quest_app[]" style="">
<option value="enabled">Enable fees authentication</option>
<option value="disabled">Disable fees authentication</option>
</select>
<input type="hidden" name="fee_data" value="questions_approval"/><br/>
<input type="image" class="hov" src="image/ap_r.png" style="width:100px;padding-top:5px"/>
</form></div>
<p><?php include("fees_status.php");?></p>
</div>






<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">INSTANT RESULT PUBLISHING</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to ENABLE or DISABLE instant publishing of result.
</p>
</div>
<?php
if(isset($_POST['instant_q']) && !empty($_POST['instant_q'])){
require_once("config.php");
$slet = "";
if(isset($_POST['in_quest_app'])){
foreach($_POST['in_quest_app'] as $key ){
$slet = $key;
}

}

$cret = "CREATE TABLE IF NOT EXISTS instant_pub (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
instant_status TEXT NOT NULL ,
token TEXT NOT NULL,
time_stamp TEXT NOT NULL
)";
$word = "GodisMyStrenghtandisTheSouRceOfMyWiSdOmAnDkNowLeDgE";
$token = sha1(md5(rand(3452 , 425715172).$word));
if(!mysql_query($cret)){
$msg="<script type='text/javascript'>alert('Failed to create instant result publishing table ')</script>";
echo $msg;
}

$sel = "SELECT * FROM instant_pub WHERE id='1'";
$sele_query = mysql_query($sel);
$num_in = mysql_num_rows($sele_query);

if(!$sele_query){
$msg="<script type='text/javascript'>alert('Failed to Select instant result publishing table ')</script>";
echo $msg;
}
else{
if($num_in == 1){
$row = mysql_fetch_array($sele_query);
$status = $row["instant_status"];
if($status == $slet){
$msg="<script type='text/javascript'>alert('instant result publishing status is already $slet')</script>";
echo $msg;
}
else{
$command = "UPDATE instant_pub SET instant_status = '$slet' WHERE id='1'";
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Instant result publishing is now $slet')</script>";
echo $msg;
}

}


}
elseif($num_in == 0){
$insert = "INSERT INTO instant_pub (instant_status ,token ,time_stamp) VALUES('$slet' ,'$token' ,now())";
$exec = mysql_query($insert);
if(!$exec){

$msg="<script type='text/javascript'>alert('Failed to insert into the db!!')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Instant result publishing is now $slet')</script>";
echo $msg;
}
}
else{

}


}


}
?>

<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="in_quest_app[]" style="">
<option value="enabled">Enable Instant Result Publishing</option>
<option value="disabled">Disable Instant Result Publishing</option>
</select>
<input type="hidden" name="instant_q" value="instant_result_pub"/><br/>
<input type="image" class="hov_i" src="image/mini_btt.png" style="width:100px;padding-top:5px"/>
</form></div>
<p style="letter-spacing:3px;color:green"><?php include("instant_status.php");?></p>
</div>






<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">C.B.T RESULT PUBLISHING BUTTON MANAGEMENT </h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to activate / deactivate the C.B.T RESULT PUBLISHING BUTTON.
</p>
</div>
<?php
if(isset($_POST['result_publishing_button']) && !empty($_POST['result_publishing_button'])){
require_once("config.php");
$slet = "";
if(isset($_POST['quest_app'])){
foreach($_POST['quest_app'] as $key ){
$slet = $key;
}

}
require_once("config.php");
$tab = "
CREATE TABLE IF NOT EXISTS result_button(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
status TEXT NOT NULL,
token TEXT NOT NULL,
date_time TIMESTAMP NOT NULL
)
";
$query = mysql_query($tab);
if(!$query){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
exit;
}
$token = sha1(uniqid().time());
$select = "SELECT * FROM result_button WHERE id = '1'";
$sleq = mysql_query($select);
$numbe = mysql_num_rows($sleq);

if($numbe == 1){
$command = "UPDATE result_button SET status = '$slet' ,date_time=now() ,token='$token' WHERE id='1'";
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to update data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Result publishing button is set to $slet')</script>";
echo $msg;
}

}
else{
$inse = "INSERT INTO result_button (status , token ,date_time) VALUES('$slet' ,'$token' ,now())";
$exec = mysql_query($inse);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed! Unable to insert data')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Result publishing button is set to $slet')</script>";
echo $msg;
}
}


}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="quest_app[]" style="">
<option value="enable">Enable result publishing button</option>
<option value="disable">Disable result publishing button</option>
</select>
<input type="hidden" name="result_publishing_button" value="questions_approval"/><br/>
<input type="image" class="hov" src="image/ap_r.png" style="width:100px;padding-top:5px"/>
</form></div>
<p><?php include("result_btn_status.php");?></p>
</div>







<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">ALERT MESSAGES PUBLISHING STATUS</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please use this section to ENABLE or DISABLE alert messages publishing.
</p>
</div>
<?php
if(isset($_POST['alert_msg_pub']) && !empty($_POST['alert_msg_pub'])){
require_once("config.php");
$slet = "";
if(isset($_POST['in_quest_app'])){
foreach($_POST['in_quest_app'] as $key ){
$slet = $key;
}

}

$tab = "
CREATE TABLE IF NOT EXISTS msg_data (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
msg TEXT NOT NULL,
status TEXT NOT NULL,
time_stamp TEXT NOT NULL 
) 

";

$conne = mysql_query($tab);

if(!$conne){
$msg="<script type='text/javascript'>alert('Failed to create table')</script>";
echo $msg;
exit;

}

$sel = "SELECT * FROM msg_data WHERE id='1'";
$sele_query = mysql_query($sel);
$num_in = mysql_num_rows($sele_query);

if(!$sele_query){
$msg="<script type='text/javascript'>alert('Failed to Select alert messages publishing table ')</script>";
echo $msg;
}
else{
if($num_in == 1){
$row = mysql_fetch_array($sele_query);
$status = $row["status"];
if($status == $slet){
$msg="<script type='text/javascript'>alert('alert messages publishing status is already $slet')</script>";
echo $msg;
}
else{
$command = "UPDATE msg_data SET status = '$slet' WHERE id='1'";
$exec = mysql_query($command);
if(!$exec){

$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Alert messages publishing  is now $slet')</script>";
echo $msg;
}

}


}
elseif($num_in == 0){
$insert = "INSERT INTO msg_data (msg ,status ,time_stamp) VALUES('Hello users,you are welcome to this examination' ,'$slet' ,now())";
$exec = mysql_query($insert);
if(!$exec){

$msg="<script type='text/javascript'>alert('Failed to insert into the db!!')</script>";
echo $msg;

}
else{

$msg="<script type='text/javascript'>alert('Instant result publishing is now $slet')</script>";
echo $msg;
}
}
else{

}


}


}
?>

<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="in_quest_app[]" style="">
<option value="enabled">Enable Alert Message Publishing</option>
<option value="disabled">Disable Alert Message Publishing</option>
</select>
<input type="hidden" name="alert_msg_pub" value="alert_msg_pub"/><br/>
<input type="image" class="hov_i" src="image/mini_btt.png" style="width:100px;padding-top:5px"/>
</form></div>
<p><?php include("msg_status.php");?></p>
</div>


<?php

}
else
{


}


?>
