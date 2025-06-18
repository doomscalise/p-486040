
<?php
// Tema GAMBLA - Functions.php

// Supporto per immagini in evidenza
add_theme_support('post-thumbnails');

// Supporto per titoli automatici
add_theme_support('title-tag');

// Supporto per HTML5
add_theme_support('html5', array(
    'search-form',
    'comment-form', 
    'comment-list',
    'gallery',
    'caption',
));

// Supporto per logo personalizzato
add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
));

// Enqueue degli stili e script
function gambla_scripts() {
    // Google Fonts
    wp_enqueue_style('gambla-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700;800&display=swap', array(), '1.0.0');
    
    // Tema principale
    wp_enqueue_style('gambla-style', get_stylesheet_uri(), array('gambla-fonts'), '3.0.0');
    
    // Script JavaScript
    wp_enqueue_script('gambla-script', get_template_directory_uri() . '/js/gambla.js', array('jquery'), '3.0.0', true);
}
add_action('wp_enqueue_scripts', 'gambla_scripts');

// Registra i menu
function gambla_menus() {
    register_nav_menus(array(
        'primary' => 'Menu Principale',
        'footer' => 'Menu Footer'
    ));
}
add_action('init', 'gambla_menus');

// Dimensioni personalizzate per le immagini
if (function_exists('add_image_size')) {
    add_image_size('gambla-card', 400, 250, true);
    add_image_size('gambla-large', 800, 500, true);
}

// Excerpt personalizzato
function gambla_custom_excerpt($limit = 25) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

// Tempo di lettura stimato
function gambla_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return $reading_time . ' min lettura';
}

// Supporto per Gutenberg
add_theme_support('wp-block-styles');
add_theme_support('align-wide');
add_theme_support('responsive-embeds');

// Colori personalizzati per Gutenberg
add_theme_support('editor-color-palette', array(
    array(
        'name' => 'GAMBLA Magenta',
        'slug' => 'gambla-magenta',
        'color' => '#FF00FF',
    ),
    array(
        'name' => 'GAMBLA Orange',
        'slug' => 'gambla-orange',
        'color' => '#FF6600',
    ),
    array(
        'name' => 'GAMBLA Dark',
        'slug' => 'gambla-dark',
        'color' => '#0a0a0a',
    ),
    array(
        'name' => 'GAMBLA Gray',
        'slug' => 'gambla-gray',
        'color' => '#1a1a1a',
    ),
));

// Customizer
function gambla_customize_register($wp_customize) {
    // Sezione Logo
    $wp_customize->add_section('gambla_logo_section', array(
        'title' => 'Logo GAMBLA',
        'priority' => 30,
    ));
    
    // Impostazione logo piccolo
    $wp_customize->add_setting('gambla_small_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'gambla_small_logo', array(
        'label' => 'Logo Header (piccolo)',
        'section' => 'gambla_logo_section',
        'settings' => 'gambla_small_logo',
    )));
    
    // Altezza logo piccolo
    $wp_customize->add_setting('gambla_small_logo_height', array(
        'default' => 40,
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('gambla_small_logo_height', array(
        'label' => 'Altezza Logo Header (px)',
        'section' => 'gambla_logo_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 5,
        ),
    ));
    
    // Sezione Footer
    $wp_customize->add_section('gambla_footer_section', array(
        'title' => 'Footer GAMBLA',
        'priority' => 120,
    ));
    
    // Testo copyright
    $wp_customize->add_setting('gambla_footer_text', array(
        'default' => '© 2024 GAMBLA. Tutti i diritti riservati.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('gambla_footer_text', array(
        'label' => 'Testo Copyright',
        'section' => 'gambla_footer_section',
        'type' => 'text',
    ));
    
    // Titoli sezioni footer
    $footer_sections = array(
        'about' => 'Su GAMBLA',
        'nav' => 'Navigazione', 
        'sport' => 'Sport',
        'community' => 'Community'
    );
    
    foreach ($footer_sections as $key => $default) {
        $wp_customize->add_setting("gambla_footer_{$key}_title", array(
            'default' => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control("gambla_footer_{$key}_title", array(
            'label' => "Titolo Sezione " . ucfirst($key),
            'section' => 'gambla_footer_section',
            'type' => 'text',
        ));
    }
    
    // Testo about
    $wp_customize->add_setting('gambla_footer_about_text', array(
        'default' => 'La piattaforma italiana dedicata al mondo dello sport. Notizie, analisi, fantacalcio e molto altro per tutti gli appassionati.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('gambla_footer_about_text', array(
        'label' => 'Testo Descrizione',
        'section' => 'gambla_footer_section',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'gambla_customize_register');

// Rimuovi elementi non necessari dal head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// Aggiungi classi CSS personalizzate al body
function gambla_body_classes($classes) {
    $classes[] = 'gambla-theme';
    return $classes;
}
add_filter('body_class', 'gambla_body_classes');

// Personalizza l'area admin
function gambla_admin_style() {
    echo '<style>
        #adminmenu, #adminmenuback, #adminmenuwrap {
            background: #0a0a0a;
        }
        #adminmenu .wp-has-current-submenu .wp-submenu a,
        #adminmenu .wp-has-current-submenu .wp-submenu a:focus,
        #adminmenu .wp-has-current-submenu .wp-submenu a:hover,
        #adminmenu a.wp-has-current-submenu:focus+.wp-submenu a {
            color: #FF00FF;
        }
    </style>';
}
add_action('admin_head', 'gambla_admin_style');

// Enqueue script per il customizer
function gambla_customize_preview_js() {
    wp_enqueue_script('gambla-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '3.0.0', true);
}
add_action('customize_preview_init', 'gambla_customize_preview_js');
?>
