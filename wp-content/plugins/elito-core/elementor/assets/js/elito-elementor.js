/*
Template Name: Elito
Author: wpoceans
Version: 1.0
*/

(function ($) {
  "use strict";

  /*----- ELEMENTOR LOAD FUNTION CALL ---*/

  $(window).on("elementor/frontend/init", function () {
    var swiper_slide = function () {
      // SLIDER
      var menu = [];
      jQuery(".swiper-slide").each(function (index) {
        menu.push(jQuery(this).find(".slide-inner").attr("data-text"));
      });
      var interleaveOffset = 0.5;
      var swiperOptions = {
        loop: true,
        speed: 1000,
        parallax: true,
        autoplay: {
          delay: 6500,
          disableOnInteraction: false,
        },

        watchSlidesProgress: true,

        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },

        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },

        on: {
          progress: function () {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              var slideProgress = swiper.slides[i].progress;
              var innerOffset = swiper.width * interleaveOffset;
              var innerTranslate = slideProgress * innerOffset;
              swiper.slides[i].querySelector(".slide-inner").style.transform =
                "translate3d(" + innerTranslate + "px, 0, 0)";
            }
          },

          touchStart: function () {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = "";
            }
          },

          setTransition: function (speed) {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = speed + "ms";
              swiper.slides[i].querySelector(".slide-inner").style.transition =
                speed + "ms";
            }
          },
        },
      };

      var swiper = new Swiper(".swiper-container", swiperOptions);
    }; // end

    // sliderBgSetting

    var sliderBgSetting = function () {
      // DATA BACKGROUND IMAGE
      var sliderBgSetting = $(".slide-bg-image");
      sliderBgSetting.each(function (indx) {
        if ($(this).attr("data-background")) {
          $(this).css(
            "background-image",
            "url(" + $(this).data("background") + ")"
          );
        }
      });
    }; // end

    var hero_client_slider = function () {
      /*------------------------------------------
        = Client SLIDER
      -------------------------------------------*/
      if ($(".wpo-happy-client-slide").length) {
        $(".wpo-happy-client-slide").owlCarousel({
          autoplay: true,
          smartSpeed: 300,
          margin: 0,
          loop: true,
          autoplayHoverPause: true,
          dots: false,
          nav: false,
          items: 4,
        });
      }
    }; // end

    var service_slider = function () {
      /*------------------------------------------
        = Testimonial SLIDER
        -------------------------------------------*/
      if ($(".wpo-service-slider").length) {
        $(".wpo-service-slider").owlCarousel({
          autoplay: false,
          smartSpeed: 300,
          margin: 20,
          loop: true,
          autoplayHoverPause: true,
          dots: true,
          nav: false,
          responsive: {
            0: {
              items: 1,
              dots: true,
              nav: false,
            },

            500: {
              items: 1,
              dots: true,
              nav: false,
            },

            768: {
              items: 2,
            },

            1200: {
              items: 3,
            },

            1400: {
              items: 4,
            },
          },
        });
      }
    }; // end

    var portfolio_slider = function () {
      /*------------------------------------------
        = Testimonial SLIDER
        -------------------------------------------*/
      if ($(".project-active").length) {
        $(".project-active").owlCarousel({
          autoplay: false,
          smartSpeed: 300,
          margin: 60,
          loop: true,
          autoplayHoverPause: true,
          dots: false,
          nav: true,
          navText: [
            '<i class="ti-arrow-left"></i>',
            '<i class="ti-arrow-right"></i>',
          ],
          responsive: {
            0: {
              items: 1,
              nav: false,
            },

            500: {
              items: 1,
              nav: false,
            },

            768: {
              items: 2,
            },

            1200: {
              items: 3,
            },

            1400: {
              items: 3,
            },
          },
        });
      }
    }; // end

    var portfolio_gallery = function () {
      function sortingGallery() {
        if ($(".sortable-gallery .gallery-filters").length) {
          var $container = $(".gallery-container");
          $container.isotope({
            filter: "*",
            animationOptions: {
              duration: 750,
              easing: "linear",
              queue: false,
            },
          });

          $(".gallery-filters li a").on("click", function () {
            $(".gallery-filters li .current").removeClass("current");
            $(this).addClass("current");
            var selector = $(this).attr("data-filter");
            $container.isotope({
              filter: selector,
              animationOptions: {
                duration: 750,
                easing: "linear",
                queue: false,
              },
            });
            return false;
          });
        }
      }

      sortingGallery();
    }; // end

    var testimonials_slider = function () {
      /*------------------------------------------
        = Testimonial SLIDER
        -------------------------------------------*/
      if ($(".testimonials-wrapper").length) {
        $(".testimonials-wrapper").owlCarousel({
          autoplay: false,
          smartSpeed: 300,
          margin: 40,
          loop: true,
          autoplayHoverPause: true,
          dots: false,
          nav: false,
          responsive: {
            0: {
              items: 1,
            },

            500: {
              items: 1,
            },

            768: {
              items: 2,
            },

            1200: {
              items: 2,
            },

            1400: {
              items: 2,
            },
          },
        });
      }
    }; // end

    var project_single_slider = function () {
      /*------------------------------------------
        = wpo-project-single-main-img
        -------------------------------------------*/
      if ($(".wpo-project-single-main-img".length)) {
        $(".wpo-project-single-main-img").owlCarousel({
          mouseDrag: false,
          smartSpeed: 500,
          margin: 30,
          loop: true,
          nav: true,
          navText: [
            '<i class="fi ti-arrow-left"></i>',
            '<i class="fi ti-arrow-right"></i>',
          ],
          dots: false,
          items: 1,
        });
      }
    }; // end

    var odometer = function () {
      /*------------------------------------------
        = FUNFACT
        -------------------------------------------*/
      if ($(".odometer").length) {
        $(".odometer").appear();
        $(document.body).on("appear", ".odometer", function (e) {
          var odo = $(".odometer");
          odo.each(function () {
            var countNumber = $(this).attr("data-count");
            $(this).html(countNumber);
          });
        });
      }
    }; // end

    var team_slider = function () {
      /*------------------------------------------
        = TEAM SLIDER
        -------------------------------------------*/
      if ($(".team-slider").length) {
        $(".team-slider").owlCarousel({
          autoplay: false,
          smartSpeed: 300,
          margin: 0,
          loop: true,
          autoplayHoverPause: true,
          dots: false,
          nav: true,
          navText: [
            '<i class="fi flaticon-back"></i>',
            '<i class="fi flaticon-next-1"></i>',
          ],
          responsive: {
            0: {
              items: 1,
            },

            600: {
              items: 2,
            },

            768: {
              items: 3,
            },

            1200: {
              items: 4,
            },
          },
        });
      }
    }; // end

    var partners_slider = function () {
      if ($(".clents-slider").length) {
        $(".clents-slider").owlCarousel({
          loop: true,
          margin: 0,
          nav: false,
          dots: false,
          autoplay: true,
          smartSpeed: 1200,
          autoplayHoverPause: true,
          responsive: {
            0: {
              items: 1,
            },
            600: {
              items: 3,
            },
            1000: {
              items: 6,
            },
          },
        });
      }
    }; // end

    var carousel_slider = function () {
      /*------------------------------------------
        static-hero-slide-img SLIDER
        -------------------------------------------*/
      if ($(".static-hero-slide-img").length) {
        $(".static-hero-slide-img").owlCarousel({
          autoplay: true,
          smartSpeed: 300,
          margin: 10,
          loop: true,
          autoplayHoverPause: true,
          dots: true,
          arrows: false,
          nav: true,
          navText: [
            '<i class="ti-arrow-left"></i>',
            '<i class="ti-arrow-right"></i>',
          ],
          responsive: {
            0: {
              items: 1,
              dots: true,
              arrows: false,
              nav: false,
            },

            575: {
              items: 1,
            },
            767: {
              items: 1,
              dots: false,
            },

            992: {
              items: 2,
              dots: false,
            },

            1200: {
              items: 3,
            },
          },
        });
      }
    }; // end

    var project_slider = function () {
      /*------------------------------------------
        wpo-project-slide
        -------------------------------------------*/
      if ($(".wpo-project-slide").length) {
        $(".wpo-project-slide").owlCarousel({
          autoplay: true,
          smartSpeed: 300,
          margin: 30,
          items: 3,
          loop: true,
          autoplayHoverPause: true,
          dots: false,
          arrows: true,
          navText: [
            '<i class="fi ti-arrow-left"></i>',
            '<i class="fi ti-arrow-right"></i>',
          ],
          nav: false,
          responsive: {
            0: {
              items: 1,
              dots: true,
              arrows: false,
              nav: false,
            },

            575: {
              items: 1,
            },
            767: {
              items: 2,
            },

            992: {
              items: 3,
            },

            1200: {
              items: 3,
            },
          },
        });
      }
    }; // end

    var testimonial = function () {
      /*------------------------------------------
            = Testimonial slider 1
        -------------------------------------------*/
      if ($(".wpo-testimonial-wrap").length) {
        $(".slider-for").slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          fade: true,
          asNavFor: ".slider-nav",
        });
        $(".slider-nav").slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          asNavFor: ".slider-for",
          focusOnSelect: true,
          dots: true,
        });
      }
    }; // end

    var blog_slide = function () {
      /*------------------------------------------
        = wpo-blog-slide 
        -------------------------------------------*/
      if ($(".wpo-blog-slide").length) {
        $(".wpo-blog-slide").owlCarousel({
          smartSpeed: 300,
          margin: 30,
          loop: false,
          autoplayHoverPause: true,
          dots: false,
          nav: true,
          navText: [
            '<i class="fi flaticon-left-arrow" aria-hidden="true"></i>',
            '<i class="fi flaticon-right-arrow" aria-hidden="true"></i>',
          ],
          autoplay: true,
          responsive: {
            0: {
              items: 1,
              nav: false,
            },

            500: {
              items: 1,
              nav: false,
            },

            768: {
              items: 2,
            },

            1200: {
              items: 3,
            },

            1400: {
              items: 3,
            },
          },
        });
      }
    }; // end

    //Hero Client Slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_hero.default",
      function ($scope, $) {
        hero_client_slider();
      }
    );

    //Slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_slider.default",
      function ($scope, $) {
        swiper_slide();
      }
    );

    //sliderBgSetting
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_slider.default",
      function ($scope, $) {
        sliderBgSetting();
      }
    );

    //carousel_slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-Elito_carousel_slider.default",
      function ($scope, $) {
        carousel_slider();
      }
    );

    //service_slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_service.default",
      function ($scope, $) {
        service_slider();
      }
    );

    //portfolio_slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_project.default",
      function ($scope, $) {
        portfolio_slider();
      }
    );

    //portfolio_gallery
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_portfolio.default",
      function ($scope, $) {
        portfolio_gallery();
      }
    );

    //project_single_slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_gallery.default",
      function ($scope, $) {
        project_single_slider();
      }
    );

    //team_slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_team.default",
      function ($scope, $) {
        team_slider();
      }
    );

    //testimonial
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_testimonial.default",
      function ($scope, $) {
        testimonial();
      }
    );

    //odometer
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_funfact.default",
      function ($scope, $) {
        odometer();
      }
    );

    //partners_slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_client.default",
      function ($scope, $) {
        partners_slider();
      }
    );

    //project_slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_project.default",
      function ($scope, $) {
        project_slider();
      }
    );

    //blog_slide
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpo-elito_blog.default",
      function ($scope, $) {
        blog_slide();
      }
    );
  });
})(jQuery);
