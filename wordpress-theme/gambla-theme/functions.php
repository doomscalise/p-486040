
<?php
// Theme Setup
function gambla_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Custom image sizes
    add_image_size('gambla-card', 400, 250, true);
    add_image_size('gambla-hero', 800, 500, true);
    add_image_size('gambla-thumbnail', 150, 150, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'gambla'),
        'footer' => __('Footer Menu', 'gambla'),
    ));
}
add_action('after_setup_theme', 'gambla_setup');

// Enqueue scripts and styles
function gambla_scripts() {
    wp_enqueue_style('gambla-style', get_stylesheet_uri(), array(), '2.0.0');
    wp_enqueue_script('gambla-script', get_template_directory_uri() . '/js/gambla.js', array('jquery'), '2.0.0', true);
    
    // Load customizer preview script
    if (is_customize_preview()) {
        wp_enqueue_script('gambla-customizer', get_template_directory_uri() . '/js/customizer.js', array('jquery', 'customize-preview'), '2.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'gambla_scripts');

// Theme Customizer - Complete Configuration System
function gambla_customize_register($wp_customize) {
    
    // SEZIONE LOGO E BRANDING
    $wp_customize->add_section('gambla_branding', array(
        'title' => 'Logo e Branding GAMBLA',
        'priority' => 30,
    ));
    
    // Logo piccolo header
    $wp_customize->add_setting('gambla_small_logo', array(
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'gambla_small_logo', array(
        'label' => 'Logo Piccolo Header',
        'section' => 'gambla_branding',
        'settings' => 'gambla_small_logo',
        'description' => 'Logo ottimizzato per header (raccomandato: 120x40px)',
    )));
    
    // Altezza logo
    $wp_customize->add_setting('gambla_small_logo_height', array(
        'default' => 40,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_small_logo_height', array(
        'label' => 'Altezza Logo (px)',
        'section' => 'gambla_branding',
        'type' => 'number',
        'input_attrs' => array('min' => 20, 'max' => 100),
    ));
    
    // SEZIONE COLORI COMPLETA
    $wp_customize->add_section('gambla_colors', array(
        'title' => 'Colori GAMBLA',
        'priority' => 40,
    ));
    
    $colors = array(
        'gambla_primary_color' => array('label' => 'Colore Primario (Magenta)', 'default' => '#FF00FF'),
        'gambla_secondary_color' => array('label' => 'Colore Secondario (Arancione)', 'default' => '#FF6600'),
        'gambla_yellow_color' => array('label' => 'Colore Giallo', 'default' => '#FFD700'),
        'gambla_background_color' => array('label' => 'Sfondo Principale', 'default' => '#0a0a0a'),
        'gambla_gray_color' => array('label' => 'Sfondo Secondario', 'default' => '#1a1a1a'),
        'gambla_text_color' => array('label' => 'Colore Testo', 'default' => '#ffffff'),
    );
    
    foreach ($colors as $setting => $config) {
        $wp_customize->add_setting($setting, array(
            'default' => $config['default'],
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting, array(
            'label' => $config['label'],
            'section' => 'gambla_colors',
        )));
    }
    
    // SEZIONE TIPOGRAFIA
    $wp_customize->add_section('gambla_typography', array(
        'title' => 'Tipografia',
        'priority' => 50,
    ));
    
    $fonts = array(
        'Inter', 'Montserrat', 'Roboto', 'Open Sans', 'Lato', 'Poppins', 'Source Sans Pro', 'Nunito'
    );
    
    $wp_customize->add_setting('gambla_primary_font', array(
        'default' => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_primary_font', array(
        'label' => 'Font Principale',
        'section' => 'gambla_typography',
        'type' => 'select',
        'choices' => array_combine($fonts, $fonts),
    ));
    
    $wp_customize->add_setting('gambla_display_font', array(
        'default' => 'Montserrat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_display_font', array(
        'label' => 'Font Titoli',
        'section' => 'gambla_typography',
        'type' => 'select',
        'choices' => array_combine($fonts, $fonts),
    ));
    
    $wp_customize->add_setting('gambla_base_font_size', array(
        'default' => 16,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_base_font_size', array(
        'label' => 'Dimensione Font Base (px)',
        'section' => 'gambla_typography',
        'type' => 'number',
        'input_attrs' => array('min' => 12, 'max' => 24),
    ));
    
    // SEZIONE LAYOUT
    $wp_customize->add_section('gambla_layout', array(
        'title' => 'Layout e Dimensioni',
        'priority' => 60,
    ));
    
    $wp_customize->add_setting('gambla_header_height', array(
        'default' => 80,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_header_height', array(
        'label' => 'Altezza Header (px)',
        'section' => 'gambla_layout',
        'type' => 'number',
        'input_attrs' => array('min' => 60, 'max' => 120),
    ));
    
    $wp_customize->add_setting('gambla_post_image_height', array(
        'default' => 250,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_post_image_height', array(
        'label' => 'Altezza Immagini Post (px)',
        'section' => 'gambla_layout',
        'type' => 'number',
        'input_attrs' => array('min' => 150, 'max' => 400),
    ));
    
    // SEZIONE HOMEPAGE
    $wp_customize->add_section('gambla_homepage', array(
        'title' => 'Homepage',
        'priority' => 70,
    ));
    
    // Hero Section
    $wp_customize->add_setting('gambla_hero_title', array(
        'default' => 'Ultimi Articoli GAMBLA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_hero_title', array(
        'label' => 'Titolo Hero',
        'section' => 'gambla_homepage',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('gambla_hero_subtitle', array(
        'default' => 'Le notizie più fresche dal mondo dello sport',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_hero_subtitle', array(
        'label' => 'Sottotitolo Hero',
        'section' => 'gambla_homepage',
        'type' => 'textarea',
    ));
    
    // SEZIONE BLOG
    $wp_customize->add_section('gambla_blog', array(
        'title' => 'Pagina Blog',
        'priority' => 80,
    ));
    
    $wp_customize->add_setting('gambla_blog_title', array(
        'default' => 'Accendi la Tua Passione Sportiva',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_blog_title', array(
        'label' => 'Titolo Pagina Blog',
        'section' => 'gambla_blog',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('gambla_blog_description', array(
        'default' => 'Unisciti alla community sportiva più dinamica d\'Italia. Notizie live, fantacalcio, discussioni accese e contenuti esclusivi ti aspettano.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_blog_description', array(
        'label' => 'Descrizione Pagina Blog',
        'section' => 'gambla_blog',
        'type' => 'textarea',
    ));
    
    // SEZIONE SPORT
    $wp_customize->add_section('gambla_sports', array(
        'title' => 'Sezione Sport',
        'priority' => 90,
    ));
    
    $wp_customize->add_setting('gambla_sports_title', array(
        'default' => 'I Nostri Sport',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_sports_title', array(
        'label' => 'Titolo Sezione Sport',
        'section' => 'gambla_sports',
    ));
    
    $wp_customize->add_setting('gambla_sports_subtitle', array(
        'default' => 'Copertura completa per tutti gli sport che ami',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_sports_subtitle', array(
        'label' => 'Sottotitolo Sezione Sport',
        'section' => 'gambla_sports',
    ));
    
    // Sport individuali
    $default_sports = array(
        array('icon' => '⚽', 'name' => 'Calcio', 'description' => 'Serie A, Champions League, Europa League'),
        array('icon' => '🏀', 'name' => 'Basket', 'description' => 'NBA, Serie A, Eurolega'),
        array('icon' => '🎾', 'name' => 'Tennis', 'description' => 'ATP, WTA, Slam'),
        array('icon' => '🏐', 'name' => 'Volley', 'description' => 'Serie A, Champions League'),
        array('icon' => '🏎️', 'name' => 'Formula 1', 'description' => 'Campionato mondiale'),
        array('icon' => '🏆', 'name' => 'Altri Sport', 'description' => 'Olimpiadi, sport vari'),
    );
    
    for ($i = 1; $i <= 6; $i++) {
        $sport = $default_sports[$i-1];
        
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
        
        $wp_customize->add_setting("gambla_sport_{$i}_icon", array(
            'default' => $sport['icon'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control("gambla_sport_{$i}_icon", array(
            'label' => "Icona Sport {$i}",
            'section' => 'gambla_sports',
            'type' => 'text',
        ));
        
        $wp_customize->add_setting("gambla_sport_{$i}_name", array(
            'default' => $sport['name'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control("gambla_sport_{$i}_name", array(
            'label' => "Nome Sport {$i}",
            'section' => 'gambla_sports',
            'type' => 'text',
        ));
        
        $wp_customize->add_setting("gambla_sport_{$i}_description", array(
            'default' => $sport['description'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control("gambla_sport_{$i}_description", array(
            'label' => "Descrizione Sport {$i}",
            'section' => 'gambla_sports',
            'type' => 'text',
        ));
    }
    
    // SEZIONE NEWSLETTER
    $wp_customize->add_section('gambla_newsletter', array(
        'title' => 'Newsletter',
        'priority' => 100,
    ));
    
    $wp_customize->add_setting('gambla_newsletter_title', array(
        'default' => 'Non Perdere Nemmeno una Notizia',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_newsletter_title', array(
        'label' => 'Titolo Newsletter',
        'section' => 'gambla_newsletter',
    ));
    
    $wp_customize->add_setting('gambla_newsletter_subtitle', array(
        'default' => 'Iscriviti alla nostra newsletter per ricevere le ultime news direttamente nella tua email',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_newsletter_subtitle', array(
        'label' => 'Sottotitolo Newsletter',
        'section' => 'gambla_newsletter',
        'type' => 'textarea',
    ));
    
    // SEZIONE FOOTER
    $wp_customize->add_section('gambla_footer', array(
        'title' => 'Footer',
        'priority' => 110,
    ));
    
    $wp_customize->add_setting('gambla_footer_text', array(
        'default' => '© 2024 GAMBLA. Tutti i diritti riservati.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_footer_text', array(
        'label' => 'Testo Copyright',
        'section' => 'gambla_footer',
    ));
    
    $wp_customize->add_setting('gambla_footer_about_title', array(
        'default' => 'Su GAMBLA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_footer_about_title', array(
        'label' => 'Titolo Sezione About',
        'section' => 'gambla_footer',
    ));
    
    $wp_customize->add_setting('gambla_footer_about_text', array(
        'default' => 'La piattaforma italiana dedicata al mondo dello sport. Notizie, analisi, fantacalcio e molto altro per tutti gli appassionati.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('gambla_footer_about_text', array(
        'label' => 'Testo Sezione About',
        'section' => 'gambla_footer',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'gambla_customize_register');

// Output custom CSS
function gambla_custom_css() {
    $primary_color = get_theme_mod('gambla_primary_color', '#FF00FF');
    $secondary_color = get_theme_mod('gambla_secondary_color', '#FF6600');
    $yellow_color = get_theme_mod('gambla_yellow_color', '#FFD700');
    $background_color = get_theme_mod('gambla_background_color', '#0a0a0a');
    $gray_color = get_theme_mod('gambla_gray_color', '#1a1a1a');
    $text_color = get_theme_mod('gambla_text_color', '#ffffff');
    $primary_font = get_theme_mod('gambla_primary_font', 'Inter');
    $display_font = get_theme_mod('gambla_display_font', 'Montserrat');
    $base_font_size = get_theme_mod('gambla_base_font_size', 16);
    $header_height = get_theme_mod('gambla_header_height', 80);
    $post_image_height = get_theme_mod('gambla_post_image_height', 250);
    
    ?>
    <style type="text/css" id="gambla-custom-css">
        :root {
            --gambla-primary: <?php echo esc_html($primary_color); ?>;
            --gambla-secondary: <?php echo esc_html($secondary_color); ?>;
            --gambla-yellow: <?php echo esc_html($yellow_color); ?>;
            --gambla-dark: <?php echo esc_html($background_color); ?>;
            --gambla-gray: <?php echo esc_html($gray_color); ?>;
            --font-primary: '<?php echo esc_html($primary_font); ?>', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-display: '<?php echo esc_html($display_font); ?>', sans-serif;
            --base-font-size: <?php echo esc_html($base_font_size); ?>px;
            --header-height: <?php echo esc_html($header_height); ?>px;
            --post-image-height: <?php echo esc_html($post_image_height); ?>px;
        }
        
        body {
            background-color: <?php echo esc_html($background_color); ?>;
            color: <?php echo esc_html($text_color); ?>;
            font-size: <?php echo esc_html($base_font_size); ?>px;
        }
        
        .site-header {
            height: <?php echo esc_html($header_height); ?>px;
        }
        
        .hero-section, .page-hero {
            padding-top: calc(<?php echo esc_html($header_height); ?>px + 20px);
        }
        
        .post-image {
            height: <?php echo esc_html($post_image_height); ?>px;
        }
        
        @import url('https://fonts.googleapis.com/css2?family=<?php echo str_replace(' ', '+', $primary_font); ?>:wght@300;400;500;600;700&family=<?php echo str_replace(' ', '+', $display_font); ?>:wght@400;600;700;800&display=swap');
    </style>
    <?php
}
add_action('wp_head', 'gambla_custom_css');

// Create default pages on theme activation
function gambla_create_default_pages() {
    $pages = array(
        'home' => array('title' => 'Home', 'template' => 'page-home.php'),
        'blog' => array('title' => 'Blog', 'template' => 'page-blog.php'),
        'fantagambla' => array('title' => 'FantaGambla', 'template' => 'page-fantagambla.php'),
        'chi-siamo' => array('title' => 'Chi Siamo', 'template' => 'page-chi-siamo.php'),
        'contatti' => array('title' => 'Contatti', 'template' => 'page-contatti.php'),
        'newsletter' => array('title' => 'Newsletter', 'template' => 'page-newsletter.php'),
        'faq' => array('title' => 'FAQ', 'template' => 'page-faq.php'),
        'unisciti-ora' => array('title' => 'Unisciti Ora', 'template' => 'page-unisciti-ora.php'),
    );
    
    foreach ($pages as $slug => $page) {
        if (!get_page_by_path($slug)) {
            $page_id = wp_insert_post(array(
                'post_title' => $page['title'],
                'post_name' => $slug,
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => 'page',
            ));
            
            if ($page_id && isset($page['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page['template']);
            }
        }
    }
    
    // Set home page
    $home = get_page_by_path('home');
    if ($home) {
        update_option('page_on_front', $home->ID);
        update_option('show_on_front', 'page');
    }
}
add_action('after_switch_theme', 'gambla_create_default_pages');

// Widget areas
function gambla_widgets_init() {
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'blog-sidebar',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'gambla_widgets_init');
?>
