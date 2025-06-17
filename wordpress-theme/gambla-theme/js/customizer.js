
/**
 * Enhanced Customizer Live Preview Script
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
            $('.hero-title, .hero-text h1').text(newval);
        });
    });

    // Hero subtitle
    wp.customize('gambla_hero_subtitle', function(value) {
        value.bind(function(newval) {
            $('.hero-subtitle, .hero-text p').first().text(newval);
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

    // Sports section
    wp.customize('gambla_sports_title', function(value) {
        value.bind(function(newval) {
            $('.sports-section-title').text(newval);
        });
    });

    wp.customize('gambla_sports_subtitle', function(value) {
        value.bind(function(newval) {
            $('.sports-section-subtitle').text(newval);
        });
    });

    // Individual sports
    for (let i = 1; i <= 6; i++) {
        wp.customize(`gambla_sport_${i}_icon`, function(value) {
            value.bind(function(newval) {
                $(`.sport-icon-item:nth-child(${i}) .sport-icon`).text(newval);
            });
        });

        wp.customize(`gambla_sport_${i}_name`, function(value) {
            value.bind(function(newval) {
                $(`.sport-icon-item:nth-child(${i}) h3`).text(newval);
            });
        });

        wp.customize(`gambla_sport_${i}_description`, function(value) {
            value.bind(function(newval) {
                $(`.sport-icon-item:nth-child(${i}) p`).text(newval);
            });
        });

        wp.customize(`gambla_sport_${i}_show`, function(value) {
            value.bind(function(newval) {
                if (newval) {
                    $(`.sport-icon-item:nth-child(${i})`).show();
                } else {
                    $(`.sport-icon-item:nth-child(${i})`).hide();
                }
            });
        });
    }

    // Team section
    wp.customize('gambla_team_title', function(value) {
        value.bind(function(newval) {
            $('.team-section-title').text(newval);
        });
    });

    wp.customize('gambla_team_subtitle', function(value) {
        value.bind(function(newval) {
            $('.team-section-subtitle').text(newval);
        });
    });

    // Values section
    wp.customize('gambla_values_title', function(value) {
        value.bind(function(newval) {
            $('.values-section-title').text(newval);
        });
    });

    // Individual values
    for (let i = 1; i <= 4; i++) {
        wp.customize(`gambla_value_${i}_icon`, function(value) {
            value.bind(function(newval) {
                $(`.value-item:nth-child(${i}) .sport-icon`).text(newval);
            });
        });

        wp.customize(`gambla_value_${i}_title`, function(value) {
            value.bind(function(newval) {
                $(`.value-item:nth-child(${i}) h3`).text(newval);
            });
        });

        wp.customize(`gambla_value_${i}_description`, function(value) {
            value.bind(function(newval) {
                $(`.value-item:nth-child(${i}) p`).text(newval);
            });
        });
    }

    // Newsletter section
    wp.customize('gambla_newsletter_title', function(value) {
        value.bind(function(newval) {
            $('.newsletter-page-title').text(newval);
        });
    });

    wp.customize('gambla_newsletter_subtitle', function(value) {
        value.bind(function(newval) {
            $('.newsletter-page-subtitle').text(newval);
        });
    });

    // Newsletter benefits
    for (let i = 1; i <= 6; i++) {
        wp.customize(`gambla_newsletter_benefit_${i}_icon`, function(value) {
            value.bind(function(newval) {
                $(`.newsletter-benefit:nth-child(${i}) .benefit-icon`).text(newval);
            });
        });

        wp.customize(`gambla_newsletter_benefit_${i}_title`, function(value) {
            value.bind(function(newval) {
                $(`.newsletter-benefit:nth-child(${i}) h3`).text(newval);
            });
        });

        wp.customize(`gambla_newsletter_benefit_${i}_description`, function(value) {
            value.bind(function(newval) {
                $(`.newsletter-benefit:nth-child(${i}) p`).text(newval);
            });
        });

        wp.customize(`gambla_newsletter_benefit_${i}_show`, function(value) {
            value.bind(function(newval) {
                if (newval) {
                    $(`.newsletter-benefit:nth-child(${i})`).show();
                } else {
                    $(`.newsletter-benefit:nth-child(${i})`).hide();
                }
            });
        });
    }

    // Footer
    wp.customize('gambla_footer_text', function(value) {
        value.bind(function(newval) {
            $('.footer-copyright').text(newval);
        });
    });

    wp.customize('gambla_footer_about_title', function(value) {
        value.bind(function(newval) {
            $('.footer-about-title').text(newval);
        });
    });

    wp.customize('gambla_footer_about_text', function(value) {
        value.bind(function(newval) {
            $('.footer-about-text').text(newval);
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

    wp.customize('gambla_background_color', function(value) {
        value.bind(function(newval) {
            updateCustomCSS();
        });
    });

    wp.customize('gambla_text_color', function(value) {
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

    wp.customize('gambla_base_font_size', function(value) {
        value.bind(function(newval) {
            updateCustomCSS();
        });
    });

    wp.customize('gambla_header_height', function(value) {
        value.bind(function(newval) {
            updateCustomCSS();
        });
    });

    // Update CSS variables
    function updateCustomCSS() {
        var primaryColor = wp.customize('gambla_primary_color')();
        var secondaryColor = wp.customize('gambla_secondary_color')();
        var backgroundColor = wp.customize('gambla_background_color')();
        var textColor = wp.customize('gambla_text_color')();
        var primaryFont = wp.customize('gambla_primary_font')();
        var displayFont = wp.customize('gambla_display_font')();
        var baseFontSize = wp.customize('gambla_base_font_size')();
        var headerHeight = wp.customize('gambla_header_height')();

        var css = ':root {';
        css += '--gambla-primary: ' + primaryColor + ';';
        css += '--gambla-secondary: ' + secondaryColor + ';';
        css += '--gambla-dark: ' + backgroundColor + ';';
        css += '--gambla-gray: ' + adjustBrightness(backgroundColor, 20) + ';';
        css += '--text-color: ' + textColor + ';';
        css += '--font-primary: "' + primaryFont + '", sans-serif;';
        css += '--font-display: "' + displayFont + '", sans-serif;';
        css += '--base-font-size: ' + baseFontSize + 'px;';
        css += '--header-height: ' + headerHeight + 'px;';
        css += '}';
        css += 'body { background-color: ' + backgroundColor + '; color: ' + textColor + '; font-size: ' + baseFontSize + 'px; }';
        css += '.site-header { height: ' + headerHeight + 'px; }';
        css += '.hero-section, .page-hero { padding-top: ' + (parseInt(headerHeight) + 20) + 'px; }';

        // Remove existing custom CSS and add new
        $('#gambla-customizer-css').remove();
        $('head').append('<style type="text/css" id="gambla-customizer-css">' + css + '</style>');
    }

    // Helper function to adjust brightness
    function adjustBrightness(hex, percent) {
        hex = hex.replace('#', '');
        var r = parseInt(hex.substr(0, 2), 16);
        var g = parseInt(hex.substr(2, 2), 16);
        var b = parseInt(hex.substr(4, 2), 16);
        
        r = Math.min(255, Math.max(0, r + (percent * 255 / 100)));
        g = Math.min(255, Math.max(0, g + (percent * 255 / 100)));
        b = Math.min(255, Math.max(0, b + (percent * 255 / 100)));
        
        return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
    }

})(jQuery);
