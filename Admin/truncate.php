<?php
include('page_auth.php');
?>

<?php
if($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level'] == "Super"){
?>



<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CLEARING OF OBJECTIVE/SUBJECTIVE EXAMINATION SCORES</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please click this button only to prepare this CBT application for another examination after which you must have printed the examination master list of the recent examination conducted with this CBT application. 
</p>
</div>
<?php

if(isset($_POST['truncate']) && !empty($_POST['truncate'])){
require_once("config.php");
$command = "TRUNCATE TABLE exams_scores";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Data Truncated Successfully!')</script>";
echo $msg;
}






}
?>
<div style="margin-top:5pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<input type="hidden" name="truncate" value="truncate_processor"/>
<input type="image" name=""  src="image/cl.png" style="width:200px;padding-top:5px;"/>

</form></div>
</div>





<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CLEARING OF MULTIPLE CHOICE TABLE</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please click this button only to prepare this CBT application for another examination after which you must have printed the examination master list of the recent examination conducted with this CBT application. 
</p>
</div>
<?php

if(isset($_POST['truncate_choice']) && !empty($_POST['truncate_choice'])){
require_once("config.php");
$command = "TRUNCATE TABLE multiple_choice";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Data Truncated Successfully!')</script>";
echo $msg;
}






}
?>
<div style="margin-top:5pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<input type="hidden" name="truncate_choice" value="truncate_processor"/>
<input type="image" name=""  src="image/cl.png" style="width:200px;padding-top:5px;"/>

</form></div>
</div>



<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CLEARING OF ESSAY EXAMINATION SCORES</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please click this button only to prepare this CBT application for another examination after which you must have printed the examination master list of the recent examination conducted with this CBT application. 
</p>
</div>
<?php

if(isset($_POST['truncate_essay']) && !empty($_POST['truncate_essay'])){
require_once("config.php");
$command = "TRUNCATE TABLE essay_submission";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Data Truncated Successfully!')</script>";
echo $msg;
}






}
?>
<div style="margin-top:5pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<input type="hidden" name="truncate_essay" value="truncate_processor"/>
<input type="image" name=""  src="image/cl.png" style="width:200px;padding-top:5px;"/>

</form></div>
</div>





<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">DELETE QUESTION(S) BY CATEGORIES</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please click this button to delete database question(s) by categories. 
</p>
</div>
<?php

if(isset($_POST['delete_q_cyu']) && !empty($_POST['delete_q_cyu'])){
require_once("config.php");

$slet = "";
if(isset($_POST['quest_app'])){
foreach($_POST['quest_app'] as $key ){
$slet = $key;
}

}

if($slet == "essay"){
$command = "DELETE FROM questions WHERE paper_type='essay'";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('$slet questions is Successfully deleted!')</script>";
echo $msg;
}
}
elseif($slet == "objective"){
$command = "DELETE FROM questions WHERE paper_type='objective'";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('$slet questions is Successfully deleted!')</script>";
echo $msg;
}
}
else{
$command = "DELETE FROM questions WHERE paper_type='subjective'";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('$slet questions is Successfully deleted!')</script>";
echo $msg;
}


}








}
?>
<div style="margin-top:5pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<select name="quest_app[]" style="width:250px;padding:5px;">
<option value="objective" style="padding:5px;" title="Please select this option to delete all objective questions">Delete Objective Questions</option>
<option value="subjective" style="padding:5px;" title="Please select this option to delete all subjective questions">Delete Subjective Questions</option>
<option value="essay" style="padding:5px;" title="Please select this option to delete all essay questions">Delete Essay Questions</option>

</select>
<input type="hidden" name="delete_q_cyu" value="truncate_processor"/>
<p><input type="image" name=""  src="image/mini_btt.png" style="width:100px;padding-top:5px;"/></p>

</form></div>
</div>





<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CLEARING OF LECTURERS' DATA</h3>
<div style="margin:5pt;">
<p style="letter-spacing:1px">

NOTE: Please click this button only to clear lecturers' record from the database . 
</p>
</div>
<?php

if(isset($_POST['truncate_essay_lect']) && !empty($_POST['truncate_essay_lect'])){
require_once("config.php");
$command = "TRUNCATE TABLE lecturer_data";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Data Truncated Successfully!')</script>";
echo $msg;
}






}
?>
<div style="margin-top:5pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<input type="hidden" name="truncate_essay_lect" value="truncate_processor"/>
<input type="image" name=""  src="image/cl.png" style="width:200px;padding-top:5px;"/>

</form></div>
</div>



<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CLEARING OF REGISTERED USERS' DATA</h3>
<div style="margin:10pt;">
<p style="letter-spacing:1px">

NOTE: Please be informed that by clicking this button (Clearing Of User's Data) ,it means that you want to clear all registered users data from the database permanently.This action cannot be undone.
</p>
</div>
<?php

if(isset($_POST['truncate_registered_user']) && !empty($_POST['truncate_registered_user'])){
require_once("config.php");
$command = "TRUNCATE TABLE register";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('failed to truncate users data table!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Users Data Truncated Successfully!')</script>";
echo $msg;
}

	
}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<input type="hidden" name="truncate_registered_user" value="truncate_processor"/>
<input type="image" name=""  src="image/reg_trun.png" style="width:200px;padding-top:5px;"/>

</form></div>
</div>



<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CLEARING OF ALL POSTED QUESTIONS</h3>
<div style="margin:10pt;">
<p style="letter-spacing:1px">

NOTE: Please be informed that by clicking this button (Clear all posted questions) ,it means that you want to clear all posted questions from the database permanently.This action cannot be undone.
</p>
</div>
<?php

if(isset($_POST['truncate_questions_db']) && !empty($_POST['truncate_questions_db'])){
require_once("config.php");
$command = "TRUNCATE TABLE questions";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('failed to truncate questions table!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Posted Questions Truncated Successfully!')</script>";
echo $msg;
}

	
}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<input type="hidden" name="truncate_questions_db" value="truncate_processor"/>
<input type="image" name=""  src="image/c_post.png" style="width:200px;padding-top:5px;"/>

</form></div>
</div>




<div class="spacer">
<h3 style="padding-bottom:10px;border-bottom:1px dashed black">CLEARING OF POSTED CPANEL NEWS</h3>
<div style="margin:10pt;">
<p style="letter-spacing:1px">

NOTE: Please be informed that by clicking this button (Clear Posted  Cpanel News) ,it means that you want to clear all Posted Cpanel News from the database permanently.This action cannot be undone.
</p>
</div>
<?php

if(isset($_POST['truncate_cp_news']) && !empty($_POST['truncate_cp_news'])){
require_once("config.php");
$command = "TRUNCATE TABLE cp_news";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('failed to truncate cpanel news table!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Posted Cpanel news Truncated Successfully!')</script>";
echo $msg;
}

	
}
?>
<div style="margin-top:10pt">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<input type="hidden" name="truncate_cp_news" value="truncate_processor"/>
<input type="image" name=""  src="image/cp_news.png" style="width:200px;padding-top:5px;"/>

</form></div>
</div>

<?php

}
else
{
echo "<center><img src='image/deny.png' style='width:40%;margin:3%'/></center>";

}


?>