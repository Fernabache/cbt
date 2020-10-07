
<?php
if(isset($_POST["calc"]) && !empty($_POST["calc"])){


$from = "";
if(isset($_POST["from_time"]) && !empty($_POST["from_time"])){
foreach($_POST["from_time"] as $keyy){
$from = $keyy ;
}

}


$to = "";
if(isset($_POST["to_time"]) && !empty($_POST["to_time"])){
foreach($_POST["to_time"] as $keyyy){
$to = $keyyy ;
}

}
$value = $_POST['comput'];

if(!is_numeric($_POST['comput'])){
$msg="<script type='text/javascript'>alert('Please enter a number')</script>";
echo $msg;

}

elseif($from == 'minutes' && $to == 'minutes'){

$va = $value;
if($va < 1 || $va == 1){

$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va minute')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va minutes')</script>";
echo $msg;

}

}

elseif($from == 'hours' && $to == 'hours'){

$va = $value;
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va hour')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va hours')</script>";
echo $msg;
}

}

elseif($from == 'seconds' && $to == 'seconds'){

$va = $value;
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va second')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va seconds')</script>";
echo $msg;

}

}

elseif($from == 'milliseconds' && $to == 'milliseconds'){

$va = $value;
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va millisecond')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va milliseconds')</script>";
echo $msg;

}

}


elseif($from == 'minutes' && $to == 'hours'){

$va = $value/60;
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va hour')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va hours')</script>";
echo $msg;

}



}

elseif($from == 'minutes' && $to == 'seconds'){


$va = $value * 60;
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va second')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va seconds')</script>";
echo $msg;

}



}


elseif($from == 'minutes' && $to == 'milliseconds'){


$va = $value * 60 * 1000;
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va millisecond')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va milliseconds')</script>";
echo $msg;

}



}



elseif($from == 'hours' && $to == 'minutes'){


$va = $value * 60;
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va minute')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va minutes')</script>";
echo $msg;

}



}

elseif($from == 'hours' && $to == 'seconds'){


$va = $value * 60 * 60;
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va second')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va seconds')</script>";
echo $msg;

}



}


elseif($from == 'hours' && $to == 'milliseconds'){


$va = $value * 60 * 60 * 1000;
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va millisecond')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va milliseconds')</script>";
echo $msg;

}



}


elseif($from == 'seconds' && $to == 'minutes'){


$va = $value/60 ;
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va minute')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va minutes')</script>";
echo $msg;

}



}


elseif($from == 'seconds' && $to == 'hours'){


$va = $value/(60 * 60);
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va hour')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va hours')</script>";
echo $msg;

}



}


elseif($from == 'seconds' && $to == 'milliseconds'){


$va = $value * pow(10,3);
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va millisecond')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va milliseconds')</script>";
echo $msg;

}



}

elseif($from == 'milliseconds' && $to == 'seconds'){


$va = $value/1000;
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va second')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va seconds')</script>";
echo $msg;

}



}

elseif($from == 'milliseconds' && $to == 'minutes'){


$va = $value/(1000*60);
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va minute')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va minutes')</script>";
echo $msg;

}



}




elseif($from == 'milliseconds' && $to == 'hours'){


$va = $value/(1000*60*60);
$va = round($va ,7);
if($va < 1 || $va == 1){
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va hour')</script>";
echo $msg;

}
else{
$msg="<script type='text/javascript'>alert('Conversion of $value $from To $to is $va hours')</script>";
echo $msg;

}



}
else{
$msg="<script type='text/javascript'>alert('No conversion factor')</script>";
echo $msg;

}


}

?>
