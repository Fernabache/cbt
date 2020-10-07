$pend = "SELECT * FROM exams_scores WHERE script_owner='$owner' AND Score_approval='pended'";
$pend_all_query = mysql_query($pend);
$pend_count = mysql_num_rows($pend_all_query);
if($pend_count != 0){
$msg = "Please your result is pended!!"  ;
$status = "Not Admitted Yet";
include('sco_ext.php');
}

$cease = "SELECT * FROM exams_scores WHERE script_owner='$owner' AND Score_approval='ceased'";
$cease_all_query = mysql_query($cease);
$cease_count = mysql_num_rows($cease_all_query);
if($cease_count != 0){

$msg = "Please your result is ceased";
$status = "Not Admitted Yet";
include('sco_ext.php');

}