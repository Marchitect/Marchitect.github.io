$(document).ready(function () {	
	function randomColor() {
		return '#' + Math.random().toString(16).slice(2, 8);
	};

	$(".square").on("mouseenter", function () {
		$(this).css('background-color', randomColor());
		$(this).css('box-shadow', "0 0 8px white");
		$(this).css('z-index', "100000");
	});

	$(".square").on("mouseleave", function () {
		$(this).css('box-shadow', "none");
		$(this).css('z-index', "1");
	});
	
	var last, diff;
	$( ".square" ).hover(function( event ) {
	  if ( last ) {
          diff = event.timeStamp - last;
          if(diff>=3000){
              $(".square").css('background-color', 'rgba(255, 255, 255, 0)');
          }
	  }
	  last = event.timeStamp;
	});
});