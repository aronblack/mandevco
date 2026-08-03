$(document).ready(function(){
    // Our Blog Slider
    $('.blog-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows:false,
        prevArrow: '<div class="slick-prev"><i class="far fa-chevron-left" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next"><i class="far fa-chevron-right" aria-hidden="true"></i></div>',
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              arrows:true,
            }
          },
          {
            breakpoint: 421,
            settings: {
                slidesToShow: 1,
                arrows:true,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
    });

    // News  Slider
    $('.news-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows:true,
        prevArrow: '<div class="slick-prev"><i class="far fa-chevron-left" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next"><i class="far fa-chevron-right" aria-hidden="true"></i></div>',
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              arrows:true,
            }
          },
          {
            breakpoint: 421,
            settings: {
                slidesToShow: 1,
                arrows:true,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
    });


    // Header Navigation
    $('.menu-icon').click(function () {
      $('.header-inner .menu-header-menu-container,.header-inner .menu-header-menu-fr-container').slideToggle();
    })

    // mobile add class

    $(window).on('load resize', function () { 
      if (screen.width <= 767) {
        $('body').addClass('mobile-screen');
      }else{
        $('body').removeClass('mobile-screen');
      }
    });
	
	 $(' .menu li.menu-item-has-children').click(function () {
		 if (screen.width <= 767) {
	        $(this).children('ul').slideToggle();
		 }
    	})

    
    
  
});