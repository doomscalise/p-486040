
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo esc_attr(get_theme_mod('blog_theme_tagline', 'Le notizie più fresche dal mondo dello sport')); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    <?php 
                    $header_logo = get_theme_mod('blog_header_logo');
                    if ($header_logo) {
                        echo '<img src="' . esc_url($header_logo) . '" alt="' . get_bloginfo('name') . '">';
                    }
                    ?>
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
            
            <nav class="main-nav" role="navigation" aria-label="<?php esc_attr_e('Menu principale', 'blog'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => '',
                    'container' => false,
                    'fallback_cb' => false,
                ));
                ?>
                
                <!-- Menu di fallback con link esterni corretti -->
                <?php if (!has_nav_menu('primary')) : ?>
                    <ul>
                        <li><a href="https://gambla.it" target="_blank">Home</a></li>
                        <li><a href="https://gambla.it/fantagambla" target="_blank">FantaGambla</a></li>
                        <li><a href="https://gambla.it/chi-siamo" target="_blank">Chi Siamo</a></li>
                        <li><a href="https://gambla.it/faq" target="_blank">FAQ</a></li>
                        <li><a href="https://gambla.it/newsletter" target="_blank">Newsletter</a></li>
                        <li><a href="https://gambla.it/contatti" target="_blank">Contatti</a></li>
                    </ul>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>

<main class="main-content" role="main">
    <div class="container">
        <div class="page-header">
            <div class="site-branding">
                <div class="site-logo-large">
                    <?php 
                    $main_logo = get_theme_mod('blog_main_logo');
                    if ($main_logo) {
                        echo '<img src="' . esc_url($main_logo) . '" alt="' . get_bloginfo('name') . '">';
                    }
                    ?>
                    <h1 class="site-name"><?php echo esc_html(get_theme_mod('blog_site_name', 'Gambla')); ?></h1>
                </div>
                <p class="page-description">
                    <?php echo esc_html(get_theme_mod('blog_theme_tagline', 'Le notizie più fresche dal mondo dello sport, analisi esclusive e approfondimenti dai nostri esperti')); ?>
                </p>
            </div>
            
            <!-- Struttura professionale per la sezione BLOG -->
            <div class="blog-header-section">
                <h2 class="page-title"><?php echo esc_html(get_theme_mod('blog_page_title', 'BLOG')); ?></h2>
            </div>
        </div>
        
        <?php if (have_posts()) : ?>
            <div class="blog-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post-card fade-in" id="post-<?php the_ID(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(sprintf('Leggi l\'articolo: %s', get_the_title())); ?>">
                                <?php the_post_thumbnail('blog-card', array('class' => 'post-image', 'alt' => get_the_title())); ?>
                            </a>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <?php 
                            $categories = get_the_category();
                            if (!empty($categories)) :
                            ?>
                                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="post-category">
                                    <?php echo esc_html($categories[0]->name); ?>
                                </a>
                            <?php endif; ?>
                            
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="post-excerpt">
                                <?php echo blog_custom_excerpt(25); ?>
                            </div>
                            
                            <div class="post-meta">
                                <div>
                                    <span>👤 <?php echo get_the_author(); ?></span> • 
                                    <span>📅 <?php echo get_the_date('j M Y'); ?></span>
                                    <?php 
                                    $custom_reading_time = get_post_meta(get_the_ID(), '_blog_reading_time', true);
                                    if ($custom_reading_time) :
                                    ?>
                                        • <span>⏱️ <?php echo esc_html($custom_reading_time); ?> min</span>
                                    <?php else : ?>
                                        • <span>⏱️ <?php echo blog_reading_time(); ?></span>
                                    <?php endif; ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="read-more" aria-label="<?php echo esc_attr(sprintf('Leggi l\'articolo completo: %s', get_the_title())); ?>">
                                    Leggi Articolo →
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div style="text-align: center; margin: 4rem 0;">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '← Precedente',
                    'next_text' => 'Successivo →',
                    'screen_reader_text' => 'Navigazione articoli',
                ));
                ?>
            </div>
            
        <?php else : ?>
            <div class="no-posts" style="text-align: center; padding: 6rem 2rem; color: #e0e0e0;">
                <h2 style="background: linear-gradient(135deg, #ff2480, #ff800f); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1.5rem; font-size: 2.5rem;">Contenuti in Arrivo</h2>
                <p style="font-size: 1.2rem;">Stiamo preparando contenuti esclusivi per te. Torna presto per scoprire le ultime novità dal mondo dello sport!</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo"><?php echo esc_html(get_theme_mod('blog_site_name', 'Gambla')); ?></div>
            
            <?php if (has_nav_menu('footer')) : ?>
                <nav class="footer-links" aria-label="<?php esc_attr_e('Menu footer', 'blog'); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => '',
                        'container' => false,
                        'depth' => 1,
                    ));
                    ?>
                </nav>
            <?php else : ?>
                <!-- Link footer corretti al sito principale -->
                <div class="footer-links">
                    <a href="https://gambla.it" target="_blank">Home</a>
                    <a href="https://gambla.it/fantagambla" target="_blank">FantaGambla</a>
                    <a href="https://gambla.it/chi-siamo" target="_blank">Chi Siamo</a>
                    <a href="https://gambla.it/faq" target="_blank">FAQ</a>
                    <a href="https://gambla.it/newsletter" target="_blank">Newsletter</a>
                    <a href="https://gambla.it/contatti" target="_blank">Contatti</a>
                </div>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('footer-widgets')) : ?>
                <div class="footer-widgets">
                    <?php dynamic_sidebar('footer-widgets'); ?>
                </div>
            <?php endif; ?>
            
            <p class="footer-copyright">
                <?php echo esc_html(get_theme_mod('blog_footer_text', '© 2024 GAMBLA. Tutti i diritti riservati.')); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script>
// Animazione fade-in per gli articoli
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.post-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(40px)';
        card.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        observer.observe(card);
    });
});
</script>

</body>
</html>
