(function($) {
    'use strict';

    $(window).on('load', edgtfOnWindowLoad);

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
        edgtfElementorInitAccordions();
        edgtfElementorBanner();
        edgtfElementorInitBlogListMasonry();
        edgtfElementorInitBlogSlider();
        edgtfElementorButton();
        edgtfElementorInitCountdown();
        edgtfElementorInitCounter();
        edgtfElementorCustomFont();
        edgtfElementorShowGoogleMap();
        edgtfElementorIcon();
        edgtfElementorIconWithText();
        edgtfElementorInitImageGallery();
        edgtfElementorInitMessages();
        edgtfElementorItemShowcase();
        edgtfElementorInitPieChart();
        edgtfElementorInitPieChartDoughnut();
        edgtfElementorInitProgressBars();
        edgtElementorProjectPresentationSlider();
        edgtfElementorReservationFormDatePicker();
        edgtfElementorInitShopListMasonry();
        edgtfElementorInitTabs();
        edgtfElementorIconList();
        qodefElementorVideoButton();
        edgtfElementorInitGiveSlider();
        edgtfElementorInitCarousels();
        edgtfElementorInitEvents();
        edgtfElementorInitMasonryGallery();
        edgtfElementorInitPortfolioList();
        edgtfElementorInitPortfolioSlider();
        edgtfElementorInitTestimonials();
    }


    function edgtfElementorInitAccordions(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_accordion.default', function() {
                edgtf.modules.shortcodes.edgtfInitAccordions();
            } );
        });
    }

    function edgtfElementorBanner(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_banner.default', function() {
                edgtf.modules.shortcodes.edgtfBanner();
            } );
        });
    }

    function edgtfElementorInitBlogListMasonry(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_blog_list.default', function() {
                edgtf.modules.shortcodes.edgtfInitBlogListMasonry();
            } );
        });
    }

    function edgtfElementorInitBlogSlider(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_blog_slider.default', function() {
                edgtf.modules.shortcodes.edgtfInitBlogSlider();
            } );
        });
    }

    function edgtfElementorButton(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_button.default', function() {
                edgtf.modules.shortcodes.edgtfButton().init();
            } );
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_call_to_action.default', function() {
                edgtf.modules.shortcodes.edgtfButton().init();
            } );
        });
    }

    function edgtfElementorInitCountdown(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_countdown.default', function() {
                edgtf.modules.shortcodes.edgtfInitCountdown();
            } );
        });
    }

    function edgtfElementorInitCounter(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_counter.default', function() {
                edgtf.modules.shortcodes.edgtfInitCounter();
            } );
        });
    }

    function edgtfElementorCustomFont(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_custom_font.default', function() {
                edgtf.modules.shortcodes.edgtfCustomFontResize();
                edgtf.modules.shortcodes.edgtfCustomFontTypeOut();
            } );
        });
    }

    function edgtfElementorShowGoogleMap(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_google_map.default', function() {
                edgtf.modules.shortcodes.edgtfShowGoogleMap();
            } );
        });
    }

    function edgtfElementorIcon(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_icon.default', function() {
                edgtf.modules.shortcodes.edgtfIcon().init();
            } );
        });
    }

    function edgtfElementorIconWithText(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_icon_with_text.default', function() {
                edgtf.modules.shortcodes.edgtfIcon().init();
            } );
        });
    }

    function edgtfElementorInitImageGallery(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_image_gallery.default', function() {
                edgtf.modules.shortcodes.edgtfInitImageGallery();
                edgtf.modules.shortcodes.edgtfInitImageGalleryMasonry();
            } );
        });
    }

    function edgtfElementorItemShowcase(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_item_showcase.default', function() {
                edgtf.modules.shortcodes.edgtfItemShowcase();
            } );
        });
    }

    function edgtfElementorInitMessages(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_message.default', function() {
                edgtf.modules.shortcodes.edgtfInitMessages();
                edgtf.modules.shortcodes.edgtfInitMessageHeight();
            } );
        });
    }

    function edgtfElementorInitPieChart(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_pie_chart.default', function() {
                edgtf.modules.shortcodes.edgtfInitPieChart();
            } );

            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_pie_chart_with_icon.default', function() {
                edgtf.modules.shortcodes.edgtfInitPieChart();
            } );
        });
    }

    function edgtfElementorInitPieChartDoughnut(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_pie_chart_doughnut.default', function() {
                edgtf.modules.shortcodes.edgtfInitPieChartDoughnut();
            } );

            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_pie_chart_pie.default', function() {
                edgtf.modules.shortcodes.edgtfInitPieChartDoughnut();
            } );
        });
    }

    function edgtfElementorInitProgressBars(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_progress_bar.default', function() {
                edgtf.modules.shortcodes.edgtfInitProgressBars();
            } );
        });

        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_cause_list.default', function() {
                edgtf.modules.shortcodes.edgtfInitProgressBars();

            } );
        });
    }

    function edgtElementorProjectPresentationSlider(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_project_presentation.default', function() {
                edgtf.modules.shortcodes.edgtfProjectPresentationSlider();
            } );
        });
    }

    function edgtfElementorReservationFormDatePicker(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_reservation_form.default', function() {
                edgtf.modules.shortcodes.edgtfReservationFormDatePicker();
            } );
        });
    }

    function edgtfElementorInitShopListMasonry(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_shop_masonry.default', function() {
                edgtf.modules.shortcodes.edgtfInitShopListMasonry();
            } );
        });
    }

    function edgtfElementorInitTabs(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_tabs.default', function() {
                edgtf.modules.shortcodes.edgtfInitTabs();
                edgtf.modules.shortcodes.edgtfInitTabIcons();
            } );
        });
    }

    function edgtfElementorIconList(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_unordered_list.default', function() {
                edgtf.modules.shortcodes.edgtfInitIconList().init();
            } );
        });
    }

    function qodefElementorVideoButton(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_video_button.default', function() {
                edgtf.modules.common.edgtfPrettyPhoto();
            } );
        });
    }

    function edgtfElementorInitGiveSlider(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_cause_slider.default', function() {
                edgtf.modules.shortcodes.edgtfInitGiveSlider();
                edgtf.modules.shortcodes.edgtfInitProgressBars();
            } );
        });
    }

    function edgtfElementorInitCarousels(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_carousel.default', function() {
                edgtf.modules.shortcodes.edgtfInitCarousels();
            } );
        });
    }

    function edgtfElementorInitEvents(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_event_list.default', function() {
                edgtf.modules.events.edgtfTitleFullWidthResize();
                edgtf.modules.events.edgtfTitleFullWidthResize();
                edgtf.modules.events.edgtfEventAppearFx();
                edgtf.modules.events.edgtfInitEventListCarousel();
            } );
        });
    }

    function edgtfElementorInitMasonryGallery(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_masonry_gallery.default', function() {
                edgtf.modules.shortcodes.edgtfInitMasonryGallery();
            } );
        });
    }

    function edgtfElementorInitPortfolioList(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_portfolio_list.default', function() {
                edgtf.modules.shortcodes.edgtfInitPortfolioListMasonry();
                edgtf.modules.shortcodes.edgtfInitPortfolioListPinterest();
                edgtf.modules.shortcodes.edgtfInitPortfolio();
                edgtf.modules.shortcodes.edgtfInitPortfolioMasonryFilter();
                edgtf.modules.shortcodes.edgtfInitPortfolioLoadMore();
            } );
        });
    }

    function edgtfElementorInitPortfolioSlider(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_portfolio_slider.default', function() {
                edgtf.modules.shortcodes.edgtfInitPortfolioSlider();
            } );
        });
    }

    function edgtfElementorInitTestimonials(){
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/edgtf_testimonials.default', function() {
                edgtf.modules.shortcodes.edgtfInitTestimonials();
            } );
        });
    }

})(jQuery);