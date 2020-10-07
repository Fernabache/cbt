<script type="text/javascript" language="javascript">
function suc(t){

$("#success_message").fadeIn(2000).delay(100).fadeOut(250);
var ty = setTimeout("suc()" ,t);
clearTimeout(ty , 5000);

}
</script>