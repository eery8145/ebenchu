// JavaScript Document
$(document).ready(function(){
	var bodyWidth = $(document.body).width();
	var leftWidth = $(".left").width();
	var bodyHeight = $(window).height();
	$(".right").width(bodyWidth-leftWidth);
	$(".left1").height(bodyHeight-130);
	$(".right1").height(bodyHeight-130);
	$(window).resize(function(){
	   	var bodyWidth = $(document.body).width();
		var leftWidth = $(".left").width();
		var bodyHeight = $(window).height();
		$(".right").width(bodyWidth-leftWidth);
		$(".left1").height(bodyHeight-130);
		$(".right1").height(bodyHeight-130);
	});
});