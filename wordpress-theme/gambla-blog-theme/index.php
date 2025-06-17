
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
        <div class="page-header">
            <h1 class="page-title">GAMBLA Blog</h1>
            <p class="page-description">
                Le notizie più fresche dal mondo dello sport, analisi esclusive e approfondimenti dai nostri esperti
            </p>
        </div>
        
        <?php if (have_posts()) : ?>
            <div class="blog-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post-card fade-in">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" 
                                 alt="<?php the_title_attribute(); ?>" class="post-image">
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <?php 
                            $categories = get_the_category();
                            if (!empty($categories)) :
                            ?>
                                <span class="post-category"><?php echo esc_html($categories[0]->name); ?></span>
                            <?php endif; ?>
                            
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="post-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                            </div>
                            
                            <div class="post-meta">
                                <div>
                                    <span><?php echo get_the_author(); ?></span> • 
                                    <span><?php echo get_the_date('j M Y'); ?></span>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    Leggi Articolo →
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div style="text-align: center; margin: 3rem 0;">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '← Precedente',
                    'next_text' => 'Successivo →',
                ));
                ?>
            </div>
            
        <?php else : ?>
            <div style="text-align: center; padding: 4rem 2rem; color: #cccccc;">
                <h2 style="color: #FF00FF; margin-bottom: 1rem;">Contenuti in Arrivo</h2>
                <p>Stiamo preparando contenuti esclusivi per te. Torna presto!</p>
            </div>
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
