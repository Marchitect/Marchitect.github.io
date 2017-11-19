// slick slider

// menu stuff
$('.menu-button').click(function(){
    $("nav ul").toggle();
});

//Xinmei's sticky navigation and About Section Scrolling Effect
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
	  	'padding-top':'7%'
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


$(document).ready(function(){
        // source: http://callmenick.com/post/single-page-site-with-smooth-scrolling-highlighted-link-and-fixed-navigation
        /**
         * This part causes smooth scrolling using scrollto.js
         * We target all a tags inside the nav, and apply the scrollto.js to it.
         */
        $("nav ul li a").click(function(evn){
            evn.preventDefault();
            $('html,body').scrollTo(this.hash, this.hash);
            console.log('clicked');
        });

        /**
         * This part handles the highlighting functionality.
         * We use the scroll functionality again, some array creation and
         * manipulation, class adding and class removing, and conditional testing
         */
        var aChildren = $("nav ul li").children(); // find the a children of the list items
        var aArray = []; // create the empty aArray
        for (var i=0; i < aChildren.length; i++) {
            var aChild = aChildren[i];
            var ahref = $(aChild).attr('href');
            aArray.push(ahref);
        } // this for loop fills the aArray with attribute href values

        $(window).scroll(function(){
            var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
            var windowHeight = $(window).height(); // get the height of the window
            var docHeight = $(document).height();

            for (var i=0; i < aArray.length; i++) {
                var theID = aArray[i];
                var divPos = $(theID).offset().top; // get the offset of the div from the top of page
                var divHeight = $(theID).height(); // get the height of the div in question
                if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
                    $("a[href='" + theID + "']").addClass("nav-active");
                } else {
                    $("a[href='" + theID + "']").removeClass("nav-active");
                }
            }

            if(windowPos + windowHeight == docHeight) {
                if (!$("nav ul li:last-child a").hasClass("nav-active")) {
                    var navActiveCurrent = $(".nav-active").attr("href");
                    $("a[href='" + navActiveCurrent + "']").removeClass("nav-active");
                    $("nav ul li:last-child a").addClass("nav-active");
                }
            }
        });
    });