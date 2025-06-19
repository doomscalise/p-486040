
<?php
// Evita accesso diretto
if (!defined('ABSPATH')) {
    exit;
}

// Setup del tema
function gambla_blog_setup() {
    // Supporto per traduzioni
    load_theme_textdomain('gambla-blog', get_template_directory() . '/languages');
    
    // Supporto per immagini in evidenza
    add_theme_support('post-thumbnails');
    
    // Supporto per HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Supporto per feed automatici
    add_theme_support('automatic-feed-links');
    
    // Supporto per titolo del documento
    add_theme_support('title-tag');
    
    // Supporto per logo personalizzato
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 100,
        'flex-height' => true,
        'flex-width' => true,
    ));
    
    // Registra menu di navigazione
    register_nav_menus(array(
        'primary' => esc_html__('Menu Principale', 'gambla-blog'),
        'footer' => esc_html__('Menu Footer', 'gambla-blog'),
    ));
    
    // Dimensioni immagini personalizzate
    add_image_size('gambla-card', 400, 200, true);
    add_image_size('gambla-large', 800, 450, true);
    add_image_size('gambla-hero', 1200, 600, true);
}
add_action('after_setup_theme', 'gambla_blog_setup');

// Enqueue styles e scripts
function gambla_blog_scripts() {
    // CSS principale
    wp_enqueue_style('gambla-blog-style', get_stylesheet_uri(), array(), '2.0.0');
    
    // Font Google
    wp_enqueue_style('gambla-blog-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700;800&display=swap', array(), null);
    
    // JavaScript per commenti
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'gambla_blog_scripts');

// Registra sidebar
function gambla_blog_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'gambla-blog'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Aggiungi widget qui.', 'gambla-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Widgets', 'gambla-blog'),
        'id' => 'footer-widgets',
        'description' => esc_html__('Widget per il footer.', 'gambla-blog'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'gambla_blog_widgets_init');

// Customizer per personalizzazione tema
function gambla_blog_customize_register($wp_customize) {
    
    // Sezione Branding
    $wp_customize->add_section('gambla_branding', array(
        'title' => __('Branding', 'gambla-blog'),
        'priority' => 30,
        'description' => __('Personalizza logo e nome del sito', 'gambla-blog'),
    ));
    
    // Logo header
    $wp_customize->add_setting('gambla_blog_header_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'gambla_blog_header_logo', array(
        'label' => __('Logo Header (piccolo)', 'gambla-blog'),
        'section' => 'gambla_branding',
        'settings' => 'gambla_blog_header_logo',
        'description' => __('Logo piccolo per la navbar (consigliato: 40x40px)', 'gambla-blog'),
    )));
    
    // Logo principale
    $wp_customize->add_setting('gambla_blog_main_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'gambla_blog_main_logo', array(
        'label' => __('Logo Principale', 'gambla-blog'),
        'section' => 'gambla_branding',
        'settings' => 'gambla_blog_main_logo',
        'description' => __('Logo grande per la hero section (consigliato: 80x80px)', 'gambla-blog'),
    )));
    
    // Nome sito
    $wp_customize->add_setting('gambla_blog_site_name', array(
        'default' => 'Gambla',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('gambla_blog_site_name', array(
        'label' => __('Nome del Sito', 'gambla-blog'),
        'section' => 'gambla_branding',
        'type' => 'text',
    ));
    
    // Sezione Contenuti
    $wp_customize->add_section('gambla_content', array(
        'title' => __('Contenuti', 'gambla-blog'),
        'priority' => 40,
        'description' => __('Personalizza titoli e descrizioni', 'gambla-blog'),
    ));
    
    // Titolo blog
    $wp_customize->add_setting('gambla_blog_title', array(
        'default' => 'BLOG',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('gambla_blog_title', array(
        'label' => __('Titolo Blog', 'gambla-blog'),
        'section' => 'gambla_content',
        'type' => 'text',
    ));
    
    // Descrizione sito
    $wp_customize->add_setting('gambla_blog_description', array(
        'default' => 'Le notizie più fresche dal mondo dello sport, analisi esclusive e approfondimenti dai nostri esperti',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('gambla_blog_description', array(
        'label' => __('Descrizione del Sito', 'gambla-blog'),
        'section' => 'gambla_content',
        'type' => 'textarea',
        'description' => __('Breve descrizione che appare sotto il nome del sito', 'gambla-blog'),
    ));
    
    // Sezione Footer
    $wp_customize->add_section('gambla_footer', array(
        'title' => __('Footer', 'gambla-blog'),
        'priority' => 50,
        'description' => __('Personalizza il footer', 'gambla-blog'),
    ));
    
    // Testo copyright
    $wp_customize->add_setting('gambla_blog_footer_text', array(
        'default' => '© 2024 GAMBLA. Tutti i diritti riservati.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('gambla_blog_footer_text', array(
        'label' => __('Testo Copyright', 'gambla-blog'),
        'section' => 'gambla_footer',
        'type' => 'text',
    ));
    
    // Sezione Colori
    $wp_customize->add_section('gambla_colors', array(
        'title' => __('Colori Personalizzati', 'gambla-blog'),
        'priority' => 60,
        'description' => __('Personalizza i colori del gradient', 'gambla-blog'),
    ));
    
    // Colore primario
    $wp_customize->add_setting('gambla_primary_color', array(
        'default' => '#ff2480',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_primary_color', array(
        'label' => __('Colore Primario', 'gambla-blog'),
        'section' => 'gambla_colors',
        'settings' => 'gambla_primary_color',
    )));
    
    // Colore secondario
    $wp_customize->add_setting('gambla_secondary_color', array(
        'default' => '#ff800f',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_secondary_color', array(
        'label' => __('Colore Secondario', 'gambla-blog'),
        'section' => 'gambla_colors',
        'settings' => 'gambla_secondary_color',
    )));
    
    // Sezione Social Media
    $wp_customize->add_section('gambla_social', array(
        'title' => __('Social Media', 'gambla-blog'),
        'priority' => 70,
        'description' => __('Link ai social media', 'gambla-blog'),
    ));
    
    // Facebook
    $wp_customize->add_setting('gambla_facebook_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('gambla_facebook_url', array(
        'label' => __('URL Facebook', 'gambla-blog'),
        'section' => 'gambla_social',
        'type' => 'url',
    ));
    
    // Twitter
    $wp_customize->add_setting('gambla_twitter_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('gambla_twitter_url', array(
        'label' => __('URL Twitter', 'gambla-blog'),
        'section' => 'gambla_social',
        'type' => 'url',
    ));
    
    // Instagram
    $wp_customize->add_setting('gambla_instagram_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('gambla_instagram_url', array(
        'label' => __('URL Instagram', 'gambla-blog'),
        'section' => 'gambla_social',
        'type' => 'url',
    ));
}
add_action('customize_register', 'gambla_blog_customize_register');

