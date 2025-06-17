<?php

// Theme Setup
function gambla_theme_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-background');
    add_theme_support('customize-selective-refresh-widgets');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
    
    // Add custom image sizes
    add_image_size('gambla-card', 400, 250, true);
    add_image_size('gambla-hero', 800, 400, true);
    add_image_size('gambla-large', 1200, 600, true);
    add_image_size('gambla-team', 300, 300, true);
    add_image_size('gambla-thumbnail', 150, 150, true);
}
add_action('after_setup_theme', 'gambla_theme_setup');

// Create default pages
function gambla_create_default_pages() {
    $pages = array(
        'Home' => array(
            'template' => 'page-home.php',
            'content' => 'Homepage di GAMBLA'
        ),
        'Blog' => array(
            'template' => 'page-blog.php',
            'content' => 'Il blog di GAMBLA con notizie sportive'
        ),
        'FantaGambla' => array(
            'template' => 'page-fantagambla.php',
            'content' => 'Il fantacalcio di GAMBLA'
        ),
        'Chi Siamo' => array(
            'template' => 'page-chi-siamo.php',
            'content' => 'Chi siamo e la nostra storia'
        ),
        'FAQ' => array(
            'template' => 'page-faq.php',
            'content' => 'Domande frequenti'
        ),
        'Newsletter' => array(
            'template' => 'page-newsletter.php',
            'content' => 'Iscriviti alla nostra newsletter'
        ),
        'Contatti' => array(
            'template' => 'page-contatti.php',
            'content' => 'Contattaci per informazioni'
        ),
        'Unisciti Ora' => array(
            'template' => 'page-unisciti-ora.php',
            'content' => 'Registrati e unisciti alla community'
        )
    );
    
    foreach ($pages as $page_title => $page_data) {
        $page_check = get_page_by_title($page_title);
        
        if (!$page_check) {
            $page_id = wp_insert_post(array(
                'post_title' => $page_title,
                'post_content' => $page_data['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_slug' => sanitize_title($page_title)
            ));
            
            if ($page_id) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
                
                // Set homepage
                if ($page_title == 'Home') {
                    update_option('page_on_front', $page_id);
                    update_option('show_on_front', 'page');
                }
            }
        }
    }
}
add_action('after_setup_theme', 'gambla_create_default_pages');

