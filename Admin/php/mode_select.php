<?php
include("auth.php");
if(isset($_POST["scode"]) && !empty($_POST["scode"]) && isset($_POST["token"]) && !empty($_POST["token"])){


}
else{

}

?>
<div id="posi">
<style type="text/css">
#posi{
margin:20%;

}
</style>
<form method="POST" action="" onsubmit="return()" onreset="return()">
<table cellspacing="2px" cellpadding="2px" border="0px">
<tr>
<td>Choose Mode</td>
<td>
<input type="radio" name="mode" value="normal"/>&nbsp;Normal Mode
</td>
<td><input type="radio" name="mode" value="random"/>&nbsp;Random  Mode </td>
<td>
<input type="hidden" name="scode" value="<?php?>"/>
</td>
<td><input type="hidden" name="token" value="<?php?>"/></td>

</tr>

</table>
</form>
</div>