<?php
// Blog Theme Functions - Completamente editabile

// Supporto completo per WordPress
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');
add_theme_support('custom-header');
add_theme_support('custom-background');
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
add_theme_support('editor-styles');
add_theme_support('wp-block-styles');
add_theme_support('align-wide');

// Menu personalizzato
function blog_theme_menus() {
    register_nav_menus(array(
        'primary' => 'Menu Principale',
        'footer' => 'Menu Footer',
    ));
}
add_action('init', 'blog_theme_menus');

// Enqueue degli stili e script
function blog_theme_styles() {
    wp_enqueue_style('blog-theme-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700;800&display=swap');
    
    // Script per interattività
    wp_enqueue_script('blog-theme-script', get_template_directory_uri() . '/js/blog-theme.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'blog_theme_styles');

// Dimensioni delle immagini personalizzate
add_image_size('blog-card', 400, 280, true);
add_image_size('blog-large', 900, 450, true);
add_image_size('blog-hero', 1200, 600, true);

// Rimuovi elementi non necessari dal wp_head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// Personalizza l'excerpt
function blog_custom_excerpt($limit = 30) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    return $excerpt;
}

// Calcola il tempo di lettura
function blog_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return $reading_time . ' min lettura';
}

// Widget areas
function blog_theme_widgets_init() {
    register_sidebar(array(
        'name' => 'Sidebar Principale',
        'id' => 'main-sidebar',
        'description' => 'Widget area nella sidebar',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => 'Footer Widget Area',
        'id' => 'footer-widgets',
        'description' => 'Widget area nel footer',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'blog_theme_widgets_init');

// Personalizza il login
function blog_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('<?php echo get_template_directory_uri(); ?>/images/logo.png');
            height: 80px;
            width: 320px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
        .login {
            background: #0a0a0a !important;
        }
        .login #login {
            background: linear-gradient(135deg, #ff2480, #ff800f);
            padding: 3rem;
            border-radius: 25px;
        }
        .login form {
            background: #1a1a1a;
            border-radius: 20px;
        }
        .login form .input {
            background: #000;
            border: 1px solid #444;
            color: #fff;
        }
        .login #nav a, .login #backtoblog a {
            color: #ff2480 !important;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'blog_login_logo');

// Supporto per il customizer - POTENZIATO con nuove opzioni
function blog_theme_customize_register($wp_customize) {
    // Sezione Branding
    $wp_customize->add_section('blog_branding_section', array(
        'title' => 'Branding e Logo',
        'priority' => 25,
    ));
    
    // Nome del sito
    $wp_customize->add_setting('blog_site_name', array(
        'default' => 'Gambla',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('blog_site_name', array(
        'label' => 'Nome del Sito',
        'section' => 'blog_branding_section',
        'type' => 'text',
    ));
    
    // Logo header
    $wp_customize->add_setting('blog_header_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'blog_header_logo', array(
        'label' => 'Logo Header (piccolo)',
        'section' => 'blog_branding_section',
    )));
    
    // Logo principale
    $wp_customize->add_setting('blog_main_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'blog_main_logo', array(
        'label' => 'Logo Principale (grande)',
        'section' => 'blog_branding_section',
    )));
    
    // Titolo pagina BLOG
    $wp_customize->add_setting('blog_page_title', array(
        'default' => 'BLOG',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('blog_page_title', array(
        'label' => 'Titolo Pagina BLOG',
        'section' => 'blog_branding_section',
        'type' => 'text',
    ));
    
    // Sezione Colori
    $wp_customize->add_section('blog_colors_section', array(
        'title' => 'Colori e Gradients',
        'priority' => 30,
    ));
    
    // Colore primario
    $wp_customize->add_setting('blog_primary_color', array(
        'default' => '#ff2480',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blog_primary_color', array(
        'label' => 'Colore Primario (Magenta)',
        'section' => 'blog_colors_section',
    )));
    
    // Colore secondario
    $wp_customize->add_setting('blog_secondary_color', array(
        'default' => '#ff800f',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blog_secondary_color', array(
        'label' => 'Colore Secondario (Arancione)',
        'section' => 'blog_colors_section',
    )));
    
    // Colore di sfondo
    $wp_customize->add_setting('blog_bg_color', array(
        'default' => '#0a0a0a',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blog_bg_color', array(
        'label' => 'Colore Sfondo',
        'section' => 'blog_colors_section',
    )));
    
    // Sezione Typography
    $wp_customize->add_section('blog_typography_section', array(
        'title' => 'Tipografia',
        'priority' => 31,
    ));
    
    // Font principale
    $wp_customize->add_setting('blog_font_primary', array(
        'default' => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('blog_font_primary', array(
        'label' => 'Font Principale',
        'section' => 'blog_typography_section',
        'type' => 'select',
        'choices' => array(
            'Inter' => 'Inter',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Lato' => 'Lato',
            'Poppins' => 'Poppins',
        ),
    ));
    
    // Font titoli
    $wp_customize->add_setting('blog_font_display', array(
        'default' => 'Montserrat',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('blog_font_display', array(
        'label' => 'Font Titoli',
        'section' => 'blog_typography_section',
        'type' => 'select',
        'choices' => array(
            'Montserrat' => 'Montserrat',
            'Oswald' => 'Oswald',
            'Playfair Display' => 'Playfair Display',
            'Raleway' => 'Raleway',
            'Source Sans Pro' => 'Source Sans Pro',
        ),
    ));
    
    // Dimensione font base
    $wp_customize->add_setting('blog_font_size', array(
        'default' => '18',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('blog_font_size', array(
        'label' => 'Dimensione Font Base (px)',
        'section' => 'blog_typography_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 14,
            'max' => 24,
        ),
    ));
    
    // Sezione Layout
    $wp_customize->add_section('blog_layout_section', array(
        'title' => 'Layout e Spaziature',
        'priority' => 32,
    ));
    
    // Larghezza container
    $wp_customize->add_setting('blog_container_width', array(
        'default' => '1200',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('blog_container_width', array(
        'label' => 'Larghezza Container (px)',
        'section' => 'blog_layout_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 960,
            'max' => 1400,
        ),
    ));
    
    // Altezza header
    $wp_customize->add_setting('blog_header_height', array(
        'default' => '70',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('blog_header_height', array(
        'label' => 'Altezza Header (px)',
        'section' => 'blog_layout_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 60,
            'max' => 120,
        ),
    ));
    
    // Sezione Blog
    $wp_customize->add_section('blog_theme_section', array(
        'title' => 'Impostazioni Blog',
        'priority' => 33,
    ));
    
    // Tagline del blog
    $wp_customize->add_setting('blog_theme_tagline', array(
        'default' => 'Le notizie più fresche dal mondo dello sport, analisi esclusive e approfondimenti dai nostri esperti',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('blog_theme_tagline', array(
        'label' => 'Tagline del Blog',
        'section' => 'blog_theme_section',
        'type' => 'textarea',
    ));
    
    // Numero articoli per pagina
    $wp_customize->add_setting('blog_posts_per_page', array(
        'default' => '6',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('blog_posts_per_page', array(
        'label' => 'Articoli per Pagina',
        'section' => 'blog_theme_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 3,
            'max' => 12,
        ),
    ));
    
    // Sezione Footer
    $wp_customize->add_section('blog_footer_section', array(
        'title' => 'Footer',
        'priority' => 34,
    ));
    
    // URL sito principale
    $wp_customize->add_setting('blog_main_site_url', array(
        'default' => 'https://gambla.it',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('blog_main_site_url', array(
        'label' => 'URL Sito Principale',
        'section' => 'blog_footer_section',
        'type' => 'url',
    ));
    
    // Testo footer
    $wp_customize->add_setting('blog_footer_text', array(
        'default' => '© 2024 GAMBLA. Tutti i diritti riservati.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('blog_footer_text', array(
        'label' => 'Testo Copyright',
        'section' => 'blog_footer_section',
        'type' => 'text',
    ));
    
    // Sezione Social
    $wp_customize->add_section('blog_social_section', array(
        'title' => 'Social Media',
        'priority' => 35,
    ));
    
    // Instagram
    $wp_customize->add_setting('blog_instagram_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('blog_instagram_url', array(
        'label' => 'URL Instagram',
        'section' => 'blog_social_section',
        'type' => 'url',
    ));
    
    // YouTube
    $wp_customize->add_setting('blog_youtube_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('blog_youtube_url', array(
        'label' => 'URL YouTube',
        'section' => 'blog_social_section',
        'type' => 'url',
    ));
    
    // TikTok
    $wp_customize->add_setting('blog_tiktok_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('blog_tiktok_url', array(
        'label' => 'URL TikTok',
        'section' => 'blog_social_section',
        'type' => 'url',
    ));
    
    // Sezione Menu personalizzato
    $wp_customize->add_section('blog_menu_section', array(
        'title' => 'Personalizzazione Menu',
        'priority' => 36,
    ));
    
    // Dimensione font menu
    $wp_customize->add_setting('blog_menu_font_size', array(
        'default' => '0.85',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('blog_menu_font_size', array(
        'label' => 'Dimensione Font Menu (rem)',
        'section' => 'blog_menu_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 0.7,
            'max' => 1.2,
            'step' => 0.05,
        ),
    ));
}
add_action('customize_register', 'blog_theme_customize_register');

// Genera CSS personalizzato dal customizer
function blog_theme_custom_css() {
    $primary_color = get_theme_mod('blog_primary_color', '#ff2480');
    $secondary_color = get_theme_mod('blog_secondary_color', '#ff800f');
    $bg_color = get_theme_mod('blog_bg_color', '#0a0a0a');
    $font_primary = get_theme_mod('blog_font_primary', 'Inter');
    $font_display = get_theme_mod('blog_font_display', 'Montserrat');
    $font_size = get_theme_mod('blog_font_size', '18');
    $container_width = get_theme_mod('blog_container_width', '1200');
    $header_height = get_theme_mod('blog_header_height', '70');
    $menu_font_size = get_theme_mod('blog_menu_font_size', '0.85');
    
    ?>
    <style type="text/css">
        :root {
            --gambla-magenta: <?php echo $primary_color; ?>;
            --gambla-orange: <?php echo $secondary_color; ?>;
            --gambla-dark: <?php echo $bg_color; ?>;
            --font-primary: '<?php echo $font_primary; ?>', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-display: '<?php echo $font_display; ?>', sans-serif;
        }
        
        body {
            font-family: var(--font-primary);
            font-size: <?php echo $font_size; ?>px;
            background: var(--gambla-dark);
        }
        
        .container {
            max-width: <?php echo $container_width; ?>px;
        }
        
        .main-content {
            padding-top: <?php echo $header_height; ?>px;
        }
        
        .main-nav a {
            font-size: <?php echo $menu_font_size; ?>rem;
        }
        
        h1, h2, h3, h4, h5, h6,
        .page-title,
        .post-title,
        .site-logo,
        .footer-logo,
        .site-name {
            font-family: var(--font-display);
        }
    </style>
    <?php
}
add_action('wp_head', 'blog_theme_custom_css');

// Aggiungi editor styles
function blog_theme_add_editor_styles() {
    add_editor_style('editor-style.css');
}
add_action('admin_init', 'blog_theme_add_editor_styles');

// Personalizza l'admin
function blog_theme_admin_styles() {
    echo '<style>
        #adminmenu, #wpadminbar {
            background: linear-gradient(135deg, #ff2480, #ff800f);
        }
        .wp-admin #wpbody-content {
            background: #f8f9fa;
        }
    </style>';
}
add_action('admin_head', 'blog_theme_admin_styles');

// Aggiungi meta box per articoli
function blog_theme_add_meta_boxes() {
    add_meta_box(
        'blog_article_settings',
        'Impostazioni Articolo',
        'blog_theme_article_meta_box',
        'post',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'blog_theme_add_meta_boxes');

function blog_theme_article_meta_box($post) {
    wp_nonce_field('blog_theme_save_meta', 'blog_theme_meta_nonce');
    
    $featured = get_post_meta($post->ID, '_blog_featured', true);
    $reading_time = get_post_meta($post->ID, '_blog_reading_time', true);
    
    echo '<p><label><input type="checkbox" name="blog_featured" value="1" ' . checked($featured, '1', false) . '> Articolo in evidenza</label></p>';
    echo '<p><label>Tempo di lettura (min): <input type="number" name="blog_reading_time" value="' . esc_attr($reading_time) . '" style="width: 60px;"></label></p>';
}

function blog_theme_save_meta($post_id) {
    if (!isset($_POST['blog_theme_meta_nonce']) || !wp_verify_nonce($_POST['blog_theme_meta_nonce'], 'blog_theme_save_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    update_post_meta($post_id, '_blog_featured', isset($_POST['blog_featured']) ? '1' : '0');
    update_post_meta($post_id, '_blog_reading_time', sanitize_text_field($_POST['blog_reading_time']));
}
add_action('save_post', 'blog_theme_save_meta');

// Abilita i commenti threaded
function blog_theme_enqueue_comment_reply() {
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'blog_theme_enqueue_comment_reply');

// Personalizza i commenti
function blog_theme_comment_form_defaults($defaults) {
    $defaults['class_submit'] = 'gambla-btn';
    $defaults['submit_button'] = '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />';
    return $defaults;
}
add_filter('comment_form_defaults', 'blog_theme_comment_form_defaults');
?>
