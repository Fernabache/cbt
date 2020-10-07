<?php
if(isset($_POST["exporter_excel"])){

require_once("../config.php");

function valuee($str){
$str = @trim($str);
if(get_magic_quotes_gpc()){
$str = stripslashes($str);
}
return mysql_real_escape_string($str);

}

$user = valuee($_POST["exporter_excel"]);

$query = "SELECT id , name , username , subject ,score , token FROM essay_submission WHERE lecturer_name='$user' ";
$header = '';
$data ='';

$export = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );
$fields = mysql_num_fields ( $export );

for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $export , $i ) . "\t";
}

while( $row = mysql_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= ucfirst($value);
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Export.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";

}
?>

