
<?php
/*
Template Name: Home
*/
get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="font-display hero-title">
                    <?php echo esc_html(get_theme_mod('gambla_hero_title', 'Ultimi Articoli GAMBLA')); ?>
                </h1>
                <p class="hero-subtitle"><?php echo esc_html(get_theme_mod('gambla_hero_subtitle', 'Le notizie più fresche dal mondo dello sport')); ?></p>
                
                <div class="hero-buttons">
                    <a href="#articoli" class="btn-primary">
                        Esplora Sport →
                    </a>
                    <a href="<?php echo esc_url(home_url('/newsletter')); ?>" class="btn-secondary">
                        Iscriviti Gratis
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="stats-grid" style="margin-top: 3rem;">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">Utenti Attivi</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Articoli</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Copertura Live</div>
                    </div>
                </div>
            </div>
            
            <div class="hero-visual">
                <div class="hero-card">
                    <h3 style="color: var(--gambla-primary); margin-bottom: 1rem; font-family: var(--font-display);">🎯 GAMBLA Demo</h3>
                    <div class="accent-line"></div>
                    
                    <div class="demo-item interactive-element">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: white; font-weight: bold;">📈 Analisi Live</span>
                            <span style="color: var(--gambla-primary); font-weight: bold;">ATTIVO</span>
                        </div>
                    </div>
                    
                    <div class="demo-item interactive-element">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: white; font-weight: bold;">⚽ FantaGambla</span>
                            <span style="color: var(--gambla-secondary); font-weight: bold;">NUOVO</span>
                        </div>
                    </div>
                    
                    <div class="demo-item interactive-element">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: white; font-weight: bold;">💬 Community</span>
                            <span style="color: var(--gambla-yellow); font-weight: bold;">1.2K</span>
                        </div>
                    </div>
                    
                    <div style="margin-top: 1.5rem; text-align: center;">
                        <a href="<?php echo esc_url(home_url('/unisciti-ora')); ?>" class="btn-primary" style="font-size: 0.9rem; padding: 0.75rem 1.5rem;">
                            Prova Ora Gratis
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Articles Preview -->
<section class="section-padding" id="articoli" style="background: var(--gambla-gray);">
    <div class="container">
        <div class="text-center" style="margin-bottom: 4rem;">
            <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                Ultimi <span class="gradient-text">Articoli</span>
            </h2>
            <div class="accent-line" style="width: 100px; margin: 1rem auto;"></div>
            <p style="font-size: 1.25rem; color: #cccccc;">
                Le notizie più fresche dal mondo dello sport
            </p>
        </div>
        
        <?php
        $featured_posts = get_posts(array(
            'numberposts' => 6,
            'post_status' => 'publish'
        ));
        
        if ($featured_posts) : ?>
            <div class="posts-grid">
                <?php foreach($featured_posts as $post) : setup_postdata($post); ?>
                    <article class="post-card fade-in">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'gambla-card'); ?>" 
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
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </div>
                            
                            <div class="post-meta">
                                <div>
                                    <span><?php echo get_the_author(); ?></span> • 
                                    <span><?php echo get_the_date('j M Y'); ?></span>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    Leggi articolo →
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
            
            <div class="text-center" style="margin-top: 3rem;">
                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn-primary">
                    Vedi Tutti gli Articoli →
                </a>
            </div>
            
        <?php else : ?>
            <div class="no-posts">
                <h2>Contenuti in Arrivo</h2>
                <p>Stiamo preparando contenuti esclusivi per te. Iscriviti alla newsletter per rimanere aggiornato!</p>
                <div style="margin-top: 2rem;">
                    <a href="<?php echo esc_url(home_url('/newsletter')); ?>" class="btn-primary">
                        Iscriviti alla Newsletter
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section">
    <div class="container">
        <h2 class="font-display newsletter-page-title" style="font-size: 3rem; margin-bottom: 1rem; color: white;">
            <?php echo esc_html(get_theme_mod('gambla_newsletter_title', 'Non Perdere Nemmeno una Notizia')); ?>
        </h2>
        <p class="newsletter-page-subtitle" style="font-size: 1.25rem; margin-bottom: 2rem; color: white;">
            <?php echo esc_html(get_theme_mod('gambla_newsletter_subtitle', 'Iscriviti alla nostra newsletter per ricevere le ultime news direttamente nella tua email')); ?>
        </p>
        
        <form class="newsletter-form" id="newsletter-form">
            <input type="email" placeholder="La tua email" required name="email">
            <button type="submit">Iscriviti</button>
        </form>
        
        <p style="font-size: 0.875rem; margin-top: 1rem; color: rgba(255,255,255,0.8);">
            Cancellerai l'iscrizione in qualsiasi momento. Privacy policy.
        </p>
    </div>
</section>

<?php get_footer(); ?>
