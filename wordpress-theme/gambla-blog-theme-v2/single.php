
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo esc_attr(wp_trim_words(get_the_excerpt(), 25)); ?>">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php the_title(); ?>">
    <meta property="og:description" content="<?php echo esc_attr(wp_trim_words(get_the_excerpt(), 25)); ?>">
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>">
    <meta property="og:url" content="<?php the_permalink(); ?>">
    <meta property="og:type" content="article">
    
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
            <!-- Logo piccolo -->
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
            <nav class="main-nav"  role="navigation" aria-label="Menu principale">
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
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="single-post fade-in" id="post-<?php the_ID(); ?>">
                    <header class="post-header">
                        <h1 class="post-title"><?php the_title(); ?></h1>
                        
                        <div class="post-meta">
                            <span>👤 <?php echo get_the_author(); ?></span>
                            <span>📅 <?php echo get_the_date('j M Y'); ?></span>
                            <?php 
                            $reading_time = get_post_meta(get_the_ID(), '_gambla_reading_time', true);
                            if ($reading_time) :
                            ?>
                                <span>⏱️ <?php echo esc_html($reading_time); ?> min lettura</span>
                            <?php endif; ?>
                            <?php if (function_exists('pvc_get_post_views')) : ?>
                                <span>👁️ <?php echo pvc_get_post_views(); ?> visualizzazioni</span>
                            <?php endif; ?>
                        </div>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array(
                                'class' => 'post-featured-image',
                                'alt' => get_the_title(),
                                'loading' => 'eager'
                            )); ?>
                        <?php endif; ?>
                    </header>
                    
                    <div class="post-content">
                        <?php 
                        the_content();
                        
                        wp_link_pages(array(
                            'before' => '<div class="page-links" style="margin: 2rem 0; text-align: center;"><span style="background: linear-gradient(135deg, var(--gambla-primary), var(--gambla-secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold;">Pagine: </span>',
                            'after' => '</div>',
                            'pagelink' => '<span class="gambla-btn" style="margin: 0 0.5rem;">%</span>',
                        ));
                        ?>
                    </div>
                    
                    <!-- Tags -->
                    <?php 
                    $tags = get_the_tags();
                    if ($tags) :
                    ?>
                        <div style="margin: 3rem 0; padding: 2rem; border-radius: var(--border-radius);" class="gradient-border">
                            <h3 style="background: linear-gradient(135deg, var(--gambla-primary), var(--gambla-secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem;">Tag Articolo</h3>
                            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                                <?php foreach ($tags as $tag) : ?>
                                    <a href="<?php echo get_tag_link($tag->term_id); ?>" 
                                       style="background: linear-gradient(135deg, var(--gambla-primary), var(--gambla-secondary)); color: white; padding: 0.5rem 1rem; border-radius: 15px; text-decoration: none; font-size: 0.8rem; font-weight: 600;">
                                        #<?php echo $tag->name; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Social Share -->
                    <div style="margin: 3rem 0; padding: 2rem; border-radius: var(--border-radius); text-align: center;" class="gradient-border">
                        <h3 style="background: linear-gradient(135deg, var(--gambla-primary), var(--gambla-secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1.5rem; font-size: 1.3rem;">Condividi questo articolo</h3>
                        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" class="gambla-btn" rel="noopener">
                                📘 Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                               target="_blank" class="gambla-btn" rel="noopener">
                                🐦 Twitter
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" 
                               target="_blank" class="gambla-btn" rel="noopener">
                                💬 WhatsApp
                            </a>
                        </div>
                    </div>
                    
                    <!-- Autore -->
                    <div style="margin: 3rem 0; padding: 2rem; border-radius: var(--border-radius);" class="gradient-border">
                        <div style="display: flex; gap: 1.5rem; align-items: center;">
                            <div style="flex-shrink: 0;">
                                <?php echo get_avatar(get_the_author_meta('ID'), 60, '', '', array('style' => 'border-radius: 50%;')); ?>
                            </div>
                            <div>
                                <h4 style="background: linear-gradient(135deg, var(--gambla-primary), var(--gambla-secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 0.5rem; font-size: 1.2rem;">
                                    <?php echo get_the_author(); ?>
                                </h4>
                                <p style="color: var(--gambla-text-muted); margin-bottom: 1rem; font-size: 0.95rem;">
                                    <?php echo get_the_author_meta('description') ?: 'Redattore esperto nel mondo dello sport e delle scommesse.'; ?>
                                </p>
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="gambla-btn" style="font-size: 0.8rem; padding: 0.5rem 1.2rem;">
                                    Altri articoli
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation -->
                    <div style="margin: 3rem 0; display: grid; grid-template-columns: 1fr auto 1fr; gap: 1.5rem; align-items: center;">
                        <div>
                            <?php 
                            $prev_post = get_previous_post();
                            if ($prev_post) :
                            ?>
                                <a href="<?php echo get_permalink($prev_post); ?>" class="gambla-btn">
                                    ← Precedente
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="gambla-btn">
                                🏠 Blog
                            </a>
                        </div>
                        
                        <div style="text-align: right;">
                            <?php 
                            $next_post = get_next_post();
                            if ($next_post) :
                            ?>
                                <a href="<?php echo get_permalink($next_post); ?>" class="gambla-btn">
                                    Successivo →
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
                
                <!-- Commenti -->
                <?php if (comments_open() || get_comments_number()) : ?>
                    <div style="margin: 3rem 0; padding: 2.5rem; border-radius: var(--border-radius);" class="gradient-border">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
                
            <?php endwhile; ?>
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
</body>
</html>
