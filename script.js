function toggle_visibility(id) {
    var e = document.getElementById(id);
    
    if(e.style.display == 'block') {
       //die verzögerung ist nötig da man sonst keine links öffnen kann
       var meinTimeout = setTimeout(function() {
          e.style.display = 'none';
        }, 200);
       document.getElementById(id+'Content').blur();
    } else if(e.style.display == 'none') {
      e.style.display = 'block';
      document.getElementById(id+'Content').focus();
    }
}

// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

$(function(){
  $('.search-form-icon').click(function(){
      if (!$('.search-form-wrapper').hasClass('active');) {
        $('.search-form-wrapper').addClass('active');
        $(this).html('<i class="fas fa-times"></i>');
      }else{
        $('.search-form-wrapper').removeClass('active');
        $(this).html('<i class="fas fa-search"></i>');
      }
  });

});