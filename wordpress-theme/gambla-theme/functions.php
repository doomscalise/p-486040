
<?php

// Enqueue styles and scripts
function gambla_theme_styles() {
    wp_enqueue_style('gambla-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'gambla_theme_styles');

// Theme support
function gambla_theme_setup() {
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Add theme support for custom logo
    add_theme_support('custom-logo');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
}
add_action('after_setup_theme', 'gambla_theme_setup');

// Custom excerpt length
function gambla_custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'gambla_custom_excerpt_length');

// Custom excerpt more
function gambla_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'gambla_custom_excerpt_more');

// Add custom categories
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
        if (!get_cat_ID($cat_name)) {
            wp_insert_category(array(
                'cat_name' => $cat_name,
                'category_description' => $cat_description,
                'category_nicename' => sanitize_title($cat_name)
            ));
        }
    }
}
add_action('after_setup_theme', 'gambla_create_default_categories');

// Add reading time function
function gambla_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // 200 words per minute
    
    return max(1, $reading_time) . ' min';
}

// Custom post meta for reading time
function gambla_add_reading_time_meta() {
    global $post;
    if ($post && $post->post_type == 'post') {
        echo '<div style="color: #666; font-size: 0.875rem; margin: 0.5rem 0;">';
        echo 'Tempo di lettura: ' . gambla_reading_time();
        echo '</div>';
    }
}
add_action('wp_head', function() {
    if (is_single()) {
        add_action('the_content', 'gambla_add_reading_time_meta', 1);
    }
});

// Optimize images
function gambla_add_image_sizes() {
    add_image_size('gambla-card', 400, 250, true);
    add_image_size('gambla-hero', 800, 400, true);
}
add_action('after_setup_theme', 'gambla_add_image_sizes');

// Remove WordPress default styles for a cleaner look
function gambla_remove_wp_styles() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'gambla_remove_wp_styles', 100);

// Custom post navigation
function gambla_post_navigation() {
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    
    if ($prev_post || $next_post) {
        echo '<nav class="post-navigation">';
        if ($prev_post) {
            echo '<a href="' . get_permalink($prev_post) . '" class="nav-previous">← ' . get_the_title($prev_post) . '</a>';
        }
        if ($next_post) {
            echo '<a href="' . get_permalink($next_post) . '" class="nav-next">' . get_the_title($next_post) . ' →</a>';
        }
        echo '</nav>';
    }
}

?>
