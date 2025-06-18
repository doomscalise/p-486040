
// GAMBLA Theme Customizer JavaScript

(function($) {
    
    // Logo piccolo
    wp.customize('gambla_small_logo', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.site-logo img').attr('src', newval);
            } else {
                $('.site-logo img').remove();
            }
        });
    });
    
    // Altezza logo piccolo
    wp.customize('gambla_small_logo_height', function(value) {
        value.bind(function(newval) {
            $('.site-logo img').css('height', newval + 'px');
        });
    });
    
    // Footer text
    wp.customize('gambla_footer_text', function(value) {
        value.bind(function(newval) {
            $('.footer-copyright').text(newval);
        });
    });
    
    // Footer section titles
    const footerSections = ['about', 'nav', 'sport', 'community'];
    
    footerSections.forEach(function(section) {
        wp.customize('gambla_footer_' + section + '_title', function(value) {
            value.bind(function(newval) {
                $('.footer-' + section + '-title').text(newval);
            });
        });
    });
    
    // Footer about text
    wp.customize('gambla_footer_about_text', function(value) {
        value.bind(function(newval) {
            $('.footer-about-text').text(newval);
        });
    });
    
})(jQuery);
