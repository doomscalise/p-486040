
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                GAMBLA Blog
            </a>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="https://gambla.it">← Torna al Sito</a></li>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home Blog</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/calcio')); ?>">Calcio</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/basket')); ?>">Basket</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/tennis')); ?>">Tennis</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<main class="main-content">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="single-post fade-in">
                    <header class="post-header">
                        <?php 
                        $categories = get_the_category();
                        if (!empty($categories)) :
                        ?>
                            <span class="post-category"><?php echo esc_html($categories[0]->name); ?></span>
                        <?php endif; ?>
                        
                        <h1 class="post-title"><?php the_title(); ?></h1>
                        
                        <div class="post-meta" style="justify-content: center; margin: 2rem 0; display: flex; gap: 2rem; flex-wrap: wrap; color: #999;">
                            <span>👤 <?php echo get_the_author(); ?></span>
                            <span>📅 <?php echo get_the_date('j M Y'); ?></span>
                            <span>⏱️ <?php echo ceil(str_word_count(get_the_content()) / 200); ?> min lettura</span>
                        </div>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" 
                                 alt="<?php the_title_attribute(); ?>" 
                                 class="post-featured-image">
                        <?php endif; ?>
                    </header>
                    
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    
                    <!-- Social Share -->
                    <div style="margin: 3rem 0; padding: 2rem; background: #1a1a1a; border-radius: 20px; text-align: center;" class="gradient-border">
                        <h3 style="background: linear-gradient(135deg, #FF00FF, #FF6600); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem;">Condividi questo articolo</h3>
                        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" class="gambla-btn">
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                               target="_blank" class="gambla-btn">
                                Twitter
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" 
                               target="_blank" class="gambla-btn">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                    
                    <!-- Navigation -->
                    <div style="margin: 3rem 0; display: grid; grid-template-columns: 1fr auto 1fr; gap: 2rem; align-items: center;">
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
                                Torna al Blog
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
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo">GAMBLA</div>
            <div class="footer-links">
                <a href="https://gambla.it">Sito Principale</a>
                <a href="https://gambla.it/fantagambla">FantaGambla</a>
                <a href="https://gambla.it/newsletter">Newsletter</a>
                <a href="https://gambla.it/contatti">Contatti</a>
            </div>
            <p class="footer-copyright">© 2024 GAMBLA. Tutti i diritti riservati.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