// Enqueue styles and scripts
function gambla_theme_scripts() {
    // Google Fonts
    wp_enqueue_style('gambla-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700;800&display=swap');
    
    // Theme stylesheet
    wp_enqueue_style('gambla-style', get_stylesheet_uri(), array(), '2.0');
    
    // Custom JavaScript
    wp_enqueue_script('gambla-script', get_template_directory_uri() . '/js/gambla.js', array('jquery'), '2.0', true);
    
    // Customizer live preview
    if (is_customize_preview()) {
        wp_enqueue_script('gambla-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '2.0', true);
    }
    
    // Localize script for AJAX
    wp_localize_script('gambla-script', 'gambla_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('gambla_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'gambla_theme_scripts');

// Enhanced Customizer Controls
function gambla_customize_register($wp_customize) {
    // Add selective refresh support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-logo',
            'render_callback' => 'gambla_customize_partial_blogname',
        ));
    }
    
    // SEZIONE LAYOUT
    $wp_customize->add_section('gambla_layout', array(
        'title' => 'Layout & Dimensioni',
        'priority' => 25,
        'description' => 'Personalizza layout e dimensioni degli elementi'
    ));
    
    // Header Height
    $wp_customize->add_setting('gambla_header_height', array(
        'default' => '80',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_header_height', array(
        'label' => 'Altezza Header (px)',
        'section' => 'gambla_layout',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 60,
            'max' => 120,
            'step' => 5,
        ),
    ));
    
    // Image Sizes
    $wp_customize->add_setting('gambla_card_image_width', array(
        'default' => '400',
        'sanitize_callback' => 'absint',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('gambla_card_image_width', array(
        'label' => 'Larghezza Immagini Card (px)',
        'section' => 'gambla_layout',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 300,
            'max' => 600,
            'step' => 10,
        ),
    ));
    
    $wp_customize->add_setting('gambla_card_image_height', array(
        'default' => '250',
        'sanitize_callback' => 'absint',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('gambla_card_image_height', array(
        'label' => 'Altezza Immagini Card (px)',
        'section' => 'gambla_layout',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 200,
            'max' => 400,
            'step' => 10,
        ),
    ));
    
    // Colors Section - Enhanced
    $wp_customize->add_section('gambla_colors', array(
        'title' => 'GAMBLA Colors',
        'priority' => 30,
        'description' => 'Personalizza i colori del tema GAMBLA'
    ));
    
    // Primary Color
    $wp_customize->add_setting('gambla_primary_color', array(
        'default' => '#FF1493',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_primary_color', array(
        'label' => 'Colore Primario (Rosa)',
        'description' => 'Colore principale utilizzato per bottoni e accenti',
        'section' => 'gambla_colors',
    )));
    
    // Secondary Color
    $wp_customize->add_setting('gambla_secondary_color', array(
        'default' => '#FF8C00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_secondary_color', array(
        'label' => 'Colore Secondario (Arancione)',
        'description' => 'Colore secondario per gradienti e elementi decorativi',
        'section' => 'gambla_colors',
    )));
    
    // Background Color
    $wp_customize->add_setting('gambla_background_color', array(
        'default' => '#0a0a0a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_background_color', array(
        'label' => 'Colore di Sfondo',
        'description' => 'Colore di sfondo principale del sito',
        'section' => 'gambla_colors',
    )));
    
    // Text Color
    $wp_customize->add_setting('gambla_text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_text_color', array(
        'label' => 'Colore del Testo',
        'description' => 'Colore principale del testo',
        'section' => 'gambla_colors',
    )));
    
    // Typography Section - Enhanced
    $wp_customize->add_section('gambla_typography', array(
        'title' => 'GAMBLA Typography',
        'priority' => 31,
        'description' => 'Personalizza i font utilizzati nel sito'
    ));
    
    // Primary Font
    $wp_customize->add_setting('gambla_primary_font', array(
        'default' => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_primary_font', array(
        'label' => 'Font Principale',
        'description' => 'Font utilizzato per il testo normale',
        'section' => 'gambla_typography',
        'type' => 'select',
        'choices' => array(
            'Inter' => 'Inter (Moderno)',
            'Roboto' => 'Roboto (Pulito)',
            'Open Sans' => 'Open Sans (Leggibile)',
            'Lato' => 'Lato (Elegante)',
            'Poppins' => 'Poppins (Arrotondato)',
            'Nunito' => 'Nunito (Amichevole)',
            'Source Sans Pro' => 'Source Sans Pro (Professionale)'
        ),
    ));
    
    // Display Font
    $wp_customize->add_setting('gambla_display_font', array(
        'default' => 'Montserrat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_display_font', array(
        'label' => 'Font per Titoli',
        'description' => 'Font utilizzato per titoli e intestazioni',
        'section' => 'gambla_typography',
        'type' => 'select',
        'choices' => array(
            'Montserrat' => 'Montserrat (Moderno)',
            'Oswald' => 'Oswald (Bold)',
            'Bebas Neue' => 'Bebas Neue (Impattante)',
            'Anton' => 'Anton (Potente)',
            'Righteous' => 'Righteous (Dinamico)',
            'Raleway' => 'Raleway (Elegante)',
            'Playfair Display' => 'Playfair Display (Classico)'
        ),
    ));
    
    // Font Sizes
    $wp_customize->add_setting('gambla_base_font_size', array(
        'default' => '16',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_base_font_size', array(
        'label' => 'Dimensione Font Base (px)',
        'section' => 'gambla_typography',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 14,
            'max' => 20,
            'step' => 1,
        ),
    ));
    
    // Homepage Content Section - Enhanced
    $wp_customize->add_section('gambla_homepage', array(
        'title' => 'Contenuti Homepage',
        'priority' => 32,
        'description' => 'Personalizza i contenuti della homepage'
    ));
    
    // Hero Title
    $wp_customize->add_setting('gambla_hero_title', array(
        'default' => 'Accendi la Tua Passione Sportiva',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_hero_title', array(
        'label' => 'Titolo Hero',
        'description' => 'Titolo principale della homepage',
        'section' => 'gambla_homepage',
        'type' => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('gambla_hero_subtitle', array(
        'default' => 'Unisciti alla community sportiva più dinamica d\'Italia',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_hero_subtitle', array(
        'label' => 'Sottotitolo Hero',
        'description' => 'Sottotitolo della homepage',
        'section' => 'gambla_homepage',
        'type' => 'textarea',
    ));
    
    // Sports Section
    $wp_customize->add_section('gambla_sports', array(
        'title' => 'Sezione Sport',
        'priority' => 33,
        'description' => 'Personalizza la sezione "I Nostri Sport"'
    ));
    
    // Sports Title
    $wp_customize->add_setting('gambla_sports_title', array(
        'default' => 'I Nostri Sport',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_sports_title', array(
        'label' => 'Titolo Sezione Sport',
        'section' => 'gambla_sports',
        'type' => 'text',
    ));
    
    // Sports Subtitle
    $wp_customize->add_setting('gambla_sports_subtitle', array(
        'default' => 'Copertura completa per tutti gli sport che ami',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_sports_subtitle', array(
        'label' => 'Sottotitolo Sezione Sport',
        'section' => 'gambla_sports',
        'type' => 'textarea',
    ));
    
    // Individual Sports (6 sports)
    for ($i = 1; $i <= 6; $i++) {
        // Sport Icon
        $wp_customize->add_setting("gambla_sport_{$i}_icon", array(
            'default' => $i == 1 ? '⚽' : ($i == 2 ? '🏀' : ($i == 3 ? '🎾' : ($i == 4 ? '🏎️' : ($i == 5 ? '🏐' : '🏆')))),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        
        $wp_customize->add_control("gambla_sport_{$i}_icon", array(
            'label' => "Sport {$i} - Icona/Emoji",
            'section' => 'gambla_sports',
            'type' => 'text',
        ));
        
        // Sport Name
        $wp_customize->add_setting("gambla_sport_{$i}_name", array(
            'default' => $i == 1 ? 'Calcio' : ($i == 2 ? 'Basket' : ($i == 3 ? 'Tennis' : ($i == 4 ? 'Formula 1' : ($i == 5 ? 'Volley' : 'Altri Sport')))),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        
        $wp_customize->add_control("gambla_sport_{$i}_name", array(
            'label' => "Sport {$i} - Nome",
            'section' => 'gambla_sports',
            'type' => 'text',
        ));
        
        // Sport Description
        $wp_customize->add_setting("gambla_sport_{$i}_description", array(
            'default' => $i == 1 ? 'Serie A, Champions League, Europa League' : ($i == 2 ? 'NBA, EuroLega, Serie A Basket' : ($i == 3 ? 'ATP, WTA, Slam del Grande' : ($i == 4 ? 'Tutti i Gran Premi e qualifiche' : ($i == 5 ? 'SuperLega, Champions League' : 'Rugby, Baseball, Sport Olimpici')))),
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport' => 'postMessage',
        ));
        
        $wp_customize->add_control("gambla_sport_{$i}_description", array(
            'label' => "Sport {$i} - Descrizione",
            'section' => 'gambla_sports',
            'type' => 'textarea',
        ));
        
        // Show/Hide Sport
        $wp_customize->add_setting("gambla_sport_{$i}_show", array(
            'default' => true,
            'sanitize_callback' => 'wp_validate_boolean',
            'transport' => 'postMessage',
        ));
        
        $wp_customize->add_control("gambla_sport_{$i}_show", array(
            'label' => "Mostra Sport {$i}",
            'section' => 'gambla_sports',
            'type' => 'checkbox',
        ));
    }
    
    // CHI SIAMO SECTION
    $wp_customize->add_section('gambla_chi_siamo', array(
        'title' => 'Pagina Chi Siamo',
        'priority' => 34,
        'description' => 'Personalizza la pagina Chi Siamo'
    ));
    
    // Team Section Title
    $wp_customize->add_setting('gambla_team_title', array(
        'default' => 'Il Nostro Team',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_team_title', array(
        'label' => 'Titolo Sezione Team',
        'section' => 'gambla_chi_siamo',
        'type' => 'text',
    ));
    
    // Team Section Subtitle
    $wp_customize->add_setting('gambla_team_subtitle', array(
        'default' => 'Esperti di sport e tecnologia che lavorano per te ogni giorno',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_team_subtitle', array(
        'label' => 'Sottotitolo Sezione Team',
        'section' => 'gambla_chi_siamo',
        'type' => 'textarea',
    ));
    
    // Values Section Title
    $wp_customize->add_setting('gambla_values_title', array(
        'default' => 'I Nostri Valori',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_values_title', array(
        'label' => 'Titolo Sezione Valori',
        'section' => 'gambla_chi_siamo',
        'type' => 'text',
    ));
    
    // Individual Values (4 values)
    $default_values = array(
        1 => array('icon' => '🎯', 'title' => 'Precisione', 'desc' => 'Analisi accurate basate su dati reali e statistiche approfondite'),
        2 => array('icon' => '🤝', 'title' => 'Community', 'desc' => 'Crediamo nella forza della condivisione e dell\'aiuto reciproco'),
        3 => array('icon' => '🚀', 'title' => 'Innovazione', 'desc' => 'Utilizziamo sempre le tecnologie più avanzate per migliorare l\'esperienza'),
        4 => array('icon' => '❤️', 'title' => 'Passione', 'desc' => 'Lo sport è la nostra vita e trasmettiamo questa energia ogni giorno')
    );
    
    for ($i = 1; $i <= 4; $i++) {
        // Value Icon
        $wp_customize->add_setting("gambla_value_{$i}_icon", array(
            'default' => $default_values[$i]['icon'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        
        $wp_customize->add_control("gambla_value_{$i}_icon", array(
            'label' => "Valore {$i} - Icona",
            'section' => 'gambla_chi_siamo',
            'type' => 'text',
        ));
        
        // Value Title
        $wp_customize->add_setting("gambla_value_{$i}_title", array(
            'default' => $default_values[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        
        $wp_customize->add_control("gambla_value_{$i}_title", array(
            'label' => "Valore {$i} - Titolo",
            'section' => 'gambla_chi_siamo',
            'type' => 'text',
        ));
        
        // Value Description
        $wp_customize->add_setting("gambla_value_{$i}_description", array(
            'default' => $default_values[$i]['desc'],
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport' => 'postMessage',
        ));
        
        $wp_customize->add_control("gambla_value_{$i}_description", array(
            'label' => "Valore {$i} - Descrizione",
            'section' => 'gambla_chi_siamo',
            'type' => 'textarea',
        ));
    }
    
    // Blog Section
    $wp_customize->add_section('gambla_blog', array(
        'title' => 'Impostazioni Blog',
        'priority' => 35,
        'description' => 'Personalizza le impostazioni del blog'
    ));
    
    // Blog Title
    $wp_customize->add_setting('gambla_blog_title', array(
        'default' => 'Il Blog di GAMBLA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_blog_title', array(
        'label' => 'Titolo Pagina Blog',
        'section' => 'gambla_blog',
        'type' => 'text',
    ));
    
    // Blog Description
    $wp_customize->add_setting('gambla_blog_description', array(
        'default' => 'Analisi, pronostici e tutto quello che devi sapere sul mondo dello sport',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_blog_description', array(
        'label' => 'Descrizione Pagina Blog',
        'section' => 'gambla_blog',
        'type' => 'textarea',
    ));
    
    // Newsletter Section - ENHANCED
    $wp_customize->add_section('gambla_newsletter', array(
        'title' => 'Newsletter Settings',
        'priority' => 36,
        'description' => 'Personalizza la sezione newsletter'
    ));
    
    // Newsletter Title
    $wp_customize->add_setting('gambla_newsletter_title', array(
        'default' => 'Perché Iscriversi alla Newsletter?',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_newsletter_title', array(
        'label' => 'Titolo Newsletter',
        'section' => 'gambla_newsletter',
        'type' => 'text',
    ));
    
    // Newsletter Subtitle
    $wp_customize->add_setting('gambla_newsletter_subtitle', array(
        'default' => 'Tutto quello che ti serve per essere sempre aggiornato sul mondo dello sport',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_newsletter_subtitle', array(
        'label' => 'Sottotitolo Newsletter',
        'section' => 'gambla_newsletter',
        'type' => 'textarea',
    ));
    
    // Newsletter Benefits (6 benefits)
    $default_benefits = array(
        1 => array('icon' => '📰', 'title' => 'News Esclusive', 'desc' => 'Le notizie più importanti prima di tutti gli altri'),
        2 => array('icon' => '🎯', 'title' => 'Pronostici Expert', 'desc' => 'Analisi e pronostici dai nostri esperti'),
        3 => array('icon' => '⚡', 'title' => 'FantaConsigli', 'desc' => 'I migliori consigli per FantaGAMBLA ogni settimana'),
        4 => array('icon' => '🎁', 'title' => 'Offerte Speciali', 'desc' => 'Accesso anticipato a contest e promozioni'),
        5 => array('icon' => '📊', 'title' => 'Report Settimanali', 'desc' => 'Riassunti completi della settimana sportiva'),
        6 => array('icon' => '🏆', 'title' => 'Contest Esclusivi', 'desc' => 'Partecipa a concorsi riservati agli iscritti')
    );
    
    for ($i = 1; $i <= 6; $i++) {
        // Benefit Icon
        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_icon", array(
            'default' => $default_benefits[$i]['icon'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        
        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_icon", array(
            'label' => "Benefit {$i} - Icona",
            'section' => 'gambla_newsletter',
            'type' => 'text',
        ));
        
        // Benefit Title
        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_title", array(
            'default' => $default_benefits[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        
        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_title", array(
            'label' => "Benefit {$i} - Titolo",
            'section' => 'gambla_newsletter',
            'type' => 'text',
        ));
        
        // Benefit Description
        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_description", array(
            'default' => $default_benefits[$i]['desc'],
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport' => 'postMessage',
        ));
        
        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_description", array(
            'label' => "Benefit {$i} - Descrizione",
            'section' => 'gambla_newsletter',
            'type' => 'textarea',
        ));
        
        // Show/Hide Benefit
        $wp_customize->add_setting("gambla_newsletter_benefit_{$i}_show", array(
            'default' => true,
            'sanitize_callback' => 'wp_validate_boolean',
            'transport' => 'postMessage',
        ));
        
        $wp_customize->add_control("gambla_newsletter_benefit_{$i}_show", array(
            'label' => "Mostra Benefit {$i}",
            'section' => 'gambla_newsletter',
            'type' => 'checkbox',
        ));
    }
    
    // Footer Section
    $wp_customize->add_section('gambla_footer', array(
        'title' => 'Footer Settings',
        'priority' => 37,
        'description' => 'Personalizza il footer del sito'
    ));
    
    // Footer Text
    $wp_customize->add_setting('gambla_footer_text', array(
        'default' => '© 2024 GAMBLA. Tutti i diritti riservati.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_footer_text', array(
        'label' => 'Testo Copyright Footer',
        'section' => 'gambla_footer',
        'type' => 'text',
    ));
    
    // Footer About Title
    $wp_customize->add_setting('gambla_footer_about_title', array(
        'default' => 'GAMBLA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_footer_about_title', array(
        'label' => 'Titolo Sezione About Footer',
        'section' => 'gambla_footer',
        'type' => 'text',
    ));
    
    // Footer About Text
    $wp_customize->add_setting('gambla_footer_about_text', array(
        'default' => 'La tua destinazione per notizie sportive, analisi e fantacalcio. Unisciti alla community più dinamica d\'Italia.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_footer_about_text', array(
        'label' => 'Testo Sezione About Footer',
        'section' => 'gambla_footer',
        'type' => 'textarea',
    ));
    
    // Contact Settings
    $wp_customize->add_section('gambla_contact', array(
        'title' => 'Informazioni di Contatto',
        'priority' => 38,
        'description' => 'Gestisci le informazioni di contatto'
    ));
    
    // Email
    $wp_customize->add_setting('gambla_contact_email', array(
        'default' => 'info@gambla.it',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('gambla_contact_email', array(
        'label' => 'Email di Contatto',
        'section' => 'gambla_contact',
        'type' => 'email',
    ));
    
    // Phone
    $wp_customize->add_setting('gambla_contact_phone', array(
        'default' => '+39 123 456 7890',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('gambla_contact_phone', array(
        'label' => 'Telefono',
        'section' => 'gambla_contact',
        'type' => 'text',
    ));
    
    // Address
    $wp_customize->add_setting('gambla_contact_address', array(
        'default' => 'Via Roma 123, Milano, Italia',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('gambla_contact_address', array(
        'label' => 'Indirizzo',
        'section' => 'gambla_contact',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'gambla_customize_register');

// Customizer partial render callbacks
function gambla_customize_partial_blogname() {
    return get_bloginfo('name');
}

function gambla_customize_partial_hero_title() {
    return get_theme_mod('gambla_hero_title', 'Accendi la Tua Passione Sportiva');
}

function gambla_customize_partial_hero_subtitle() {
    return get_theme_mod('gambla_hero_subtitle', 'Unisciti alla community sportiva più dinamica d\'Italia');
}

// Output Enhanced Custom CSS
function gambla_custom_css() {
    $primary_color = get_theme_mod('gambla_primary_color', '#FF1493');
    $secondary_color = get_theme_mod('gambla_secondary_color', '#FF8C00');
    $background_color = get_theme_mod('gambla_background_color', '#0a0a0a');
    $text_color = get_theme_mod('gambla_text_color', '#ffffff');
    $primary_font = get_theme_mod('gambla_primary_font', 'Inter');
    $display_font = get_theme_mod('gambla_display_font', 'Montserrat');
    $base_font_size = get_theme_mod('gambla_base_font_size', '16');
    $header_height = get_theme_mod('gambla_header_height', '80');
    
    echo '<style type="text/css" id="gambla-custom-css">';
    echo ':root {';
    echo '--gambla-primary: ' . esc_attr($primary_color) . ';';
    echo '--gambla-secondary: ' . esc_attr($secondary_color) . ';';
    echo '--gambla-dark: ' . esc_attr($background_color) . ';';
    echo '--gambla-gray: ' . esc_attr(gambla_adjust_brightness($background_color, 20)) . ';';
    echo '--text-color: ' . esc_attr($text_color) . ';';
    echo '--font-primary: "' . esc_attr($primary_font) . '", sans-serif;';
    echo '--font-display: "' . esc_attr($display_font) . '", sans-serif;';
    echo '--base-font-size: ' . esc_attr($base_font_size) . 'px;';
    echo '--header-height: ' . esc_attr($header_height) . 'px;';
    echo '}';
    echo 'body { background-color: ' . esc_attr($background_color) . '; color: ' . esc_attr($text_color) . '; font-size: ' . esc_attr($base_font_size) . 'px; }';
    echo '.site-header { height: ' . esc_attr($header_height) . 'px; }';
    echo '.hero-section, .page-hero { padding-top: ' . esc_attr($header_height + 20) . 'px; }';
    echo '</style>';
}
add_action('wp_head', 'gambla_custom_css');

// Helper function to adjust color brightness
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

// Custom Post Types
function gambla_create_post_types() {
    // FAQ Post Type
    register_post_type('faq', array(
        'labels' => array(
            'name' => 'FAQ',
            'singular_name' => 'FAQ',
            'add_new' => 'Add New FAQ',
            'add_new_item' => 'Add New FAQ',
            'edit_item' => 'Edit FAQ',
            'new_item' => 'New FAQ',
            'view_item' => 'View FAQ',
            'search_items' => 'Search FAQ',
            'not_found' => 'No FAQ found',
            'not_found_in_trash' => 'No FAQ found in Trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-editor-help',
        'rewrite' => array('slug' => 'faq'),
    ));
    
    // Testimonial Post Type
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new' => 'Add New Testimonial',
            'add_new_item' => 'Add New Testimonial',
            'edit_item' => 'Edit Testimonial',
            'new_item' => 'New Testimonial',
            'view_item' => 'View Testimonial',
            'search_items' => 'Search Testimonials',
            'not_found' => 'No testimonials found',
            'not_found_in_trash' => 'No testimonials found in Trash'
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-quote',
    ));
    
    // Team Member Post Type
    register_post_type('team_member', array(
        'labels' => array(
            'name' => 'Team Members',
            'singular_name' => 'Team Member',
            'add_new' => 'Add New Member',
            'add_new_item' => 'Add New Team Member',
            'edit_item' => 'Edit Team Member',
            'new_item' => 'New Team Member',
            'view_item' => 'View Team Member',
            'search_items' => 'Search Team Members',
            'not_found' => 'No team members found',
            'not_found_in_trash' => 'No team members found in Trash'
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
    ));
}
add_action('init', 'gambla_create_post_types');

// Add Custom Fields (Meta Boxes)
function gambla_add_meta_boxes() {
    add_meta_box(
        'team_member_details',
        'Team Member Details',
        'gambla_team_member_meta_box',
        'team_member',
        'normal',
        'high'
    );
    
    add_meta_box(
        'testimonial_details',
        'Testimonial Details',
        'gambla_testimonial_meta_box',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'gambla_add_meta_boxes');

// Team Member Meta Box
function gambla_team_member_meta_box($post) {
    wp_nonce_field('gambla_save_team_member', 'gambla_team_member_nonce');
    
    $position = get_post_meta($post->ID, '_team_member_position', true);
    $linkedin = get_post_meta($post->ID, '_team_member_linkedin', true);
    $twitter = get_post_meta($post->ID, '_team_member_twitter', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="team_member_position">Position</label></th>';
    echo '<td><input type="text" id="team_member_position" name="team_member_position" value="' . esc_attr($position) . '" style="width: 100%;" /></td></tr>';
    echo '<tr><th><label for="team_member_linkedin">LinkedIn URL</label></th>';
    echo '<td><input type="url" id="team_member_linkedin" name="team_member_linkedin" value="' . esc_attr($linkedin) . '" style="width: 100%;" /></td></tr>';
    echo '<tr><th><label for="team_member_twitter">Twitter URL</label></th>';
    echo '<td><input type="url" id="team_member_twitter" name="team_member_twitter" value="' . esc_attr($twitter) . '" style="width: 100%;" /></td></tr>';
    echo '</table>';
}

// Testimonial Meta Box
function gambla_testimonial_meta_box($post) {
    wp_nonce_field('gambla_save_testimonial', 'gambla_testimonial_nonce');
    
    $author = get_post_meta($post->ID, '_testimonial_author', true);
    $company = get_post_meta($post->ID, '_testimonial_company', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="testimonial_author">Author Name</label></th>';
    echo '<td><input type="text" id="testimonial_author" name="testimonial_author" value="' . esc_attr($author) . '" style="width: 100%;" /></td></tr>';
    echo '<tr><th><label for="testimonial_company">Company</label></th>';
    echo '<td><input type="text" id="testimonial_company" name="testimonial_company" value="' . esc_attr($company) . '" style="width: 100%;" /></td></tr>';
    echo '<tr><th><label for="testimonial_rating">Rating (1-5)</label></th>';
    echo '<td><select id="testimonial_rating" name="testimonial_rating">';
    for ($i = 1; $i <= 5; $i++) {
        echo '<option value="' . $i . '"' . selected($rating, $i, false) . '>' . $i . ' Star' . ($i > 1 ? 's' : '') . '</option>';
    }
    echo '</select></td></tr>';
    echo '</table>';
}

// Save Meta Box Data
function gambla_save_meta_data($post_id) {
    // Team Member
    if (isset($_POST['gambla_team_member_nonce']) && wp_verify_nonce($_POST['gambla_team_member_nonce'], 'gambla_save_team_member')) {
        if (isset($_POST['team_member_position'])) {
            update_post_meta($post_id, '_team_member_position', sanitize_text_field($_POST['team_member_position']));
        }
        if (isset($_POST['team_member_linkedin'])) {
            update_post_meta($post_id, '_team_member_linkedin', esc_url_raw($_POST['team_member_linkedin']));
        }
        if (isset($_POST['team_member_twitter'])) {
            update_post_meta($post_id, '_team_member_twitter', esc_url_raw($_POST['team_member_twitter']));
        }
    }
    
    // Testimonial
    if (isset($_POST['gambla_testimonial_nonce']) && wp_verify_nonce($_POST['gambla_testimonial_nonce'], 'gambla_save_testimonial')) {
        if (isset($_POST['testimonial_author'])) {
            update_post_meta($post_id, '_testimonial_author', sanitize_text_field($_POST['testimonial_author']));
        }
        if (isset($_POST['testimonial_company'])) {
            update_post_meta($post_id, '_testimonial_company', sanitize_text_field($_POST['testimonial_company']));
        }
        if (isset($_POST['testimonial_rating'])) {
            update_post_meta($post_id, '_testimonial_rating', intval($_POST['testimonial_rating']));
        }
    }
}
add_action('save_post', 'gambla_save_meta_data');

// Create default categories
function gambla_create_default_categories() {
    $categories = array(
        'Serie A' => 'Notizie e analisi sul campionato italiano',
        'Champions League' => 'Tutto sulla massima competizione europea',
        'Fantacalcio' => 'Consigli e strategie per il fantacalcio',
        'Calciomercato' => 'Trattative e trasferimenti',
        'Interviste' => 'Interviste esclusive',
        'Analisi' => 'Analisi tattiche e statistiche'
    );
    
    foreach ($categories as $cat_name => $cat_description) {
        if (!term_exists($cat_name, 'category')) {
            wp_insert_term(
                $cat_name,
                'category',
                array(
                    'description' => $cat_description,
                    'slug' => sanitize_title($cat_name)
                )
            );
        }
    }
}
add_action('after_setup_theme', 'gambla_create_default_categories');

// Newsletter AJAX Handler
function gambla_newsletter_signup() {
    check_ajax_referer('gambla_nonce', 'nonce');
    
    $email = sanitize_email($_POST['email']);
    $name = sanitize_text_field($_POST['name']);
    
    if (!is_email($email)) {
        wp_die('Invalid email address');
    }
    
    // Store in custom table or send to external service
    // For now, we'll just store as a custom post type
    $newsletter_id = wp_insert_post(array(
        'post_type' => 'newsletter_signup',
        'post_title' => $name . ' - ' . $email,
        'post_status' => 'private',
        'meta_input' => array(
            '_newsletter_email' => $email,
            '_newsletter_name' => $name,
            '_newsletter_date' => current_time('mysql')
        )
    ));
    
    if ($newsletter_id) {
        wp_send_json_success('Iscrizione completata con successo!');
    } else {
        wp_send_json_error('Errore durante l\'iscrizione. Riprova.');
    }
}
add_action('wp_ajax_gambla_newsletter_signup', 'gambla_newsletter_signup');
add_action('wp_ajax_nopriv_gambla_newsletter_signup', 'gambla_newsletter_signup');

// Helper Functions
function gambla_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return max(1, $reading_time) . ' min';
}

function gambla_get_featured_posts($limit = 3) {
    return get_posts(array(
        'numberposts' => $limit,
        'meta_key' => '_featured_post',
        'meta_value' => '1',
        'post_status' => 'publish'
    ));
}

function gambla_excerpt($limit = 20) {
    return wp_trim_words(get_the_excerpt(), $limit, '...');
}

// Remove WordPress bloat
function gambla_remove_wp_styles() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'gambla_remove_wp_styles', 100);

// Security enhancements
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// Create navigation menu automatically
function gambla_create_default_menu() {
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        
        // Add menu items
        $menu_items = array(
            'Home' => home_url('/'),
            'Blog' => home_url('/blog'),
            'FantaGambla' => home_url('/fantagambla'),
            'Chi Siamo' => home_url('/chi-siamo'),
            'FAQ' => home_url('/faq'),
            'Newsletter' => home_url('/newsletter'),
            'Contatti' => home_url('/contatti'),
            'Unisciti Ora' => home_url('/unisciti-ora')
        );
        
        foreach ($menu_items as $title => $url) {
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => $title,
                'menu-item-url' => $url,
                'menu-item-status' => 'publish'
            ));
        }
        
        // Set menu to primary location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('after_setup_theme', 'gambla_create_default_menu');
?>
