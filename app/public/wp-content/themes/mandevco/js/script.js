(function ($) {
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
    var $menuToggle = $('.menu-icon');
    var $menuContainers = $('.header-inner .menu-header-menu-container,.header-inner .menu-header-menu-fr-container');
    var $submenuLinks = $('.header-inner .menu-item-has-children > a');

    function isMobileNavigation() {
      return window.matchMedia('(max-width: 767px)').matches;
    }

    function setMenuState(isOpen, moveFocus) {
      $menuToggle.attr('aria-expanded', isOpen ? 'true' : 'false');

      if (isOpen) {
        $menuContainers.stop(true, true).slideDown(200).attr('aria-hidden', 'false');
        if (moveFocus) {
          $menuContainers.find('a').first().trigger('focus');
        }
      } else {
        $menuContainers.stop(true, true).slideUp(200).attr('aria-hidden', 'true');
        $submenuLinks.attr('aria-expanded', 'false').siblings('ul').stop(true, true).slideUp(200);
      }
    }

    $menuToggle.on('click', function () {
      setMenuState($(this).attr('aria-expanded') !== 'true', true);
    });

    $(document).on('keydown', function (event) {
      if (event.key === 'Escape' && $menuToggle.attr('aria-expanded') === 'true') {
        setMenuState(false, false);
        $menuToggle.trigger('focus');
      }
    });

    $submenuLinks.attr({
      'aria-haspopup': 'true',
      'aria-expanded': 'false'
    });

    $submenuLinks.on('click', function (event) {
      if (!isMobileNavigation() || $(this).attr('aria-expanded') === 'true') {
        return;
      }

      event.preventDefault();
      $submenuLinks.not(this).attr('aria-expanded', 'false').siblings('ul').stop(true, true).slideUp(200);
      $(this).attr('aria-expanded', 'true').siblings('ul').first().stop(true, true).slideDown(200);
    });

    $submenuLinks.on('keydown', function (event) {
      if (!isMobileNavigation() || (event.key !== ' ' && event.key !== 'Escape')) {
        return;
      }

      var $link = $(this);
      var $submenu = $link.siblings('ul').first();

      if (event.key === 'Escape') {
        $submenu.stop(true, true).slideUp(200);
        $link.attr('aria-expanded', 'false').trigger('focus');
        return;
      }

      event.preventDefault();
      var isOpen = $link.attr('aria-expanded') === 'true';
      $submenu.stop(true, true).slideToggle(200);
      $link.attr('aria-expanded', isOpen ? 'false' : 'true');
    });

    // mobile add class

    $(window).on('load resize', function () { 
      if (isMobileNavigation()) {
        $('body').addClass('mobile-screen');
        if ($menuToggle.attr('aria-expanded') !== 'true') {
          $menuContainers.hide().attr('aria-hidden', 'true');
        }
      }else{
        $('body').removeClass('mobile-screen');
        $menuToggle.attr('aria-expanded', 'false');
        $menuContainers.show().removeAttr('aria-hidden');
        $submenuLinks.attr('aria-expanded', 'false').siblings('ul').removeAttr('style');
      }
    });
});
})(jQuery);