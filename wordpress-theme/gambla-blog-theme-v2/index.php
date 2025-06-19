
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo esc_attr(get_theme_mod('gambla_blog_description', 'Le notizie più fresche dal mondo dello sport')); ?>">
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <!-- Logo piccolo e discreto -->
            <a href="https://gambla.it" target="_blank" rel="noopener noreferrer" class="site-logo">
                <?php 
                $header_logo = get_theme_mod('gambla_blog_header_logo');
                if ($header_logo) {
                    echo '<img src="' . esc_url($header_logo) . '" alt="Gambla Logo">';
                }
                ?>
                Gambla
            </a>
            
            <!-- Navigation Menu -->
            <nav class="main-nav" role="navigation" aria-label="Menu principale">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => '',
                        'container' => false,
                        'fallback_cb' => false,
                    ));
                } else {
                ?>
                    <ul>
                        <li><a href="https://gambla.it" target="_blank" rel="noopener noreferrer">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Blog</a></li>
                        <li><a href="https://gambla.it/fantagambla" target="_blank" rel="noopener noreferrer">FantaGambla</a></li>
                        <li><a href="https://gambla.it/chi-siamo" target="_blank" rel="noopener noreferrer">Chi Siamo</a></li>
                        <li><a href="https://gambla.it/faq" target="_blank" rel="noopener noreferrer">FAQ</a></li>
                        <li><a href="https://gambla.it/newsletter" target="_blank" rel="noopener noreferrer">Newsletter</a></li>
                        <li><a href="https://gambla.it/contatti" target="_blank" rel="noopener noreferrer">Contatti</a></li>
                        <li><a href="https://gambla.it/unisciti-ora" target="_blank" rel="noopener noreferrer" class="join-btn">Unisciti Ora</a></li>
                    </ul>
                <?php } ?>
            </nav>
        </div>
    </div>
</header>

<main class="main-content" role="main">
    <div class="container">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="hero-branding">
                <div class="hero-logo">
                    <?php 
                    $main_logo = get_theme_mod('gambla_blog_main_logo');
                    if ($main_logo) {
                        echo '<img src="' . esc_url($main_logo) . '" alt="Gambla">';
                    }
                    ?>
                    <h1 class="site-title"><?php echo esc_html(get_theme_mod('gambla_blog_site_name', 'Gambla')); ?></h1>
                </div>
                <p class="site-description">
                    <?php echo esc_html(get_theme_mod('gambla_blog_description', 'Le notizie più fresche dal mondo dello sport, analisi esclusive e approfondimenti dai nostri esperti')); ?>
                </p>
            </div>
            
            <h2 class="blog-title"><?php echo esc_html(get_theme_mod('gambla_blog_title', 'BLOG')); ?></h2>
        </div>
        
        <!-- Blog Posts Grid -->
        <?php if (have_posts()) : ?>
            <div class="blog-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post-card fade-in" id="post-<?php the_ID(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(sprintf('Leggi: %s', get_the_title())); ?>">
                                <?php the_post_thumbnail('large', array('class' => 'post-image', 'alt' => get_the_title())); ?>
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
                                <?php 
                                $excerpt = get_the_excerpt();
                                echo wp_trim_words($excerpt, 20, '...');
                                ?>
                            </div>
                            
                            <div class="post-meta">
                                <div>
                                    <span>👤 <?php echo get_the_author(); ?></span> • 
                                    <span>📅 <?php echo get_the_date('j M Y'); ?></span>
                                    <?php 
                                    $reading_time = get_post_meta(get_the_ID(), '_gambla_reading_time', true);
                                    if ($reading_time) :
                                    ?>
                                        • <span>⏱️ <?php echo esc_html($reading_time); ?> min</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more" aria-label="<?php echo esc_attr(sprintf('Leggi tutto: %s', get_the_title())); ?>">
                                Leggi Tutto
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <div style="text-align: center; margin: 3rem 0;">
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
            <div class="no-posts" style="text-align: center; padding: 4rem 2rem; color: var(--gambla-text-muted);">
                <h2 style="background: linear-gradient(135deg, var(--gambla-primary), var(--gambla-secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem; font-size: 2rem;">Contenuti in Arrivo</h2>
                <p style="font-size: 1.1rem;">Stiamo preparando contenuti esclusivi per te. Torna presto!</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo"><?php echo esc_html(get_theme_mod('gambla_blog_site_name', 'Gambla')); ?></div>
            
            <?php if (has_nav_menu('footer')) : ?>
                <nav class="footer-links" aria-label="Menu footer">
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
                <div class="footer-links">
                    <a href="https://gambla.it" target="_blank" rel="noopener noreferrer">Home</a>
                    <a href="https://gambla.it/fantagambla" target="_blank" rel="noopener noreferrer">FantaGambla</a>
                    <a href="https://gambla.it/chi-siamo" target="_blank" rel="noopener noreferrer">Chi Siamo</a>
                    <a href="https://gambla.it/faq" target="_blank" rel="noopener noreferrer">FAQ</a>
                    <a href="https://gambla.it/newsletter" target="_blank" rel="noopener noreferrer">Newsletter</a>
                    <a href="https://gambla.it/contatti" target="_blank" rel="noopener noreferrer">Contatti</a>
                </div>
            <?php endif; ?>
            
            <p class="footer-copyright">
                <?php echo esc_html(get_theme_mod('gambla_blog_footer_text', '© 2024 GAMBLA. Tutti i diritti riservati.')); ?>
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
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>

</body>
</html>
