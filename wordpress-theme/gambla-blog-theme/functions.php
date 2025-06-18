
<?php
// GAMBLA Blog Theme Functions

// Supporto per le immagini in evidenza
add_theme_support('post-thumbnails');

// Menu personalizzato
function gambla_blog_menus() {
    register_nav_menus(array(
        'primary' => 'Menu Principale',
    ));
}
add_action('init', 'gambla_blog_menus');

// Enqueue degli stili e script
function gambla_blog_styles() {
    wp_enqueue_style('gambla-blog-style', get_stylesheet_uri());
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700;800&display=swap');
}
add_action('wp_enqueue_scripts', 'gambla_blog_styles');

// Dimensioni delle immagini personalizzate
add_image_size('gambla-card', 400, 250, true);
add_image_size('gambla-large', 800, 400, true);

// Rimuovi elementi non necessari dal wp_head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// Personalizza l'excerpt
function gambla_custom_excerpt($limit = 25) {
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
function gambla_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return $reading_time . ' min lettura';
}

// Personalizza il login
function gambla_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('<?php echo get_template_directory_uri(); ?>/images/logo.png');
            height: 65px;
            width: 320px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
        .login {
            background: #0a0a0a !important;
        }
        .login #login {
            background: linear-gradient(135deg, #FF00FF, #FF6600);
            padding: 2rem;
            border-radius: 20px;
        }
        .login form {
            background: #1a1a1a;
            border-radius: 15px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'gambla_login_logo');

// Supporto per il customizer
function gambla_blog_customize_register($wp_customize) {
    // Sezione Blog
    $wp_customize->add_section('gambla_blog_section', array(
        'title' => 'Impostazioni Blog GAMBLA',
        'priority' => 30,
    ));
    
    // Tagline del blog
    $wp_customize->add_setting('gambla_blog_tagline', array(
        'default' => 'Le notizie più fresche dal mondo dello sport',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('gambla_blog_tagline', array(
        'label' => 'Tagline del Blog',
        'section' => 'gambla_blog_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'gambla_blog_customize_register');
?>
