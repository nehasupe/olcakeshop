$(function() {
	$(window).scroll(function() {
		var wscroll=$(window).scrollTop();
  	if(wscroll > 100) {
    	$('nav').addClass("shrink");
    }
    else {
    $('nav').removeClass("shrink");
    
    }
  });
});
