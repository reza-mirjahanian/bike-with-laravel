
$(document).ready(function() {
  /* --------------------------------------------------------------------- */
  /* GET VIEWPORT
  /* --------------------------------------------------------------------- */
  function getViewport() {
    var e = window;
    var a = 'inner';
    if (!('innerWidth' in window)) {
      a = 'client';
      e = document.documentElement || document.body;
    }
    return {
      width: e[a + 'Width'],
      height: e[a + 'Height']
    };
  }


  /* --------------------------------------------------------------------- */
  /* THROTTLE
  /* --------------------------------------------------------------------- */
  function throttle(func, time) {
    time || (time = 250);
    var wait = false;

    return function() {
      if (!wait) {
        func.call();
        wait = true;

        setTimeout(function() {
          wait = false;
        }, time);
      }
    }
  }


  /* --------------------------------------------------------------------- */
  /* FULLHEIGHT
  /* --------------------------------------------------------------------- */
  function fullHeight(elm) {
    if (!elm.length) return;
    
    var elmHeight = elm.outerHeight();
    var viewportHeight = getViewport().height;
    var bodyHeight = $('body').outerHeight();

    if (bodyHeight <= viewportHeight) {
      if (elmHeight < viewportHeight) {
        elm.css('height', viewportHeight);
      } else {
        elm.css('height', '');
      }
    }
  }


  /* --------------------------------------------------------------------- */
  /* MAIN NAV MENU
  /* --------------------------------------------------------------------- */
  (function($) {
    if (!$('.header .main-nav').length) return;

    // superfish menu
    $('.header .main-nav .sf-menu').superfish({
      cssArrows: false
    });

    // add class: .active
    $('.header .main-nav li.active').parents('li').addClass('active');
  })(jQuery);



  /* --------------------------------------------------------------------- */
  /* FIXED ENABLED
  /* --------------------------------------------------------------------- */
  function fixedEnabled() {
    if (!$('.mv-fixed-enabled').length) return;

    var navScroll_1 = $(document).scrollTop();
    var navHeight = $('.mv-fixed-enabled').height();
    var navFixedEnabled = $('.mv-fixed-enabled').offset().top + navHeight;

    function fixNavScroll() {
      var navScroll_2 = $(document).scrollTop();

      if (navScroll_2 > navFixedEnabled) {
        $('body').addClass('fixed-nav');
        $('.mv-site').css('padding-top', navHeight);
      } else {
        $('body').removeClass('fixed-nav');
        $('.mv-site').css('padding-top', '');
      }

      if (navScroll_2 > navScroll_1) {
        $('body').removeClass('fixed-nav-appear');
      } else {
        $('body').addClass('fixed-nav-appear');
      }

      navScroll_1 = $(document).scrollTop();
    }

    function scrollTopZero() {
      if ($(document).scrollTop() == 0) {
        $('body').removeClass('fixed-nav');
        $('.mv-site').css('padding-top', '');
      }
    }

    fixNavScroll();

    $(window).on('scroll resize', throttle(fixNavScroll, 100));
    $(window).on('scroll resize', scrollTopZero);
  };

  setTimeout(function() {
    fixedEnabled();
  }, 1000);








  /* --------------------------------------------------------------------- */
  /* PARALLAX
  /* --------------------------------------------------------------------- */
  (function($) {
    if (!$('.mv-parallax').length) return;

    $('.mv-parallax').parallax({
      speed: 0.3
    });

    setTimeout(function() {
      $(window).trigger('resize').trigger('scroll');
    }, 1000);

    $('.mv-parallax').appear();

    $(document.body).on('appear', '.mv-parallax', function() {
      $(window).trigger('resize').trigger('scroll');
    });
  })(jQuery);




  /* --------------------------------------------------------------------- */
  /* FULLHEIGHT ERROR PAGE
  /* --------------------------------------------------------------------- */
  setTimeout(fullHeight($('.error-page-bg')), 500);

  $(window).on('resize', function() {
    fullHeight($('.error-page-bg'));
  });


  /* --------------------------------------------------------------------- */
  /* BACK TO TOP
  /* --------------------------------------------------------------------- */
  (function($) {
    if (!$('.mv-back-to-top').length) return;

    $(window).on('scroll', function() {
      $(this).scrollTop() > 220 ? $('.mv-back-to-top').addClass('on') : $('.mv-back-to-top').removeClass('on');
    });

    $(document.body).on('click', '.mv-back-to-top', function(event) {
      event.preventDefault();

      $('html, body').animate({
        scrollTop: 0,
        queue: false
      }, 500);

      return false;
    });
  })(jQuery);





  /* --------------------------------------------------------------------- */
  /* DATA PLACEHOLDER
  /* --------------------------------------------------------------------- */
  (function($) {
    if (!$('[data-mv-placeholder]').length) return;

    $('[data-mv-placeholder]').each(function() {
      var placeholderContent = $(this).data('mv-placeholder');
      $(this).attr('placeholder', placeholderContent);

      $(this).on('focus', function() {
        $(this).attr('placeholder', '');
      });

      $(this).on('blur', function() {
        $(this).attr('placeholder', placeholderContent);
      });
    });
  })(jQuery);


  /* --------------------------------------------------------------------- */
  /* SCRIPT DROPDOWN 1
  /* --------------------------------------------------------------------- */
  (function($) {
    if (!$('.script-dropdown-1').length) return;

    $(document.body).on('click', '.btn-dropdown', function() {
      var wrapper = $(this).closest('.script-dropdown-1');

      !wrapper.hasClass('open') ? wrapper.addClass('open') : wrapper.removeClass('open');
    });
  })(jQuery);


  /* --------------------------------------------------------------------- */
  /* SCRIPT DROPDOWN 2
  /* --------------------------------------------------------------------- */
  (function($) {
    if (!$('.script-dropdown-2').length) return;

    $(document.body).on('mouseenter', '.script-dropdown-2', function() {
      $(this).addClass('open');
    });

    $(document.body).on('mouseleave', '.script-dropdown-2', function() {
      var dropdown = $(this);

      setTimeout(function() {
        dropdown.closest('.script-dropdown-2').removeClass('open');
      }, 200);
    });
  })(jQuery);










  /* --------------------------------------------------------------------- */
  /* ONLY NUMERIC
  /* --------------------------------------------------------------------- */
  (function($) {
    if (!$('.mv-only-numeric').length) return;

    $('.mv-only-numeric').each(function() {
      $(this).on('keypress', function (e) {
        if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
      });
    });    
  })(jQuery);





  /* --------------------------------------------------------------------- */
  /* POST MANSORY
  /* --------------------------------------------------------------------- */
  (function($) {
    if (!$('.mv-post-mansory-wrapper').length) return;

    $('.mv-post-mansory-wrapper').each(function() {
      $(this).isotope({
        itemSelector: '.mv-post-mansory-item'
      });
    });
  })(jQuery);

  /* --------------------------------------------------------------------- */
  /* Color picker
  /* --------------------------------------------------------------------- */
  (function($) {
    $("#color").spectrum({
      showPaletteOnly: true,
      showPalette:true,
      allowEmpty:true,
      hideAfterPaletteSelect:true,
      //color: $('#color').val(),
      palette: [
        ['black', 'white', 'blanchedalmond',
          'rgb(255, 128, 0);', 'hsv 100 70 50'],
        ['red', 'yellow', 'green', 'blue', 'violet']
      ]
    });
    $('#clear_color').on('click',function(){

      //$("#custom").val('');
      $("#color").spectrum("set", '');
    });



  })(jQuery);




  /* --------------------------------------------------------------------- */
  /* SLIDER RANGE
  /* --------------------------------------------------------------------- */
  (function($) {

      //price slider init
      var wrapper =  $('#mv-slider-range-price');
      var sliderRange = wrapper.find('.slider-range');
      var minPrice = wrapper.find('.min-value');
      var maxPrice = wrapper.find('.max-value');
      var minPriceInput = wrapper.find('#min_price');
      var maxPriceInput = wrapper.find('#max_price');




      sliderRange.slider({
        range: true,
        step: 100,
        min: 100,
        max: 100000,
        values : [minPriceInput.val(), maxPriceInput.val()],
        slide: function (event, ui) {
          //console.log(minPriceInput);
          //console.log(maxPriceInput);
          minPrice.text(ui.values[0]);
          minPriceInput.val(ui.values[0]);
          maxPrice.text(ui.values[1]);
          maxPriceInput.val(ui.values[1]);

        }
      });

      minPrice.text(sliderRange.slider('values', 0));
      maxPrice.text(sliderRange.slider('values', 1));

    //
    //Weight slider init
    var wrapper =  $('#mv-slider-range-weight');
    var sliderRange = wrapper.find('.slider-range');
    var minWeight = wrapper.find('.min-value');
    var maxWeight = wrapper.find('.max-value');
    var minWeightInput = wrapper.find('#min_weight');
    var maxWeightInput = wrapper.find('#max_weight');

    sliderRange.slider({
      range: true,
      step: 10,
      min: 50,
      max: 30000,
      values : [minWeightInput.val(), maxWeightInput.val()],
      slide: function (event, ui) {

        minWeight.text(ui.values[0]);
        minWeightInput.val(ui.values[0]);
        maxWeight.text(ui.values[1]);
        maxWeightInput.val(ui.values[1]);

      }
    });

    minWeight.text(sliderRange.slider('values', 0));
    maxWeight.text(sliderRange.slider('values', 1));

  })(jQuery);


  /* --------------------------------------------------------------------- */
  /* APPEAR
  /* --------------------------------------------------------------------- */
  (function($) {
    if (!$('.mv-animated').length) return;

    $('.mv-animated').appear();

    $(document.body).on('appear', '.mv-animated', function() {
      $(this).addClass('go');
    });

    $(document.body).on('disappear', '.mv-animated', function() {
      $(this).removeClass('go');
    });
  })(jQuery);










  /* --------------------------------------------------------------------- */
  /* RESIZE HEIGHT
  /* --------------------------------------------------------------------- */
  (function($) {
    if (!$('[data-mv-resize-height]').length) return;

    $('[data-mv-resize-height]').each(function() {
      var height = $(this).data('mv-resize-height');

      $(this).on('click', function() {
        $(this).css({
          'max-height': height
        });
      });
    });
  })(jQuery);











});