// Aggiungi CSS personalizzato per i colori del customizer
function gambla_blog_customizer_css() {
    $primary_color = get_theme_mod('gambla_primary_color', '#ff2480');
    $secondary_color = get_theme_mod('gambla_secondary_color', '#ff800f');
    
    if ($primary_color !== '#ff2480' || $secondary_color !== '#ff800f') {
        ?>
        <style type="text/css">
            :root {
                --gambla-primary: <?php echo esc_attr($primary_color); ?>;
                --gambla-secondary: <?php echo esc_attr($secondary_color); ?>;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'gambla_blog_customizer_css');

// Funzione per calcolare tempo di lettura
function gambla_reading_time($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // 200 parole al minuto
    
    return $reading_time . ' min';
}

// Meta box per tempo di lettura personalizzato
function gambla_add_reading_time_meta_box() {
    add_meta_box(
        'gambla_reading_time',
        __('Tempo di Lettura', 'gambla-blog'),
        'gambla_reading_time_callback',
        'post',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'gambla_add_reading_time_meta_box');

function gambla_reading_time_callback($post) {
    wp_nonce_field('gambla_reading_time_nonce', 'gambla_reading_time_nonce');
    $value = get_post_meta($post->ID, '_gambla_reading_time', true);
    ?>
    <label for="gambla_reading_time_field"><?php _e('Minuti di lettura (lascia vuoto per calcolo automatico):', 'gambla-blog'); ?></label>
    <input type="number" id="gambla_reading_time_field" name="gambla_reading_time_field" value="<?php echo esc_attr($value); ?>" min="1" max="60" />
    <?php
}

function gambla_save_reading_time($post_id) {
    if (!isset($_POST['gambla_reading_time_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['gambla_reading_time_nonce'], 'gambla_reading_time_nonce')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['gambla_reading_time_field'])) {
        update_post_meta($post_id, '_gambla_reading_time', sanitize_text_field($_POST['gambla_reading_time_field']));
    }
}
add_action('save_post', 'gambla_save_reading_time');

// Aggiungi supporto per excerpt personalizzato
function gambla_custom_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'gambla_custom_excerpt_length', 999);

function gambla_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'gambla_custom_excerpt_more');

// Ottimizzazioni performance
function gambla_blog_performance_optimizations() {
    // Rimuovi emoji se non necessari
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    
    // Rimuovi versioni dai CSS e JS
    add_filter('style_loader_src', 'gambla_remove_version_scripts_styles', 9999);
    add_filter('script_loader_src', 'gambla_remove_version_scripts_styles', 9999);
}
add_action('init', 'gambla_blog_performance_optimizations');

function gambla_remove_version_scripts_styles($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

// Sicurezza - Rimuovi info WordPress
remove_action('wp_head', 'wp_generator');

// Supporto per WordPress SEO
function gambla_blog_seo_support() {
    if (!current_theme_supports('title-tag')) {
        add_theme_support('title-tag');
    }
}
add_action('after_setup_theme', 'gambla_blog_seo_support');
?>
