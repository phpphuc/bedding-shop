var Layout = function () {
    return {
        initOWL: function () {
            $(".owl-carousel1-brands").owlCarousel({
                loop: false,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                dots: false,
                autoplay: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: true
                    },
                    1200: {
                        items: 1,
                        nav: true
                    },
                    1400: {
                        items: 1,
                        nav: true
                    }
                }
            });
            
            $(".owl-carousel1-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                items: 1,
                nav: true,
            });
            
            $(".owl-carouselcn-brands").owlCarousel({
                loop: true,
                dots: true,
                autoplay: true,
                items: 1,
                nav: true,
            });

            $(".owl-carousel2-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                margin: 58,
                items: 2,
                nav: true,
            });

            $(".owl-carousel3-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                margin: 60,
                items: 3,
                nav: true,
            });
            
            $(".owl-carousel3vd-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                margin: 10,
                items: 3,
                nav: true,
            });
            
            $(".owl-carousel3").owlCarousel({
                loop: false,
                dots: false,
                autoplay: false,
                margin: 30,
                items: 3,
                nav: true,
            });
            
            $(".owl-carouselvd-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                margin: 15,
                items: 3,
                nav: true,
            });
            
            $(".owl-carousel4").owlCarousel({
                loop: false,
                dots: false,
                autoplay: false,
                margin: 30,
                items: 4,
                nav: true,
            });

            $(".owl-carousel4-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                margin: 30,
                items: 4,
                nav: true,
            });
            
            $(".owl-carouseldv-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                margin: 60,
                items: 4,
                nav: true,
            });
            
            $(".owl-carousel5-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                margin: 25,
                items: 5,
                nav: true,
            });
            
            $(".product-same-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                margin: 25,
                items: 5,
                nav: true,
            });
            
            $(".owl-carousel5").owlCarousel({
                loop: false,
                dots: false,
                autoplay: false,
                margin: 6,
                items: 5,
                nav: true,
            });
            
            $(".owl-carousel6").owlCarousel({
                loop: false,
                dots: false,
                autoplay: true,
                margin: 10,
                items: 6,
                nav: true,
            });
            
            $(".owl-carousel6-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                margin: 30,
                items: 6,
                nav: true
            });
            
            $(".owl-carousel8-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                margin: 18,
                items: 8,
                nav: true
            });
            
            $(".owl-carousel9-brands").owlCarousel({
                loop: true,
                dots: false,
                autoplay: true,
                margin: 10,
                items: 9,
                nav: true
            });
        },
    };
}();