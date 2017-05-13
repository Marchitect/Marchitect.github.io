$(window).load(function() {

	var scrollTop = $(window).scrollTop(),
    elementOffset = $('#about').offset().top,
    distance      = (elementOffset - scrollTop);

	var htop = $('header').height();
	$('nav').css({
	 'top': htop
	});

	var ah = $('#about').height();
	$('#bounceblock1').css({
	 'height': ah
	});

});
jQuery(function ($) {
$(window).on('resize', function(){
var htop = $('header').height();
$('nav').css({
 'top': htop
});
});

$('.menu-button').click(function(){
    $("nav ul").toggle();
});

$(window).scroll(function() {

  if ($(this).scrollTop() > $('header').height() ){  
      $('nav').addClass("is-sticky");
  }
  else{
      $('nav').removeClass("is-sticky");
  }

  if ($(this).scrollTop() > $('header').height() - 50){  
      $('#bounceblock1').css(
		 'width', '0%'
	  );

	  $('#about .container').css({
	  	'opacity':'1',
	  	'padding-top':'10%'
	  });
	  $('#left').css(
	  	'opacity','0'
	  );
	  $('#right').css(
	  	'opacity','1'
	  );
  }
  else{
      $('#bounceblock1').css(
		 'width', '100%'
	  );
	  $('#about .container').css({
	  	'opacity':'0',
	  	'padding-top':'20%'
	  });
	  $('#left').css(
	  	'opacity','1'
	  );
	  $('#right').css(
	  	'opacity','0'
	  );

  }
});
})