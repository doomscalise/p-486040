
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
                GAMBLA
            </a>
            
            <nav class="main-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => '',
                    'container' => false,
                    'fallback_cb' => 'gambla_default_menu'
                ));
                ?>
            </nav>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" style="display: none;">
                ☰
            </button>
        </div>
    </div>
</header>

<?php
// Default menu fallback
function gambla_default_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog')) . '">Blog</a></li>';
    echo '<li><a href="' . esc_url(home_url('/fantagambla')) . '">FantaGambla</a></li>';
    echo '<li><a href="' . esc_url(home_url('/chi-siamo')) . '">Chi Siamo</a></li>';
    echo '<li><a href="' . esc_url(home_url('/faq')) . '">FAQ</a></li>';
    echo '<li><a href="' . esc_url(home_url('/newsletter')) . '">Newsletter</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contatti')) . '">Contatti</a></li>';
    echo '</ul>';
}
?>
