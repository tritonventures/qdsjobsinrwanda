(function($) {
    "use strict";

    var $constrom_window = $(window);
    var THE = {};
    var plugin_track = "static/plugin/";

    $(window).on("load", function() {
        $(".loader").fadeOut();
        $("#preloder")
            .delay(200)
            .fadeOut("slow");
    });

    // ****************************
    // :: TOP Menu Active Code
    // ****************************

    $(window).on("scroll", function() {
        var scroll = $(window).scrollTop();
        if (scroll < 400) {
            $("#sticky-header").removeClass("sticky");
            $("#back-top").fadeIn(700);
        } else {
            $("#sticky-header").addClass("sticky");
            $("#back-top").fadeIn(700);
        }
    });

    // ****************************
    // :: Mobile Menu Active Code
    // ****************************

    // mobile_menu
    var menu = $("ul#navigation");
    if (menu.length) {
        menu.slicknav({
            prependTo: ".mobile_menu",
            closedSymbol: "+",
            openedSymbol: "-"
        });
    }

    $(window).on("scroll", function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 30) {
            $(".sticky").addClass("stickyadd");
        } else {
            $(".sticky").removeClass("stickyadd");
        }
    });

    $("#navbarCollapse").scrollspy({
        offset: 50
    });

    $(document).ready(function() {
        // ********************************
        // :: One Page Nav Active Code
        // ********************************

        if ($.fn.onePageNav) {
            $("#navigation").onePageNav({
                currentClass: "active",
                scrollSpeed: 1500,
                easing: "easeOutQuad"
            });
        }

        // *******************************
        // :: Animated Headline Active Code
        // ********************************
        if ($.fn.animatedHeadline) {
            $(".anima-headline").animatedHeadline({
                animationType: "scale",
                animationDelay: 2000,
                barAnimationDelay: 3000,
                barWaiting: 800,
                lettersDelay: 50,
                typeLettersDelay: 150,
                selectionDuration: 500,
                typeAnimationDelay: 1000,
                revealDuration: 600,
                revealAnimationDelay: 1500
            });
        }

        // ***********************
        // :: Scrollup Active Code
        // ***********************

        if ($.fn.scrollUp) {
            $constrom_window.scrollUp({
                scrollSpeed: 1000,
                scrollText: '<i class="bx bx-chevron-up"></i>'
            });
        }

        // :: Welcome Slides Active Code
        if ($.fn.owlCarousel) {
            var welcomeSlider = $(".hero-slider");
            welcomeSlider.owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                dots: false,
                nav: true,
                navText: [
                    '<i class="lni-chevron-left"></i>',
                    '<i class="lni-chevron-right"></i>'
                ]
            });

            welcomeSlider.on("translate.owl.carousel", function() {
                var layer = $("[data-animation]");
                layer.each(function() {
                    var anim_name = $(this).data("animation");
                    $(this)
                        .removeClass("animated " + anim_name)
                        .css("opacity", "0");
                });
            });

            $("[data-delay]").each(function() {
                var anim_del = $(this).data("delay");
                $(this).css("animation-delay", anim_del);
            });

            $("[data-duration]").each(function() {
                var anim_dur = $(this).data("duration");
                $(this).css("animation-duration", anim_dur);
            });

            welcomeSlider.on("translated.owl.carousel", function() {
                var layer = welcomeSlider
                    .find(".owl-item.active")
                    .find("[data-animation]");
                layer.each(function() {
                    var anim_name = $(this).data("animation");
                    $(this)
                        .addClass("animated " + anim_name)
                        .css("opacity", "1");
                });
            });
        }

        // ************************************
        // :: CLient Slides Active Code
        // ************************************

        if ($.fn.owlCarousel) {
            var clientArea = $(".client-silder");
            clientArea.owlCarousel({
                items: 2,
                loop: true,
                autoplay: false,
                smartSpeed: 1500,
                margin: 30,
                nav: true,
                navText: [
                    "<i class='ti-angle-left'</i>",
                    "<i class='ti-angle-right'</i>"
                ],
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    }
                }
            });
        }

        // ************************************
        // :: Work Slides Active Code
        // ************************************

        if ($.fn.owlCarousel) {
            var clientArea = $(".work-slider");
            clientArea.owlCarousel({
                items: 4,
                loop: true,
                autoplay: false,
                smartSpeed: 1500,
                margin: 15,
                nav: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 4
                    }
                }
            });
        }

        // ************************************
        // :: CLient Slides Active Code
        // ************************************

        if ($.fn.owlCarousel) {
            var clientArea2 = $(".client-silder-2");
            clientArea2.owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                smartSpeed: 1000,
                margin: 15,
                nav: true,
                navText: [
                    "<i class='ti-angle-left'</i>",
                    "<i class='ti-angle-right'</i>"
                ],
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    992: {
                        items: 1
                    }
                }
            });
        }

        // ************************************
        // :: Flexible Slides Active Code
        // ************************************

        if ($.fn.owlCarousel) {
            var flexiblesilder = $(".flexible-silder");
            flexiblesilder.owlCarousel({
                items: 6,
                loop: true,
                autoplay: true,
                smartSpeed: 1500,
                margin: 30,
                dots: false,
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3
                    },
                    768: {
                        items: 5
                    },
                    992: {
                        items: 6
                    },
                    1200: {
                        items: 6
                    }
                }
            });
        }

        // ************************************
        // :: Partner Slides Active Code
        // ************************************

        if ($.fn.owlCarousel) {
            var parnetArea = $(".partner-carousel");
            parnetArea.owlCarousel({
                items: 5,
                loop: true,
                autoplay: true,
                smartSpeed: 1500,
                margin: 30,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 5
                    }
                }
            });
        }

        // ****************************
        // :: App shot-2 slider Active Code
        // ***************************

        if ($.fn.owlCarousel) {
            var Appshot = $(".app-shot-2");
            Appshot.owlCarousel({
                items: 5,
                loop: true,
                autoplay: true,
                smartSpeed: 800,
                margin: 20,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 5
                    }
                }
            });
        }

        // ****************************
        // :: Init Isotope Active Code
        // ****************************

        var $grid = $(".grid").isotope({
            itemSelector: ".grid-item",
            percentPosition: true,
            masonry: {
                columnWidth: 1
            }
        });

        // Filter items on button click
        $(".portfolio-menu").on("click", "button", function() {
            var filterValue = $(this).attr("data-filter");
            $grid.isotope({
                filter: filterValue
            });
        });

        // For menu active class
        $(".portfolio-menu button").on("click", function(event) {
            $(this)
                .siblings(".active")
                .removeClass("active");
            $(this).addClass("active");
            event.preventDefault();
        });

        // ***************************************
        // :: 11.0 Masonary Gallery Active Code
        // ****************************************

        if ($.fn.imagesLoaded) {
            $(".reen-portfolio").imagesLoaded(function() {
                // filter items on button click
                $(".portfolio-menu").on("click", "button", function() {
                    var filterValue = $(this).attr("data-filter");
                    $grid.isotope({
                        filter: filterValue
                    });
                });
                // init Isotope
                var $grid = $(".reen-portfolio").isotope({
                    itemSelector: ".single_gallery_item",
                    percentPosition: true,
                    masonry: {
                        columnWidth: ".single_gallery_item"
                    }
                });
            });
        }

        // :: allery Menu Style Active Code
        $(".portfolio-menu button.btn").on("click", function() {
            $(".portfolio-menu button.btn").removeClass("active");
            $(this).addClass("active");
        });

        // **********************
        // :: Wow js Active Code
        // **********************

        if ($constrom_window.width() > 767) {
            new WOW().init();
        }

        // *************************
        // :: Counter Up Active Code
        // *************************

        if ($.fn.counterUp) {
            $(".counter").counterUp({
                delay: 10,
                time: 1500
            });
        }

        // *************************
        // :: Wow Aos Active Code
        // *************************
        if ($.fn.init) {
            AOS.init();
        }

        // *************************************
        // :: MagnificPopup img view Active Code
        // *************************************

        if ($.fn.magnificPopup) {
            $(".popup-image").magnificPopup({
                type: "image",
                gallery: {
                    enabled: true
                }
            });
        }

        // *************************************
        // :: magnificPopup img view Active Code
        // *************************************

        if ($.fn.magnificPopup) {
            $(".img-pop-up").magnificPopup({
                type: "image",
                gallery: {
                    enabled: true
                }
            });
        }

        // ***************************************
        // :: 10.0 Magnific-popup Video Active Code
        // ****************************************

        if ($.fn.magnificPopup) {
            $("#videobtn").magnificPopup({
                type: "iframe"
            });
            $(".gallery_img").magnificPopup({
                type: "image",
                gallery: {
                    enabled: true
                },
                removalDelay: 300,
                mainClass: "mfp-fade",
                preloader: true
            });
        }

        if ($.fn.magnificPopup) {
            $("#videobtn2").magnificPopup({
                type: "iframe"
            });
        }

        if ($.fn.magnificPopup) {
            $("#videobtn3").magnificPopup({
                type: "iframe"
            });
        }
        // ****************************
        // :: Brand Slider Active Code
        // ***************************

        $(".brand-active").owlCarousel({
            loop: true,
            margin: 30,
            items: 1,
            autoplay: true,
            nav: false,
            dots: false,
            autoplayHoverPause: true,
            autoplaySpeed: 500,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                576: {
                    items: 3
                },
                768: {
                    items: 4
                },
                992: {
                    items: 6
                }
            }
        });

        // ******************************
        // :: Project  Slider Active Code
        // ******************************

        $(".project-active").owlCarousel({
            loop: true,
            autoplay: true,
            margin: 30,
            items: 1,
            autoplay: true,
            navText: [
                '<i class="Flaticon flaticon-left-arrow"></i>',
                '<i class="Flaticon flaticon-right-arrow"></i>'
            ],
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                767: {
                    items: 1,
                    nav: false
                },
                992: {
                    items: 2,
                    nav: false
                }
            }
        });

        // ******************************
        // :: Avout Pro Slider Active Code
        // ******************************

        $(".about-pro-active").owlCarousel({
            loop: true,
            margin: 30,
            items: 1,
            autoplay: true,
            navText: [
                '<i class="Flaticon flaticon-left-arrow"></i>',
                '<i class="Flaticon flaticon-right-arrow"></i>'
            ],
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                767: {
                    items: 1,
                    nav: false
                },
                992: {
                    items: 1,
                    nav: false
                },
                1200: {
                    items: 1
                }
            }
        });
    });

    // **************************
    // :: Search Box Active Code
    // **************************

    $(".search-btn").on("click", function() {
        $(".search-form").toggleClass("search-form-active");
    });

    // ****************************
    // :: Countdown Active Code
    // ****************************
    if ($.fn.countdown) {
        $("#clock").countdown("2021/06/10", function(event) {
            $(this).html(
                event.strftime(
                    "<div>%D <span>Day</span></div> <div>%H <span>Hours</span></div> <div>%M <span>Mins</span></div> <div>%S <span>Secs</span></div>"
                )
            );
        });
    }

    // **************************
    // :: Nice Delect Active Code
    // **************************

    if (document.getElementById("default-select")) {
        $("select").niceSelect();
    }

    // *********************************
    // :: Prevent Default 'a' Click
    // *********************************
    $('a[href="#"]').on("click", function($) {
        $.preventDefault();
    });
})(jQuery);
