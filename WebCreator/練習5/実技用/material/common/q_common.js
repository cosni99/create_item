// popup var
var scrWidth = screen.width;
var scrHeight = screen.height;
var panBarHeight = 185;
var panWidth = 40;
var panLeft = 20;

// popup start
var breWidth_start = 385;
var breHeight_start = scrHeight-panBarHeight;
var winName_start = "question";
var features_start = "toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width="+breWidth_start+",height="+breHeight_start+",left=0,top=0";
$("#go_question_top, #go_question_bottom").click(function(event) {
	if (window.name != winName_start) {
		if(navigator.userAgent.indexOf("Mac") != -1 & navigator.appVersion.indexOf("Safari") != -1 & navigator.appVersion.indexOf("Chrome") == -1) {
			event.preventDefault();
			var url_start = $(this).attr("href");
			window.open(url_start,"_self",features_start).focus();
		} else {
			event.preventDefault();
			var url_start = $(this).attr("href");
			window.open(url_start,winName_start,features_start).focus();
			window.open("material/html/s_close.html","_self").close();
		}
	}
});

// popup img
var breWidth_img = scrWidth-breWidth_start-panWidth;
var breHeight_img = scrHeight-panBarHeight-100;
var left_img = breWidth_start+panLeft;
var winName_img = "img";
var features_img = "toolbar=yes,location=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width="+breWidth_img+",height="+breHeight_img+",left="+left_img+",top=0";
$("#menu_img ul li a, #img_region, #img_design0, #img_design1, #img_responsive, #img_design2, #img_design2_1, #img_design2_2, #img_design3, #img_design4, #img_design5").click(function(event) {
	event.preventDefault();
	var url_img = $(this).attr("href");
	window.open(url_img,winName_img,features_img).focus();
});

// popup reference
var breWidth_ref = 330;
var breHeight_ref = breHeight_start;
var left_ref = breWidth_start+panLeft;
var winName_ref = "reference";
var features_ref = "toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width="+breWidth_ref+",height="+breHeight_ref+",left="+left_ref+",top=0";
$("#menu_reference ul li a").click(function(event) {
	event.preventDefault();
	var url_ref = $(this).attr("href");
	window.open(url_ref,winName_ref,features_ref).focus();
});

// popup note
var breWidth_note = scrWidth-breWidth_start-panWidth;
var breHeight_note = breHeight_start;
var left_note = breWidth_start+panLeft;
var winName_note = "note";
var features_note = "toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width="+breWidth_note+",height="+breHeight_note+",left="+left_note+",top=0";
$("#menu_note a").click(function(event) {
	event.preventDefault();
	var url_note = $(this).attr("href");
	window.open(url_note,winName_note,features_note).focus();
});

// popup constitution
var breWidth_con = scrWidth-breWidth_start-panWidth;
var breHeight_con = breHeight_start;
var left_con = breWidth_start+panLeft;
var winName_con = "constitution";
var features_con = "toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width="+breWidth_con+",height="+breHeight_con+",left="+left_con+",top=0";
$("#menu_constitution ul li a").click(function(event) {
	event.preventDefault();
	var url_con = $(this).attr("href");
	window.open(url_con,winName_con,features_con).focus();
});

// pull-down #menu_extra
$("#menu_extra li").css("float", "left");
$("#question #menu_extra li span").css({"cursor":"pointer"});
$("#question #menu_extra li ul").css({"display":"none","position":"absolute","z-index":"2","background-color":"#F5F5F5"});
$("#question #menu_extra li ul li").css("float", "none");
$("#question #menu_extra li ul li a").css("text-align", "left");

$("#question #menu_extra li").hover(function() {
	$(this).children("ul").show();
}, 
function() {
	$(this).children("ul").hide();
});


//tab default
$("#question #q_anchor01").addClass("selected");
$("#question #q_constitution, #question #q02, #question #q03, #question #q04, #question #q05, #question #q06").hide();
$("#question #q02_link, #question #q03_link, #question #q04_link, #question #q05_link, #question #q06_link").hide();

//position
$("#question #header_q").css({"position":"fixed","top":"0","z-index":"1"});
if(navigator.userAgent.indexOf("Mac") != -1 & navigator.appVersion.indexOf("Safari") != -1 & navigator.appVersion.indexOf("Chrome") != -1) {
	$("#question #q_area").css('top','11.5em');
} else {
	$("#question #q_area").css('top',$("#question #header_q").height());
}
$("#reference #header_r").css({"position":"fixed","top":"0","z-index":"1","width":"100%"});
$("#reference #r_area").css({"position":"relative","top":$("#reference #header_r").height()});

//tab #menu_question_chapter
var tabContainer = $("#question #q_constitution, #question #q01, #question #q02, #question #q03, #question #q04, #question #q05, #question #q06");
var secNumContainer = $("#question #q01_link, #question #q02_link, #question #q03_link, #question #q04_link, #question #q05_link, #question #q06_link");

$("#question #menu_question_chapter a").click(function () {
	tabContainer.hide();
	tabContainer.filter(this.hash).show();
	secNumContainer.hide();
	var thisName = this.hash+"_link";
	secNumContainer.filter(thisName).show();
	$("#question #menu_question_chapter a").removeClass("selected");
	$(this).addClass("selected");
	$("#question #q_area").css( 'top', $("#question #header_q").height());
	return false;
})
$("#question #q_anchor_all").click(function () {
	tabContainer.show();
	$("#question #menu_question a").removeClass("selected");
	$(this).addClass("selected");
	$("#question #q_area").css( 'top', $("#question #header_q").height());
	return false;
})

//check
$("#question input").click(function(e) {
	var t = e.target.type;
	var chk = $(this).prop("checked");
	if(t == "checkbox") {
		if(chk == true){
			$(this).parent().parent().css("background", "#949494");
		} else {
			$(this).parent().parent().css("background-color", "");
		}
	return true;
	}
});

//page scroll #menu_question_chapter
$(function(){
   $("#menu_question_chapter li a[href^=#]").click(function() {
      var speed = 0; // min
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? "html" : href);
      var position = target.offset().top-$("#question #header_q").height()-20;
      $("body,html").animate({scrollTop:position}, speed, "swing");
      return false;
   });
});

//page scroll #menu_question_section
$(function(){
   $("#menu_question_section ul li a[href^=#]").click(function() {
      var speed = 400; // min
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? "html" : href);
      var position = target.offset().top-$("#question #header_q").height()-20;
      $("body,html").animate({scrollTop:position}, speed, "swing");
      return false;
   });
});

//page scroll #reference
$(function(){
   $('#reference a[href^=#]').click(function() {
      var speed = 400; // min
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? "html" : href);
      var position = target.offset().top-$("#reference #header_r").height()-10;
      $("body,html").animate({scrollTop:position}, speed, "swing");
      return false;
   });
});

//resize
var timer = false;
$(window).resize(function() {
    if (timer !== false) {
        clearTimeout(timer);
    }
    timer = setTimeout(function() {
        console.log("resized");
		$("#question #q_area").css( "top", $("#question #nav_q").height());
		$("#reference #r_area").css( "top", $("#reference #header_r").height());
    }, 200);
});

//mac
if(navigator.userAgent.indexOf("Mac") == -1) {
	$("#start #menu_extra, #menu_note").hide();
}
