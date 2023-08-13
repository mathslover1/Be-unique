$(document).ready(function() {

  $('.color-choose input').on('click', function() {
      var watchcolor = $(this).attr('data-image');

      $('.active').removeClass('active');
      $('.left-column img[data-image = ' + watchcolor + ']').addClass('active');
      $(this).addClass('active');
  });

});
