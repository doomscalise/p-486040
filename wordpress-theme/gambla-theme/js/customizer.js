
/**
 * Customizer Live Preview Script
 */
(function($) {
    'use strict';

    // Site title
    wp.customize('blogname', function(value) {
        value.bind(function(newval) {
            $('.site-logo').text(newval);
        });
    });

    // Hero title
    wp.customize('gambla_hero_title', function(value) {
        value.bind(function(newval) {
            $('.hero-title').text(newval);
        });
    });

    // Hero subtitle
    wp.customize('gambla_hero_subtitle', function(value) {
        value.bind(function(newval) {
            $('.hero-subtitle').text(newval);
        });
    });

    // Blog title
    wp.customize('gambla_blog_title', function(value) {
        value.bind(function(newval) {
            $('.blog-page-title').text(newval);
        });
    });

    // Blog description
    wp.customize('gambla_blog_description', function(value) {
        value.bind(function(newval) {
            $('.blog-page-description').text(newval);
        });
    });

    // Colors
    wp.customize('gambla_primary_color', function(value) {
        value.bind(function(newval) {
            updateCustomCSS();
        });
    });

    wp.customize('gambla_secondary_color', function(value) {
        value.bind(function(newval) {
            updateCustomCSS();
        });
    });

    // Fonts
    wp.customize('gambla_primary_font', function(value) {
        value.bind(function(newval) {
            updateCustomCSS();
        });
    });

    wp.customize('gambla_display_font', function(value) {
        value.bind(function(newval) {
            updateCustomCSS();
        });
    });

    // Update CSS variables
    function updateCustomCSS() {
        var primaryColor = wp.customize('gambla_primary_color')();
        var secondaryColor = wp.customize('gambla_secondary_color')();
        var primaryFont = wp.customize('gambla_primary_font')();
        var displayFont = wp.customize('gambla_display_font')();

        var css = ':root {';
        css += '--gambla-primary: ' + primaryColor + ';';
        css += '--gambla-secondary: ' + secondaryColor + ';';
        css += '--font-primary: "' + primaryFont + '", sans-serif;';
        css += '--font-display: "' + displayFont + '", sans-serif;';
        css += '}';

        // Remove existing custom CSS and add new
        $('#gambla-customizer-css').remove();
        $('head').append('<style type="text/css" id="gambla-customizer-css">' + css + '</style>');
    }

})(jQuery);
