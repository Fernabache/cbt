/*
Visit homepage
*/
shortcut.add("Alt+H",function() {
var answer = window.confirm("Are you sure you want to go back to the homepage?");
if(answer){
window.location = "index.php";
return true;
}else{
return false;
}

})

/*
Post examination questions

*/
shortcut.add("Alt+P",function() {
var answer = window.confirm("Are you sure you want to post examination questions now ?");
if(answer){
window.location = "question_post.php";
return true;
}else{
return false;
}

})

/*
View Posted examination questions

*/
shortcut.add("Alt+P",function() {
var answer = window.confirm("Are you sure you want to post examination questions now ?");
if(answer){
window.location = "question_post.php";
return true;
}else{
return false;
}

})

shortcut.add("Alt+N",function() {
var loi = document.getElementById("next").href;
window.location = loi;

})

shortcut.add("Alt+P",function() {

var loin = document.getElementById("last").href;
window.location = loin;

})

shortcut.add("Alt+L",function() {

var logt = document.getElementById("logout").href;
var answer = window.confirm("Are you sure you want to logout?");
if(answer){
window.location = logt;
return true;
}else{
return false;
}

})

shortcut.add("Alt+1",function() {

$(document).ready(function(){
$("#scor").slideUp("slow");
$("#perso_pro").show("slow").css("backgroundColor , yellow");

})


})





