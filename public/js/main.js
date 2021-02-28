$(".navbar-toggler").click(function(){
     let hasClass = $(".navbar-collapse").hasClass('show');
     if(hasClass)
     {
          $('.navbar-toggler i').removeClass('fa-times').addClass('fa-bars');
     }
     else
     {
          $('.navbar-toggler i').removeClass('fa-bars').addClass('fa-times');
     }
});

$(window).scroll(function(){
     if($(this).scrollTop() > 100)
     {
          $('.back-to-top').fadeIn('slow');
     }
     else
     {
          $('.back-to-top').fadeOut('slow');
     }
});
$(".back-to-top").click(function(){
     $('html,body').animate({
          scrollTop : 0
     });
});