$(document).ready(function(){

// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 300) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 300);
			return false;
		});
	});
////////////////////////////////800



}); // конец ready 


/////////////////////////////////////////////////////////////////////

$(document).ready(function() {
  $('a.myLinkModal').click( function(event){
    event.preventDefault();
    $('#myOverlay').fadeIn(297, function(){
      $('#myModal') 
      .css('display', 'block')
      .animate({opacity: 1}, 198);
    });
  });

  $('#myModal__close, #myOverlay').click( function(){
    $('#myModal').animate({opacity: 0}, 198,
      function(){
        $(this).css('display', 'none');
        $('#myOverlay').fadeOut(297);
    });
  });
});