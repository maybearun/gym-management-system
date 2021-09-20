$(function () {

    $(window).on('scroll', function() {
        if($(window).scrollTop() > 10 ) {
            $('.navbar').addclass('active');
        } else {
            $('.navbar').removeclass('active');
        }
      });
      
});