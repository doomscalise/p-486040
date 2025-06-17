
<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="gradient-text">
                    <?php echo esc_html(get_theme_mod('gambla_hero_title', 'Accendi la Tua Passione Sportiva')); ?>
                </h1>
                <p><?php echo esc_html(get_theme_mod('gambla_hero_subtitle', 'Unisciti alla community sportiva più dinamica d\'Italia. Notizie live, fantacalcio, discussioni accese e contenuti esclusivi ti aspettano.')); ?></p>
                
                <div class="hero-buttons">
                    <a href="#unisciti" class="btn-primary">
                        Unisciti Ora →
                    </a>
                    <a href="<?php echo esc_url(home_url('/fantagambla')); ?>" class="btn-secondary">
                        Scopri Fantagambla
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
                    <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">🏆 Highlights Oggi</h3>
                    <div style="background: #000; padding: 1.5rem; border-radius: 10px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 1rem; padding: 0.75rem; background: #333; border-radius: 5px;">
                            <span>Inter vs Milan</span>
                            <span style="color: var(--gambla-secondary); font-weight: bold;">2-1</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 1rem; padding: 0.75rem; background: #333; border-radius: 5px;">
                            <span>Juventus vs Roma</span>
                            <span style="color: var(--gambla-primary); font-weight: bold;">LIVE</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding: 0.75rem; background: #333; border-radius: 5px;">
                            <span>Napoli vs Lazio</span>
                            <span style="color: #999;">20:45</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sport Icons Grid -->
<section class="section-padding" style="background: var(--gambla-gray);">
    <div class="container">
        <div class="text-center" style="margin-bottom: 4rem;">
            <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                Il Tuo Sport, <span class="gradient-text">La Tua Passione</span>
            </h2>
            <p style="font-size: 1.25rem; color: #cccccc; max-width: 600px; margin: 0 auto;">
                Segui tutti i tuoi sport preferiti in un unico posto
            </p>
        </div>
        
        <div class="sport-icons-grid">
            <div class="sport-icon-item">
                <div class="sport-icon">⚽</div>
                <h3>Calcio</h3>
                <p style="color: #cccccc; margin-top: 0.5rem;">Serie A, Champions League, Europa League</p>
            </div>
            <div class="sport-icon-item">
                <div class="sport-icon">🏀</div>
                <h3>Basket</h3>
                <p style="color: #cccccc; margin-top: 0.5rem;">NBA, Serie A, Eurolega</p>
            </div>
            <div class="sport-icon-item">
                <div class="sport-icon">🎾</div>
                <h3>Tennis</h3>
                <p style="color: #cccccc; margin-top: 0.5rem;">ATP, WTA, Slam</p>
            </div>
            <div class="sport-icon-item">
                <div class="sport-icon">🏎️</div>
                <h3>Formula 1</h3>
                <p style="color: #cccccc; margin-top: 0.5rem;">Gare, qualifiche, news</p>
            </div>
            <div class="sport-icon-item">
                <div class="sport-icon">🏐</div>
                <h3>Volley</h3>
                <p style="color: #cccccc; margin-top: 0.5rem;">Serie A, Champions League</p>
            </div>
            <div class="sport-icon-item">
                <div class="sport-icon">🏊</div>
                <h3>Sport Olimpici</h3>
                <p style="color: #cccccc; margin-top: 0.5rem;">Nuoto, atletica e altro</p>
            </div>
        </div>
    </div>
</section>

<!-- Latest Articles -->
<section class="section-padding">
    <div class="container">
        <div class="text-center" style="margin-bottom: 4rem;">
            <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                Ultimi <span class="gradient-text">Articoli</span>
            </h2>
            <p style="font-size: 1.25rem; color: #cccccc;">
                Le notizie più fresche dal mondo dello sport
            </p>
        </div>
        
        <div class="posts-grid">
            <?php
            $recent_posts = get_posts(array(
                'numberposts' => 6,
                'post_status' => 'publish'
            ));
            
            foreach($recent_posts as $post) : setup_postdata($post);
            ?>
                <article class="post-card">
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
                        
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        
                        <div class="post-excerpt">
                            <?php echo gambla_excerpt(20); ?>
                        </div>
                        
                        <div class="post-meta">
                            <div>
                                <span><?php echo get_the_author(); ?></span> • 
                                <span><?php echo get_the_date('j M Y'); ?></span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                Leggi →
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
        
        <div class="text-center" style="margin-top: 3rem;">
            <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn-primary">
                Vedi Tutti gli Articoli
            </a>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section">
    <div class="container">
        <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem; color: white;">
            Non Perdere Nemmeno una Notizia
        </h2>
        <p style="font-size: 1.25rem; margin-bottom: 2rem; color: white;">
            Iscriviti alla nostra newsletter per ricevere le ultime news direttamente nella tua email
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

<!-- CTA Section -->
<section class="section-padding" style="background: var(--gambla-gray);" id="unisciti">
    <div class="container text-center">
        <h2 class="font-display" style="font-size: 3rem; margin-bottom: 2rem;">
            Pronto a Vivere lo Sport <span class="gradient-text">in Prima Persona?</span>
        </h2>
        <p style="font-size: 1.25rem; color: #cccccc; margin-bottom: 3rem; max-width: 700px; margin-left: auto; margin-right: auto;">
            Unisciti a migliaia di appassionati che hanno già scelto GAMBLA come fonte principale di notizie sportive e fantacalcio.
        </p>
        
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo esc_url(home_url('/newsletter')); ?>" class="btn-primary">
                Inizia Subito - È Gratis!
            </a>
            <a href="<?php echo esc_url(home_url('/fantagambla')); ?>" class="btn-secondary">
                Scopri Fantagambla
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
