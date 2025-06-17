
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                <?php 
                $small_logo = get_theme_mod('gambla_small_logo');
                $logo_height = get_theme_mod('gambla_small_logo_height', 40);
                
                if ($small_logo) {
                    echo '<img src="' . esc_url($small_logo) . '" alt="' . get_bloginfo('name') . '" style="height: ' . $logo_height . 'px; width: auto; max-height: 60px; object-fit: contain;">';
                } elseif (has_custom_logo()) {
                    the_custom_logo();
                }
                
                echo '<span style="margin-left: 10px;">' . get_bloginfo('name', 'display') . '</span>';
                ?>
            </a>
            
            <nav class="main-nav">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => '',
                        'container' => false,
                        'fallback_cb' => 'gambla_default_menu'
                    ));
                } else {
                    gambla_default_menu();
                }
                ?>
            </nav>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" style="display: none; background: none; border: none; color: white; font-size: 1.5rem; cursor: pointer;">
                ☰
            </button>
        </div>
    </div>
</header>

<?php
// Default menu fallback
function gambla_default_menu() {
    echo '<ul>';
    
    // Get pages and create menu dynamically
    $pages = array(
        'Home' => home_url('/'),
        'Blog' => home_url('/blog'),
        'FantaGambla' => home_url('/fantagambla'),
        'Chi Siamo' => home_url('/chi-siamo'),
        'FAQ' => home_url('/faq'),
        'Newsletter' => home_url('/newsletter'),
        'Contatti' => home_url('/contatti'),
        'Unisciti Ora' => home_url('/unisciti-ora')
    );
    
    $current_url = home_url($_SERVER['REQUEST_URI']);
    
    foreach ($pages as $title => $url) {
        $active_class = ($current_url == $url) ? ' class="active"' : '';
        echo '<li><a href="' . esc_url($url) . '"' . $active_class . '>' . esc_html($title) . '</a></li>';
    }
    
    echo '</ul>';
}
?>
