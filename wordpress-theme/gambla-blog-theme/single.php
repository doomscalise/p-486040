
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo esc_attr(wp_trim_words(get_the_excerpt(), 25)); ?>">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php the_title(); ?>">
    <meta property="og:description" content="<?php echo esc_attr(wp_trim_words(get_the_excerpt(), 25)); ?>">
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-large'); ?>">
    <meta property="og:url" content="<?php the_permalink(); ?>">
    <meta property="og:type" content="article">
    
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
                
                <?php if (!has_nav_menu('primary')) : ?>
                    <ul>
                        <li><a href="https://gambla.it">← Torna al Sito</a></li>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/category/calcio')); ?>">Calcio</a></li>
                        <li><a href="<?php echo esc_url(home_url('/category/basket')); ?>">Basket</a></li>
                        <li><a href="<?php echo esc_url(home_url('/category/tennis')); ?>">Tennis</a></li>
                    </ul>
                <?php endif; ?>
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
                        <?php 
                        $categories = get_the_category();
                        if (!empty($categories)) :
                        ?>
                            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="post-category">
                                <?php echo esc_html($categories[0]->name); ?>
                            </a>
                        <?php endif; ?>
                        
                        <h1 class="post-title"><?php the_title(); ?></h1>
                        
                        <div class="post-meta" style="justify-content: center; margin: 3rem 0; display: flex; gap: 2rem; flex-wrap: wrap; color: #bbb; font-size: 1.1rem;">
                            <span>👤 <?php echo get_the_author(); ?></span>
                            <span>📅 <?php echo get_the_date('j M Y'); ?></span>
                            <?php 
                            $custom_reading_time = get_post_meta(get_the_ID(), '_blog_reading_time', true);
                            if ($custom_reading_time) :
                            ?>
                                <span>⏱️ <?php echo esc_html($custom_reading_time); ?> min lettura</span>
                            <?php else : ?>
                                <span>⏱️ <?php echo blog_reading_time(); ?></span>
                            <?php endif; ?>
                            <?php if (function_exists('pvc_get_post_views')) : ?>
                                <span>👁️ <?php echo pvc_get_post_views(); ?> visualizzazioni</span>
                            <?php endif; ?>
                        </div>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('blog-large', array(
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
                            'before' => '<div class="page-links" style="margin: 2rem 0; text-align: center;"><span style="background: linear-gradient(135deg, #ff2480, #ff800f); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold;">Pagine: </span>',
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
                        <div style="margin: 3rem 0; padding: 2rem; background: #1a1a1a; border-radius: 20px;" class="gradient-border">
                            <h3 style="background: linear-gradient(135deg, #ff2480, #ff800f); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem;">Tag Articolo</h3>
                            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                                <?php foreach ($tags as $tag) : ?>
                                    <a href="<?php echo get_tag_link($tag->term_id); ?>" 
                                       style="background: linear-gradient(135deg, #ff2480, #ff800f); color: white; padding: 0.5rem 1rem; border-radius: 20px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">
                                        #<?php echo $tag->name; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Social Share -->
                    <div style="margin: 3rem 0; padding: 2.5rem; background: #1a1a1a; border-radius: 25px; text-align: center;" class="gradient-border">
                        <h3 style="background: linear-gradient(135deg, #ff2480, #ff800f); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 2rem; font-size: 1.5rem;">Condividi questo articolo</h3>
                        <div style="display: flex; justify-content: center; gap: 1.5rem; flex-wrap: wrap;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" class="gambla-btn" rel="noopener">
                                📘 Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                               target="_blank" class="gambla-btn" rel="noopener">
                                🐦 Twitter
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" class="gambla-btn" rel="noopener">
                                💼 LinkedIn
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" 
                               target="_blank" class="gambla-btn" rel="noopener">
                                💬 WhatsApp
                            </a>
                        </div>
                    </div>
                    
                    <!-- Autore -->
                    <div style="margin: 3rem 0; padding: 2.5rem; background: #1a1a1a; border-radius: 25px;" class="gradient-border">
                        <div style="display: flex; gap: 2rem; align-items: center;">
                            <div style="flex-shrink: 0;">
                                <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'rounded-full')); ?>
                            </div>
                            <div>
                                <h4 style="background: linear-gradient(135deg, #ff2480, #ff800f); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 0.5rem; font-size: 1.3rem;">
                                    <?php echo get_the_author(); ?>
                                </h4>
                                <p style="color: #e0e0e0; margin-bottom: 1rem;">
                                    <?php echo get_the_author_meta('description') ?: 'Redattore esperto nel mondo dello sport e delle scommesse.'; ?>
                                </p>
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="gambla-btn" style="font-size: 0.9rem; padding: 0.5rem 1.5rem;">
                                    Altri articoli di <?php echo get_the_author(); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation -->
                    <div style="margin: 4rem 0; display: grid; grid-template-columns: 1fr auto 1fr; gap: 2rem; align-items: center;">
                        <div>
                            <?php 
                            $prev_post = get_previous_post();
                            if ($prev_post) :
                            ?>
                                <a href="<?php echo get_permalink($prev_post); ?>" class="gambla-btn">
                                    ← Articolo Precedente
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="gambla-btn">
                                🏠 Torna al Blog
                            </a>
                        </div>
                        
                        <div style="text-align: right;">
                            <?php 
                            $next_post = get_next_post();
                            if ($next_post) :
                            ?>
                                <a href="<?php echo get_permalink($next_post); ?>" class="gambla-btn">
                                    Articolo Successivo →
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
                
                <!-- Commenti -->
                <?php if (comments_open() || get_comments_number()) : ?>
                    <div style="margin: 4rem 0; padding: 3rem; background: #1a1a1a; border-radius: 25px;" class="gradient-border">
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
            <div class="footer-logo"><?php bloginfo('name'); ?></div>
            
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
                <div class="footer-links">
                    <a href="https://gambla.it">Sito Principale</a>
                    <a href="https://gambla.it/fantagambla">FantaGambla</a>
                    <a href="https://gambla.it/newsletter">Newsletter</a>
                    <a href="https://gambla.it/contatti">Contatti</a>
                </div>
            <?php endif; ?>
            
            <p class="footer-copyright">
                <?php echo esc_html(get_theme_mod('blog_footer_text', '© 2024 GAMBLA. Tutti i diritti riservati.')); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
