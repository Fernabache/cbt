

$(document).ready(function(){


	$("#permission ,#revoke ,#quest,#main_profile,#msg_alert ,#revoke_admin,#s_script,#n_cat,#timing,#eac_score,#news_p,.cp_news_fetch").niceScroll({ autohidemode: true });

	$("#submit").mouseover(function(){
	$("#submit").attr("src" ,"image/subb.png");
	
	});
	$("#submit").mouseout(function(){
	$("#submit").attr("src" ,"image/sub.png");
	
	});
	


$("#question").click(function(){
$("#quest").fadeIn("400");


});


$("#exam_setup").click(function(){
$("#eac_score").slideDown("slow");
$("#secret_menu").slideUp("slow");


});


$("#userss_msg").click(function(){
$("#msg_alert").slideDown("slow");
$("#secret_menu").slideUp("slow");


});
$(".userss_msg").click(function(){
$("#msg_alert").slideUp("slow");
$("#secret_menu").slideDown("slow");
});

$("#cancel_q").click(function(){
$("#quest").fadeOut("300");


});

$("#posted_question").click(function(){
$("#posted").slideDown();


});


$("#ccel").click(function(){
$("#welco").slideUp();
$("#hidden").slideDown();



})

$("#hidden").click(function(){
$("#welco").slideDown();
$("#hidden").slideUp();



})
$(".p_image").click(function(){
$("#welco").slideUp();
$("#hidden").slideDown();
$("#main_profile").slideDown();



})


$("#timing_question").click(function(){
$("#timing").slideDown();

$("#timing_cancel").click(function(){
$("#timing").slideUp();

});

})


$("#exams_set").click(function(){

$("#eac_score").slideDown();




})

$("#subject_cancel").click(function(){
$("#eac_score").slideUp();
$("#secret_menu").slideDown("slow");

});


$("#profi").click(function(){
$("#main_profile").slideDown();


})



$("#pro_c").click(function(){
$("#main_profile").slideUp();


})

$("#p_can").click(function(){
$("#posted").slideUp();


})


$(".bt").click(function(){
$("#hid").slideUp();
$(".bt").hide();
$(".can_bt").show();
$(".show_update").slideDown();
})

$(".can_bt").click(function(){
$("#hid").slideDown();
$(".bt").show();
$(".can_bt").hide();
$(".show_update").slideUp();


})




$(".log_for").mouseover(function(){
$(".log_for").attr("src" ,"image/logh1.png");
$(".log_for").mouseout(function(){
$(".log_for").attr("src" ,"image/logh.png");
})

});

$(".hov").mouseover(function(){
$(".hov").attr("src" ,"image/app.png");
$(".hov").mouseout(function(){
$(".hov").attr("src" ,"image/ap_r.png");
})

})


$(".hov_i").mouseover(function(){
$(".hov_i").attr("src" ,"image/mini_bt.png");
$(".hov_i").mouseout(function(){
$(".hov_i").attr("src" ,"image/mini_btt.png");
})

})



$(".hove").mouseover(function(){
$(".hove").attr("src" ,"image/app.png");
$(".hove").mouseout(function(){
$(".hove").attr("src" ,"image/ap_r.png");
})

})	
$("#permit").click(function(){
$("#permission").fadeIn("400");


})
$("#cancel").click(function(){
$("#permission").fadeOut("300");


})

$("#revok").click(function(){
$("#revoke").fadeIn("400");


})



$("#admin_ac").click(function(){
$("#revoke_admin").slideDown();


})


$("#s_s").click(function(){
$("#s_script").slideDown();


})

$("#s_can").click(function(){
$("#s_script").slideUp();


})

$("#caten").click(function(){
$("#n_cat").slideDown();


})

$("#n_canc").click(function(){
$("#n_cat").slideUp();


})

$("#cancv").click(function(){
$("#revoke_admin").slideUp();


})

$("#canc").click(function(){
$("#revoke").fadeOut("300");


})




$("#sog").click(function(){
$("#secret_menu").hide("slow");
$(".show_img").show("slow");

});
$(".show_img").click(function(){
$("#secret_menu").slideDown("slow");
$(".show_img").hide("slow");


})




})


