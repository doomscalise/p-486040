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
    // ============ LAYOUT SETTINGS ============
    $wp_customize->add_section('gambla_layout', array(
        'title'    => __('Layout e Dimensioni', 'gambla'),
        'priority' => 30,
    ));

    // Header Height
    $wp_customize->add_setting('gambla_header_height', array(
        'default'           => 80,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_header_height', array(
        'label'    => __('Altezza Header (px)', 'gambla'),
        'section'  => 'gambla_layout',
        'type'     => 'range',
        'input_attrs' => array(
            'min'  => 60,
            'max'  => 150,
            'step' => 5,
        ),
    ));

    // Small Logo Height
    $wp_customize->add_setting('gambla_small_logo_height', array(
        'default'           => 40,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_small_logo_height', array(
        'label'    => __('Altezza Logo Piccolo (px)', 'gambla'),
        'section'  => 'gambla_layout',
        'type'     => 'range',
        'input_attrs' => array(
            'min'  => 20,
            'max'  => 80,
            'step' => 5,
        ),
    ));

    // Post Image Height
    $wp_customize->add_setting('gambla_post_image_height', array(
        'default'           => 250,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_post_image_height', array(
        'label'    => __('Altezza Immagini Post (px)', 'gambla'),
        'section'  => 'gambla_layout',
        'type'     => 'range',
        'input_attrs' => array(
            'min'  => 150,
            'max'  => 400,
            'step' => 10,
        ),
    ));

    // ============ COLORS ============
    $wp_customize->add_section('gambla_colors', array(
        'title'    => __('Colori GAMBLA', 'gambla'),
        'priority' => 40,
    ));

    // Primary Color
    $wp_customize->add_setting('gambla_primary_color', array(
        'default'           => '#FF00FF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_primary_color', array(
        'label'    => __('Colore Primario (Magenta)', 'gambla'),
        'section'  => 'gambla_colors',
    )));

    // Secondary Color
    $wp_customize->add_setting('gambla_secondary_color', array(
        'default'           => '#FF6600',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_secondary_color', array(
        'label'    => __('Colore Secondario (Arancione)', 'gambla'),
        'section'  => 'gambla_colors',
    )));

    // Background Color
    $wp_customize->add_setting('gambla_background_color', array(
        'default'           => '#0a0a0a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_background_color', array(
        'label'    => __('Colore Sfondo', 'gambla'),
        'section'  => 'gambla_colors',
    )));

    // Text Color
    $wp_customize->add_setting('gambla_text_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_text_color', array(
        'label'    => __('Colore Testo', 'gambla'),
        'section'  => 'gambla_colors',
    )));

    // ============ TYPOGRAPHY ============
    $wp_customize->add_section('gambla_typography', array(
        'title'    => __('Tipografia', 'gambla'),
        'priority' => 50,
    ));

    // Primary Font
    $wp_customize->add_setting('gambla_primary_font', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_primary_font', array(
        'label'    => __('Font Primario', 'gambla'),
        'section'  => 'gambla_typography',
        'type'     => 'select',
        'choices'  => array(
            'Inter'         => 'Inter',
            'Roboto'        => 'Roboto',
            'Open Sans'     => 'Open Sans',
            'Lato'          => 'Lato',
            'Poppins'       => 'Poppins',
            'Source Sans Pro' => 'Source Sans Pro',
        ),
    ));

    // Display Font
    $wp_customize->add_setting('gambla_display_font', array(
        'default'           => 'Montserrat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_display_font', array(
        'label'    => __('Font Titoli', 'gambla'),
        'section'  => 'gambla_typography',
        'type'     => 'select',
        'choices'  => array(
            'Montserrat'    => 'Montserrat',
            'Oswald'        => 'Oswald',
            'Playfair Display' => 'Playfair Display',
            'Merriweather'  => 'Merriweather',
            'Nunito'        => 'Nunito',
            'Raleway'       => 'Raleway',
        ),
    ));

    // Base Font Size
    $wp_customize->add_setting('gambla_base_font_size', array(
        'default'           => 16,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_base_font_size', array(
        'label'    => __('Dimensione Font Base (px)', 'gambla'),
        'section'  => 'gambla_typography',
        'type'     => 'range',
        'input_attrs' => array(
            'min'  => 12,
            'max'  => 24,
            'step' => 1,
        ),
    ));

    // ============ HOMEPAGE SETTINGS ============
    $wp_customize->add_section('gambla_homepage', array(
        'title'    => __('Homepage', 'gambla'),
        'priority' => 60,
    ));

    // Hero Title
    $wp_customize->add_setting('gambla_hero_title', array(
        'default'           => 'Ultimi Articoli GAMBLA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_hero_title', array(
        'label'    => __('Titolo Hero', 'gambla'),
        'section'  => 'gambla_homepage',
        'type'     => 'text',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('gambla_hero_subtitle', array(
        'default'           => 'Le notizie più fresche dal mondo dello sport',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_hero_subtitle', array(
        'label'    => __('Sottotitolo Hero', 'gambla'),
        'section'  => 'gambla_homepage',
        'type'     => 'textarea',
    ));

    // ============ BLOG SETTINGS ============
    $wp_customize->add_section('gambla_blog', array(
        'title'    => __('Pagina Blog', 'gambla'),
        'priority' => 70,
    ));

    // Blog Title
    $wp_customize->add_setting('gambla_blog_title', array(
        'default'           => 'Il Blog di GAMBLA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_blog_title', array(
        'label'    => __('Titolo Pagina Blog', 'gambla'),
        'section'  => 'gambla_blog',
        'type'     => 'text',
    ));

    // Blog Description
    $wp_customize->add_setting('gambla_blog_description', array(
        'default'           => 'Analisi, pronostici e tutto quello che devi sapere sul mondo dello sport',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_blog_description', array(
        'label'    => __('Descrizione Pagina Blog', 'gambla'),
        'section'  => 'gambla_blog',
        'type'     => 'textarea',
    ));

    // ============ SPORTS SECTION ============
    $wp_customize->add_section('gambla_sports', array(
        'title'    => __('Sezione Sport', 'gambla'),
        'priority' => 80,
    ));

    // Sports Title
    $wp_customize->add_setting('gambla_sports_title', array(
        'default'           => 'I Nostri Sport',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_sports_title', array(
        'label'    => __('Titolo Sezione Sport', 'gambla'),
        'section'  => 'gambla_sports',
        'type'     => 'text',
    ));

    // Sports Subtitle
    $wp_customize->add_setting('gambla_sports_subtitle', array(
        'default'           => 'Copertura completa per tutti gli sport che ami',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_sports_subtitle', array(
        'label'    => __('Sottotitolo Sezione Sport', 'gambla'),
        'section'  => 'gambla_sports',
        'type'     => 'textarea',
    ));

    // Individual Sports
    $sports_defaults = array(
        array('icon' => '⚽', 'name' => 'Calcio', 'description' => 'Serie A, Champions League e molto altro'),
        array('icon' => '🏀', 'name' => 'Basket', 'description' => 'NBA, Serie A e competizioni internazionali'),
        array('icon' => '🎾', 'name' => 'Tennis', 'description' => 'ATP, WTA e tutti i tornei del Grande Slam'),
        array('icon' => '🏐', 'name' => 'Volley', 'description' => 'Campionati italiani e competizioni europee'),
        array('icon' => '🏊', 'name' => 'Nuoto', 'description' => 'Mondiali, Europei e competizioni olimpiche'),
        array('icon' => '🚴', 'name' => 'Ciclismo', 'description' => 'Giro d\'Italia, Tour de France e classiche')
    );

    for ($i = 1; $i <= 6; $i++) {
        $default = $sports_defaults[$i-1];
        
        // Show/Hide Sport
        $wp_customize->add_setting("gambla_sport_{$i}_show", array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control("gambla_sport_{$i}_show", array(
            'label'    => sprintf(__('Mostra Sport %d', 'gambla'), $i),
            'section'  => 'gambla_sports',
            'type'     => 'checkbox',
        ));

        // Sport Icon
        $wp_customize->add_setting("gambla_sport_{$i}_icon", array(
            'default'           => $default['icon'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control("gambla_sport_{$i}_icon", array(
            'label'    => sprintf(__('Icona Sport %d', 'gambla'), $i),
            'section'  => 'gambla_sports',
            'type'     => 'text',
        ));

        // Sport Name
        $wp_customize->add_setting("gambla_sport_{$i}_name", array(
            'default'           => $default['name'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control("gambla_sport_{$i}_name", array(
            'label'    => sprintf(__('Nome Sport %d', 'gambla'), $i),
            'section'  => 'gambla_sports',
            'type'     => 'text',
        ));

        // Sport Description
        $wp_customize->add_setting("gambla_sport_{$i}_description", array(
            'default'           => $default['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control("gambla_sport_{$i}_description", array(
            'label'    => sprintf(__('Descrizione Sport %d', 'gambla'), $i),
            'section'  => 'gambla_sports',
            'type'     => 'textarea',
        ));
    }

    // ============ TEAM SECTION ============
    $wp_customize->add_section('gambla_team', array(
        'title'    => __('Sezione Team', 'gambla'),
        'priority' => 90,
    ));

    // Team Title
    $wp_customize->add_setting('gambla_team_title', array(
        'default'           => 'Il Nostro Team',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_team_title', array(
        'label'    => __('Titolo Sezione Team', 'gambla'),
        'section'  => 'gambla_team',
        'type'     => 'text',
    ));

    // Team Subtitle
    $wp_customize->add_setting('gambla_team_subtitle', array(
        'default'           => 'I professionisti che rendono possibile GAMBLA',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_team_subtitle', array(
        'label'    => __('Sottotitolo Sezione Team', 'gambla'),
        'section'  => 'gambla_team',
        'type'     => 'textarea',
    ));

    // ============ VALUES SECTION ============
    $wp_customize->add_section('gambla_values', array(
        'title'    => __('I Nostri Valori', 'gambla'),
        'priority' => 100,
    ));

    // Values Title
    $wp_customize->add_setting('gambla_values_title', array(
        'default'           => 'I Nostri Valori',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_values_title', array(
        'label'    => __('Titolo Sezione Valori', 'gambla'),
        'section'  => 'gambla_values',
        'type'     => 'text',
    ));

    // Individual Values
    $values_defaults = array(
        array('icon' => '🎯', 'title' => 'Precisione', 'description' => 'Analisi accurate e pronostici affidabili'),
        array('icon' => '⚡', 'title' => 'Velocità', 'description' => 'Notizie in tempo reale e aggiornamenti istantanei'),
        array('icon' => '🤝', 'title' => 'Community', 'description' => 'Una comunità unita dalla passione sportiva'),
        array('icon' => '🏆', 'title' => 'Eccellenza', 'description' => 'Standard elevati in tutto quello che facciamo')
    );

    for ($i = 1; $i <= 4; $i++) {
        $default = $values_defaults[$i-1];
        
        // Value Icon
        $wp_customize->add_setting("gambla_value_{$i}_icon", array(
            'default'           => $default['icon'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control("gambla_value_{$i}_icon", array(
            'label'    => sprintf(__('Icona Valore %d', 'gambla'), $i),
            'section'  => 'gambla_values',
            'type'     => 'text',
        ));

        // Value Title
        $wp_customize->add_setting("gambla_value_{$i}_title", array(
            'default'           => $default['title'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control("gambla_value_{$i}_title", array(
            'label'    => sprintf(__('Titolo Valore %d', 'gambla'), $i),
            'section'  => 'gambla_values',
            'type'     => 'text',
        ));

        // Value Description
        $wp_customize->add_setting("gambla_value_{$i}_description", array(
            'default'           => $default['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control("gambla_value_{$i}_description", array(
            'label'    => sprintf(__('Descrizione Valore %d', 'gambla'), $i),
            'section'  => 'gambla_values',
            'type'     => 'textarea',
        ));
    }

    // ============ NEWSLETTER SECTION ============
    $wp_customize->add_section('gambla_newsletter', array(
        'title'    => __('Newsletter', 'gambla'),
        'priority' => 110,
    ));

    // Newsletter Title
    $wp_customize->add_setting('gambla_newsletter_title', array(
        'default'           => 'Iscriviti alla Newsletter GAMBLA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_newsletter_title', array(
        'label'    => __('Titolo Newsletter', 'gambla'),
        'section'  => 'gambla_newsletter',
        'type'     => 'text',
    ));

    // Newsletter Subtitle
    $wp_customize->add_setting('gambla_newsletter_subtitle', array(
        'default'           => 'Non perdere le ultime notizie sportive e i migliori consigli per il fantacalcio',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_newsletter_subtitle', array(
        'label'    => __('Sottotitolo Newsletter', 'gambla'),
        'section'  => 'gambla_newsletter',
        'type'     => 'textarea',
    ));

    // Newsletter Benefits
    $benefits_defaults = array(
        array('icon' => '📰', 'title' => 'News Esclusive', 'description' => 'Accesso prioritario alle notizie più importanti'),
        array('icon' => '⚽', 'title' => 'Consigli Fantacalcio', 'description' => 'Tips settimanali per dominare la tua lega'),
        array('icon' => '📊', 'title' => 'Analisi Approfondite', 'description' => 'Report dettagliati su giocatori e squadre'),
        array('icon' => '🎯', 'title' => 'Pronostici Esperti', 'description' => 'Previsioni accurate per ogni partita'),
        array('icon' => '💬', 'title' => 'Community Privata', 'description' => 'Accesso al gruppo esclusivo degli iscritti'),
        array('icon' => '🏆', 'title' => 'Contest Riservati', 'description' => 'Partecipa ai tornei solo per gli abbonati')
    );

    for ($i = 1; $i <= 6; $i++) {
        $default = $benefits_defaults[$i-1];
        
        // Show/Hide Benefit
        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_show", array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_show", array(
            'label'    => sprintf(__('Mostra Benefit %d', 'gambla'), $i),
            'section'  => 'gambla_newsletter',
            'type'     => 'checkbox',
        ));

        // Benefit Icon
        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_icon", array(
            'default'           => $default['icon'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_icon", array(
            'label'    => sprintf(__('Icona Benefit %d', 'gambla'), $i),
            'section'  => 'gambla_newsletter',
            'type'     => 'text',
        ));

        // Benefit Title
        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_title", array(
            'default'           => $default['title'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_title", array(
            'label'    => sprintf(__('Titolo Benefit %d', 'gambla'), $i),
            'section'  => 'gambla_newsletter',
            'type'     => 'text',
        ));

        // Benefit Description
        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_description", array(
            'default'           => $default['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_description", array(
            'label'    => sprintf(__('Descrizione Benefit %d', 'gambla'), $i),
            'section'  => 'gambla_newsletter',
            'type'     => 'textarea',
        ));
    }

    // ============ FOOTER SETTINGS ============
    $wp_customize->add_section('gambla_footer', array(
        'title'    => __('Footer', 'gambla'),
        'priority' => 120,
    ));

    // Footer Copyright
    $wp_customize->add_setting('gambla_footer_text', array(
        'default'           => '© 2024 GAMBLA. Tutti i diritti riservati.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_footer_text', array(
        'label'    => __('Testo Copyright', 'gambla'),
        'section'  => 'gambla_footer',
        'type'     => 'text',
    ));

    // Footer About Title
    $wp_customize->add_setting('gambla_footer_about_title', array(
        'default'           => 'Su GAMBLA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_footer_about_title', array(
        'label'    => __('Titolo Sezione About', 'gambla'),
        'section'  => 'gambla_footer',
        'type'     => 'text',
    ));

    // Footer About Text
    $wp_customize->add_setting('gambla_footer_about_text', array(
        'default'           => 'La piattaforma italiana dedicata al mondo dello sport. Notizie, analisi, fantacalcio e molto altro per tutti gli appassionati.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_footer_about_text', array(
        'label'    => __('Testo About', 'gambla'),
        'section'  => 'gambla_footer',
        'type'     => 'textarea',
    ));

    // Footer Navigation Title
    $wp_customize->add_setting('gambla_footer_nav_title', array(
        'default'           => 'Navigazione',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_footer_nav_title', array(
        'label'    => __('Titolo Sezione Navigazione', 'gambla'),
        'section'  => 'gambla_footer',
        'type'     => 'text',
    ));

    // Footer Sport Title
    $wp_customize->add_setting('gambla_footer_sport_title', array(
        'default'           => 'Sport',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_footer_sport_title', array(
        'label'    => __('Titolo Sezione Sport', 'gambla'),
        'section'  => 'gambla_footer',
        'type'     => 'text',
    ));

    // Footer Community Title
    $wp_customize->add_setting('gambla_footer_community_title', array(
        'default'           => 'Community',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('gambla_footer_community_title', array(
        'label'    => __('Titolo Sezione Community', 'gambla'),
        'section'  => 'gambla_footer',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'gambla_customize_register');

/**
 * Output Custom CSS
 */
function gambla_customizer_css() {
    $primary_color = get_theme_mod('gambla_primary_color', '#FF00FF');
    $secondary_color = get_theme_mod('gambla_secondary_color', '#FF6600');
    $background_color = get_theme_mod('gambla_background_color', '#0a0a0a');
    $text_color = get_theme_mod('gambla_text_color', '#ffffff');
    $primary_font = get_theme_mod('gambla_primary_font', 'Inter');
    $display_font = get_theme_mod('gambla_display_font', 'Montserrat');
    $base_font_size = get_theme_mod('gambla_base_font_size', 16);
    $header_height = get_theme_mod('gambla_header_height', 80);
    $post_image_height = get_theme_mod('gambla_post_image_height', 250);
    $small_logo_height = get_theme_mod('gambla_small_logo_height', 40);

    // Calculate gray color (20% lighter than background)
    $gray_color = gambla_adjust_brightness($background_color, 20);

    ?>
    <style type="text/css">
        :root {
            --gambla-primary: <?php echo esc_attr($primary_color); ?>;
            --gambla-secondary: <?php echo esc_attr($secondary_color); ?>;
            --gambla-dark: <?php echo esc_attr($background_color); ?>;
            --gambla-gray: <?php echo esc_attr($gray_color); ?>;
            --font-primary: '<?php echo esc_attr($primary_font); ?>', sans-serif;
            --font-display: '<?php echo esc_attr($display_font); ?>', sans-serif;
            --base-font-size: <?php echo esc_attr($base_font_size); ?>px;
            --header-height: <?php echo esc_attr($header_height); ?>px;
            --post-image-height: <?php echo esc_attr($post_image_height); ?>px;
            --small-logo-height: <?php echo esc_attr($small_logo_height); ?>px;
        }
        
        body {
            background-color: <?php echo esc_attr($background_color); ?>;
            color: <?php echo esc_attr($text_color); ?>;
            font-size: <?php echo esc_attr($base_font_size); ?>px;
        }
        
        .site-header {
            height: <?php echo esc_attr($header_height); ?>px;
        }
        
        .hero-section, .page-hero {
            padding-top: <?php echo esc_attr($header_height + 20); ?>px;
        }
        
        .post-image {
            height: <?php echo esc_attr($post_image_height); ?>px;
        }
        
        .site-logo img {
            height: <?php echo esc_attr($small_logo_height); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'gambla_customizer_css');

/**
 * Helper function to adjust color brightness
 */
function gambla_adjust_brightness($hex, $percent) {
    $hex = str_replace('#', '', $hex);
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    
    $r = min(255, max(0, $r + ($percent * 255 / 100)));
    $g = min(255, max(0, $g + ($percent * 255 / 100)));
    $b = min(255, max(0, $b + ($percent * 255 / 100)));
    
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}

/**
 * Enqueue Customizer Script
 */
function gambla_customizer_script() {
    wp_enqueue_script(
        'gambla-customizer',
        get_template_directory_uri() . '/js/customizer.js',
        array('jquery', 'customize-preview'),
        '1.0.0',
        true
    );
}
add_action('customize_preview_init', 'gambla_customizer_script');

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
