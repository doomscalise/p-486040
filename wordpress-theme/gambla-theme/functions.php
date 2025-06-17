<?php
/**
 * Gambla Theme Functions
 *
 * @package Gambla
 */

// Theme setup
if (!function_exists('gambla_setup')) :
    function gambla_setup() {
        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(825, 510, true);

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        // Switch default core markup for search form, comment form, and comments
        // to output valid HTML5.
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for custom logo.
        add_theme_support('custom-logo', array(
            'height' => 100,
            'width' => 400,
            'flex-width' => true,
        ));

        // Register navigation menus.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'gambla'),
            'social' => __('Social Menu', 'gambla'),
        ));
    }
endif;
add_action('after_setup_theme', 'gambla_setup');

// Set the content width in pixels, based on the theme's design and stylesheet.
function gambla_content_width() {
    $GLOBALS['content_width'] = apply_filters('gambla_content_width', 840);
}
add_action('after_setup_theme', 'gambla_content_width', 0);

// Enqueue scripts and styles.
function gambla_scripts() {
    // Load our main stylesheet.
    wp_enqueue_style('gambla-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // Enqueue custom JavaScript file.
    wp_enqueue_script('gambla-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);

    // Load the html5shiv.
    wp_enqueue_script('gambla-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3');
    wp_script_add_data('gambla-html5', 'conditional', 'lt IE 9');

    // Customizer script
    wp_enqueue_script('gambla-customizer', get_template_directory_uri() . '/js/customizer.js', array('jquery', 'customize-preview'), null, true);
}
add_action('wp_enqueue_scripts', 'gambla_scripts');

// Register widget area.
function gambla_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'gambla'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'gambla'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer 1', 'gambla'),
        'id' => 'footer-1',
        'description' => __('Add widgets here to appear in your footer.', 'gambla'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer 2', 'gambla'),
        'id' => 'footer-2',
        'description' => __('Add widgets here to appear in your footer.', 'gambla'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer 3', 'gambla'),
        'id' => 'footer-3',
        'description' => __('Add widgets here to appear in your footer.', 'gambla'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'gambla_widgets_init');

// Custom excerpt length
function gambla_excerpt($length) {
    return wp_trim_words(get_the_excerpt(), $length, '...');
}

// Reading time function
function gambla_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    
    return $reading_time . ' min read';
}

// Add custom image sizes
add_image_size('gambla-card', 600, 400, true);

function gambla_customize_register($wp_customize) {
    // Layout Settings
    $wp_customize->add_section('gambla_layout', array(
        'title' => 'Layout & Dimensioni',
        'priority' => 30,
    ));

    // Logo piccolo
    $wp_customize->add_setting('gambla_small_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'gambla_small_logo', array(
        'label' => 'Logo Piccolo (max 60px altezza)',
        'section' => 'gambla_layout',
        'settings' => 'gambla_small_logo',
        'description' => 'Logo piccolo per header, ottimale 150x60px'
    )));

    // Dimensione logo piccolo
    $wp_customize->add_setting('gambla_small_logo_height', array(
        'default' => 40,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_small_logo_height', array(
        'label' => 'Altezza Logo Piccolo (px)',
        'section' => 'gambla_layout',
        'type' => 'range',
        'input_attrs' => array(
            'min' => 20,
            'max' => 80,
            'step' => 5,
        ),
    ));

    // Altezza header
    $wp_customize->add_setting('gambla_header_height', array(
        'default' => 80,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_header_height', array(
        'label' => 'Altezza Header (px)',
        'section' => 'gambla_layout',
        'type' => 'range',
        'input_attrs' => array(
            'min' => 60,
            'max' => 120,
            'step' => 5,
        ),
    ));

    // Dimensioni immagini post
    $wp_customize->add_setting('gambla_post_image_height', array(
        'default' => 200,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_post_image_height', array(
        'label' => 'Altezza Immagini Articoli (px)',
        'section' => 'gambla_layout',
        'type' => 'range',
        'input_attrs' => array(
            'min' => 150,
            'max' => 300,
            'step' => 10,
        ),
    ));

    // Colors
    $wp_customize->add_section('gambla_colors', array(
        'title' => 'Colori',
        'priority' => 35,
    ));

    // Primary color
    $wp_customize->add_setting('gambla_primary_color', array(
        'default' => '#007bff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_primary_color', array(
        'label' => 'Colore Primario',
        'section' => 'gambla_colors',
        'settings' => 'gambla_primary_color',
    )));

    // Secondary color
    $wp_customize->add_setting('gambla_secondary_color', array(
        'default' => '#6c757d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_secondary_color', array(
        'label' => 'Colore Secondario',
        'section' => 'gambla_colors',
        'settings' => 'gambla_secondary_color',
    )));

    // Background color
    $wp_customize->add_setting('gambla_background_color', array(
        'default' => '#343a40',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_background_color', array(
        'label' => 'Colore Sfondo',
        'section' => 'gambla_colors',
        'settings' => 'gambla_background_color',
    )));

    // Text color
    $wp_customize->add_setting('gambla_text_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_text_color', array(
        'label' => 'Colore Testo',
        'section' => 'gambla_colors',
        'settings' => 'gambla_text_color',
    )));

    // Typography
    $wp_customize->add_section('gambla_typography', array(
        'title' => 'Tipografia',
        'priority' => 40,
    ));

    // Font primario
    $wp_customize->add_setting('gambla_primary_font', array(
        'default' => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_primary_font', array(
        'label' => 'Font Primario',
        'section' => 'gambla_typography',
        'type' => 'select',
        'choices' => array(
            'Inter' => 'Inter',
            'Open Sans' => 'Open Sans',
            'Roboto' => 'Roboto',
            'Lato' => 'Lato',
            'Montserrat' => 'Montserrat',
            'Poppins' => 'Poppins',
            'Source Sans Pro' => 'Source Sans Pro'
        ),
    ));

    // Font display
    $wp_customize->add_setting('gambla_display_font', array(
        'default' => 'Playfair Display',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_display_font', array(
        'label' => 'Font Titoli',
        'section' => 'gambla_typography',
        'type' => 'select',
        'choices' => array(
            'Playfair Display' => 'Playfair Display',
            'Merriweather' => 'Merriweather',
            'Georgia' => 'Georgia',
            'Times New Roman' => 'Times New Roman',
            'Oswald' => 'Oswald',
            'Bebas Neue' => 'Bebas Neue',
            'Anton' => 'Anton'
        ),
    ));

    // Dimensione font base
    $wp_customize->add_setting('gambla_base_font_size', array(
        'default' => 16,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_base_font_size', array(
        'label' => 'Dimensione Font Base (px)',
        'section' => 'gambla_typography',
        'type' => 'range',
        'input_attrs' => array(
            'min' => 14,
            'max' => 20,
            'step' => 1,
        ),
    ));

    // Homepage Settings
    $wp_customize->add_section('gambla_homepage', array(
        'title' => 'Homepage',
        'priority' => 50,
    ));

    // Hero title
    $wp_customize->add_setting('gambla_hero_title', array(
        'default' => 'Accendi la Tua Passione Sportiva',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_hero_title', array(
        'label' => 'Titolo Hero',
        'section' => 'gambla_homepage',
        'type' => 'text',
    ));

    // Hero subtitle
    $wp_customize->add_setting('gambla_hero_subtitle', array(
        'default' => 'Unisciti alla community sportiva più dinamica d\'Italia. Notizie live, fantacalcio, discussioni accese e contenuti esclusivi ti aspettano.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_hero_subtitle', array(
        'label' => 'Sottotitolo Hero',
        'section' => 'gambla_homepage',
        'type' => 'textarea',
    ));

    // Sports Section
    $wp_customize->add_setting('gambla_sports_title', array(
        'default' => 'I Nostri Sport',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_sports_title', array(
        'label' => 'Titolo Sezione Sport',
        'section' => 'gambla_homepage',
        'type' => 'text',
    ));

    $wp_customize->add_setting('gambla_sports_subtitle', array(
        'default' => 'Copertura completa per tutti gli sport che ami',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_sports_subtitle', array(
        'label' => 'Sottotitolo Sezione Sport',
        'section' => 'gambla_homepage',
        'type' => 'text',
    ));

    // Individual sports
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("gambla_sport_{$i}_show", array(
            'default' => true,
            'sanitize_callback' => 'wp_validate_boolean',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control("gambla_sport_{$i}_show", array(
            'label' => "Mostra Sport {$i}",
            'section' => 'gambla_homepage',
            'type' => 'checkbox',
        ));

        $wp_customize->add_setting("gambla_sport_{$i}_icon", array(
            'default' => $i == 1 ? '⚽' : ($i == 2 ? '🏀' : ($i == 3 ? '🎾' : ($i == 4 ? '🏈' : ($i == 5 ? '🏐' : '🏓')))),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control("gambla_sport_{$i}_icon", array(
            'label' => "Icona Sport {$i}",
            'section' => 'gambla_homepage',
            'type' => 'text',
        ));

        $wp_customize->add_setting("gambla_sport_{$i}_name", array(
            'default' => $i == 1 ? 'Calcio' : ($i == 2 ? 'Basket' : ($i == 3 ? 'Tennis' : ($i == 4 ? 'Football' : ($i == 5 ? 'Volley' : 'Ping Pong')))),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control("gambla_sport_{$i}_name", array(
            'label' => "Nome Sport {$i}",
            'section' => 'gambla_homepage',
            'type' => 'text',
        ));

        $wp_customize->add_setting("gambla_sport_{$i}_description", array(
            'default' => 'Notizie e analisi complete',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control("gambla_sport_{$i}_description", array(
            'label' => "Descrizione Sport {$i}",
            'section' => 'gambla_homepage',
            'type' => 'text',
        ));
    }

    // Blog Settings
    $wp_customize->add_section('gambla_blog', array(
        'title' => 'Blog',
        'priority' => 60,
    ));

    // Blog title
    $wp_customize->add_setting('gambla_blog_title', array(
        'default' => 'Il Blog di GAMBLA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_blog_title', array(
        'label' => 'Titolo Pagina Blog',
        'section' => 'gambla_blog',
        'type' => 'text',
    ));

    // Blog description
    $wp_customize->add_setting('gambla_blog_description', array(
        'default' => 'Analisi, pronostici e tutto quello che devi sapere sul mondo dello sport',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_blog_description', array(
        'label' => 'Descrizione Pagina Blog',
        'section' => 'gambla_blog',
        'type' => 'textarea',
    ));

    // Chi Siamo Settings
    $wp_customize->add_section('gambla_about', array(
        'title' => 'Chi Siamo',
        'priority' => 70,
    ));

    // Team section
    $wp_customize->add_setting('gambla_team_title', array(
        'default' => 'Il Nostro Team',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_team_title', array(
        'label' => 'Titolo Sezione Team',
        'section' => 'gambla_about',
        'type' => 'text',
    ));

    $wp_customize->add_setting('gambla_team_subtitle', array(
        'default' => 'Professionisti appassionati di sport',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_team_subtitle', array(
        'label' => 'Sottotitolo Sezione Team',
        'section' => 'gambla_about',
        'type' => 'text',
    ));

    // Values section
    $wp_customize->add_setting('gambla_values_title', array(
        'default' => 'I Nostri Valori',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_values_title', array(
        'label' => 'Titolo Sezione Valori',
        'section' => 'gambla_about',
        'type' => 'text',
    ));

    // Individual values
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("gambla_value_{$i}_icon", array(
            'default' => $i == 1 ? '🎯' : ($i == 2 ? '⚡' : ($i == 3 ? '🏆' : '❤️')),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control("gambla_value_{$i}_icon", array(
            'label' => "Icona Valore {$i}",
            'section' => 'gambla_about',
            'type' => 'text',
        ));

        $wp_customize->add_setting("gambla_value_{$i}_title", array(
            'default' => $i == 1 ? 'Precisione' : ($i == 2 ? 'Velocità' : ($i == 3 ? 'Eccellenza' : 'Passione')),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control("gambla_value_{$i}_title", array(
            'label' => "Titolo Valore {$i}",
            'section' => 'gambla_about',
            'type' => 'text',
        ));

        $wp_customize->add_setting("gambla_value_{$i}_description", array(
            'default' => 'Descrizione del valore',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control("gambla_value_{$i}_description", array(
            'label' => "Descrizione Valore {$i}",
            'section' => 'gambla_about',
            'type' => 'text',
        ));
    }

    // Newsletter Settings
    $wp_customize->add_section('gambla_newsletter', array(
        'title' => 'Newsletter',
        'priority' => 80,
    ));

    // Newsletter title
    $wp_customize->add_setting('gambla_newsletter_title', array(
        'default' => 'Non Perdere Nemmeno una Notizia',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_newsletter_title', array(
        'label' => 'Titolo Newsletter',
        'section' => 'gambla_newsletter',
        'type' => 'text',
    ));

    // Newsletter subtitle
    $wp_customize->add_setting('gambla_newsletter_subtitle', array(
        'default' => 'Iscriviti alla nostra newsletter per ricevere le ultime news direttamente nella tua email',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_newsletter_subtitle', array(
        'label' => 'Sottotitolo Newsletter',
        'section' => 'gambla_newsletter',
        'type' => 'text',
    ));

    // Newsletter benefits
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_show", array(
            'default' => $i <= 3,
            'sanitize_callback' => 'wp_validate_boolean',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_show", array(
            'label' => "Mostra Benefit {$i}",
            'section' => 'gambla_newsletter',
            'type' => 'checkbox',
        ));

        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_icon", array(
            'default' => $i == 1 ? '📧' : ($i == 2 ? '⚡' : ($i == 3 ? '🎯' : '📊')),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_icon", array(
            'label' => "Icona Benefit {$i}",
            'section' => 'gambla_newsletter',
            'type' => 'text',
        ));

        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_title", array(
            'default' => $i == 1 ? 'News Esclusive' : ($i == 2 ? 'Aggiornamenti Istantanei' : ($i == 3 ? 'Analisi Approfondite' : 'Statistiche')),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_title", array(
            'label' => "Titolo Benefit {$i}",
            'section' => 'gambla_newsletter',
            'type' => 'text',
        ));

        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_description", array(
            'default' => 'Ricevi contenuti esclusivi',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_description", array(
            'label' => "Descrizione Benefit {$i}",
            'section' => 'gambla_newsletter',
            'type' => 'text',
        ));
    }

    // Footer Settings
    $wp_customize->add_section('gambla_footer', array(
        'title' => 'Footer',
        'priority' => 90,
    ));

    // Copyright text
    $wp_customize->add_setting('gambla_footer_text', array(
        'default' => '© 2024 GAMBLA. Tutti i diritti riservati.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_footer_text', array(
        'label' => 'Testo Copyright',
        'section' => 'gambla_footer',
        'type' => 'text',
    ));

    // About section in footer
    $wp_customize->add_setting('gambla_footer_about_title', array(
        'default' => 'GAMBLA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_footer_about_title', array(
        'label' => 'Titolo Sezione About Footer',
        'section' => 'gambla_footer',
        'type' => 'text',
    ));

    $wp_customize->add_setting('gambla_footer_about_text', array(
        'default' => 'La tua fonte principale per notizie sportive, fantacalcio e community.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('gambla_footer_about_text', array(
        'label' => 'Testo Sezione About Footer',
        'section' => 'gambla_footer',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'gambla_customize_register');

// Custom CSS output
function gambla_custom_css() {
    ?>
    <style type="text/css">
        :root {
            --gambla-primary: <?php echo get_theme_mod('gambla_primary_color', '#007bff'); ?>;
            --gambla-secondary: <?php echo get_theme_mod('gambla_secondary_color', '#6c757d'); ?>;
            --gambla-dark: <?php echo get_theme_mod('gambla_background_color', '#343a40'); ?>;
            --gambla-gray: <?php echo adjust_brightness(get_theme_mod('gambla_background_color', '#343a40'), 20); ?>;
            --text-color: <?php echo get_theme_mod('gambla_text_color', '#fff'); ?>;
            --font-primary: "<?php echo get_theme_mod('gambla_primary_font', 'Inter'); ?>", sans-serif;
            --font-display: "<?php echo get_theme_mod('gambla_display_font', 'Playfair Display'); ?>", sans-serif;
            --base-font-size: <?php echo get_theme_mod('gambla_base_font_size', 16); ?>px;
            --header-height: <?php echo get_theme_mod('gambla_header_height', 80); ?>px;
        }
        body {
            background-color: <?php echo get_theme_mod('gambla_background_color', '#343a40'); ?>;
            color: <?php echo get_theme_mod('gambla_text_color', '#fff'); ?>;
            font-size: <?php echo get_theme_mod('gambla_base_font_size', 16); ?>px;
        }
        .site-header {
            height: <?php echo get_theme_mod('gambla_header_height', 80); ?>px;
        }
        .hero-section, .page-hero {
            padding-top: <?php echo intval(get_theme_mod('gambla_header_height', 80)) + 20; ?>px;
        }
        .post-image {
            height: <?php echo get_theme_mod('gambla_post_image_height', 200); ?>px;
            object-fit: cover;
        }
    </style>
    <?php
}
add_action('wp_head', 'gambla_custom_css');

// Helper function to adjust brightness
function adjust_brightness($hex, $percent) {
    $hex = str_replace('#', '', $hex);
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    
    $r = min(255, max(0, round($r + ($percent * 255 / 100))));
    $g = min(255, max(0, round($g + ($percent * 255 / 100))));
    $b = min(255, max(0, round($b + ($percent * 255 / 100))));
    
    return "#" . sprintf('%02x%02x%02x', $r, $g, $b);
}
