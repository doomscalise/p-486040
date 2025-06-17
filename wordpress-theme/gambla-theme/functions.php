
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
}
add_action('after_setup_theme', 'gambla_theme_setup');

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

// Customizer Controls
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
    
    // Colors Section
    $wp_customize->add_section('gambla_colors', array(
        'title' => 'GAMBLA Colors',
        'priority' => 30,
    ));
    
    // Primary Color
    $wp_customize->add_setting('gambla_primary_color', array(
        'default' => '#FF1493',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_primary_color', array(
        'label' => 'Primary Color',
        'section' => 'gambla_colors',
    )));
    
    // Secondary Color
    $wp_customize->add_setting('gambla_secondary_color', array(
        'default' => '#FF8C00',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gambla_secondary_color', array(
        'label' => 'Secondary Color',
        'section' => 'gambla_colors',
    )));
    
    // Typography Section
    $wp_customize->add_section('gambla_typography', array(
        'title' => 'GAMBLA Typography',
        'priority' => 31,
    ));
    
    // Primary Font
    $wp_customize->add_setting('gambla_primary_font', array(
        'default' => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_primary_font', array(
        'label' => 'Primary Font',
        'section' => 'gambla_typography',
        'type' => 'select',
        'choices' => array(
            'Inter' => 'Inter',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Lato' => 'Lato',
            'Poppins' => 'Poppins',
        ),
    ));
    
    // Display Font
    $wp_customize->add_setting('gambla_display_font', array(
        'default' => 'Montserrat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_display_font', array(
        'label' => 'Display Font (Headings)',
        'section' => 'gambla_typography',
        'type' => 'select',
        'choices' => array(
            'Montserrat' => 'Montserrat',
            'Oswald' => 'Oswald',
            'Bebas Neue' => 'Bebas Neue',
            'Anton' => 'Anton',
            'Righteous' => 'Righteous',
        ),
    ));
    
    // Homepage Content Section
    $wp_customize->add_section('gambla_homepage', array(
        'title' => 'Homepage Content',
        'priority' => 32,
    ));
    
    // Hero Title
    $wp_customize->add_setting('gambla_hero_title', array(
        'default' => 'Accendi la Tua Passione Sportiva',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_hero_title', array(
        'label' => 'Hero Title',
        'section' => 'gambla_homepage',
        'type' => 'text',
    ));
    
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('gambla_hero_title', array(
            'selector' => '.hero-title',
            'render_callback' => 'gambla_customize_partial_hero_title',
        ));
    }
    
    // Hero Subtitle
    $wp_customize->add_setting('gambla_hero_subtitle', array(
        'default' => 'Unisciti alla community sportiva più dinamica d\'Italia',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_hero_subtitle', array(
        'label' => 'Hero Subtitle',
        'section' => 'gambla_homepage',
        'type' => 'textarea',
    ));
    
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('gambla_hero_subtitle', array(
            'selector' => '.hero-subtitle',
            'render_callback' => 'gambla_customize_partial_hero_subtitle',
        ));
    }
    
    // Blog Section
    $wp_customize->add_section('gambla_blog', array(
        'title' => 'Blog Settings',
        'priority' => 33,
    ));
    
    // Blog Title
    $wp_customize->add_setting('gambla_blog_title', array(
        'default' => 'Il Blog di GAMBLA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    
    $wp_customize->add_control('gambla_blog_title', array(
        'label' => 'Blog Page Title',
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
        'label' => 'Blog Page Description',
        'section' => 'gambla_blog',
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

// Output Custom CSS
function gambla_custom_css() {
    $primary_color = get_theme_mod('gambla_primary_color', '#FF1493');
    $secondary_color = get_theme_mod('gambla_secondary_color', '#FF8C00');
    $primary_font = get_theme_mod('gambla_primary_font', 'Inter');
    $display_font = get_theme_mod('gambla_display_font', 'Montserrat');
    
    echo '<style type="text/css" id="gambla-custom-css">';
    echo ':root {';
    echo '--gambla-primary: ' . esc_attr($primary_color) . ';';
    echo '--gambla-secondary: ' . esc_attr($secondary_color) . ';';
    echo '--font-primary: "' . esc_attr($primary_font) . '", sans-serif;';
    echo '--font-display: "' . esc_attr($display_font) . '", sans-serif;';
    echo '}';
    echo '</style>';
}
add_action('wp_head', 'gambla_custom_css');

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

?>
