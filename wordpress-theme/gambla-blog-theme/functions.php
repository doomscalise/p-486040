
<?php
// Tema GAMBLA Blog - Functions.php

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

// Enqueue degli stili e script
function gambla_blog_scripts() {
    wp_enqueue_style('gambla-blog-style', get_stylesheet_uri(), array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'gambla_blog_scripts');

// Registra i menu
function gambla_blog_menus() {
    register_nav_menus(array(
        'primary' => 'Menu Principale',
        'footer' => 'Menu Footer'
    ));
}
add_action('init', 'gambla_blog_menus');

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

// Rimuovi elementi non necessari dal head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// Abilita supporto per Gutenberg
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

// Disabilita commenti per default
function gambla_disable_comments() {
    return false;
}
add_filter('comments_open', 'gambla_disable_comments', 20, 2);
add_filter('pings_open', 'gambla_disable_comments', 20, 2);

// Aggiungi classi CSS personalizzate al body
function gambla_body_classes($classes) {
    $classes[] = 'gambla-blog-theme';
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
?>
