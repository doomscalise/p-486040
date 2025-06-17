
<?php
/*
Template Name: Home
*/
get_header(); ?>

<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title font-display">
                    <?php echo esc_html(get_theme_mod('gambla_hero_title', 'Accendi la Tua Passione Sportiva')); ?>
                </h1>
                <p class="hero-subtitle">
                    <?php echo esc_html(get_theme_mod('gambla_hero_subtitle', 'Unisciti alla community sportiva più dinamica d\'Italia')); ?>
                </p>
                
                <div class="hero-buttons">
                    <a href="<?php echo esc_url(home_url('/fantagambla')); ?>" class="btn-primary">
                        🚀 Scopri FantaGAMBLA
                    </a>
                    <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn-secondary">
                        📰 Leggi le News
                    </a>
                </div>
            </div>
            
            <div class="hero-visual">
                <div class="hero-card float-animation">
                    <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">⚽ Match del Giorno</h3>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <span style="font-weight: bold;">Juventus</span>
                        <span style="color: var(--gambla-secondary);">VS</span>
                        <span style="font-weight: bold;">Inter</span>
                    </div>
                    <div style="text-align: center; padding: 1rem; background: #000; border-radius: 10px;">
                        <span style="color: var(--gambla-yellow); font-size: 1.5rem; font-weight: bold;">20:45</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sports Icons Grid -->
<section class="section-padding">
    <div class="container">
        <div class="text-center" style="margin-bottom: 4rem;">
            <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                I Nostri <span class="gradient-text">Sport</span>
            </h2>
            <p style="font-size: 1.25rem; color: #cccccc;">
                Copertura completa per tutti gli sport che ami
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
                <p style="color: #cccccc; margin-top: 0.5rem;">NBA, EuroLega, Serie A Basket</p>
            </div>
            <div class="sport-icon-item">
                <div class="sport-icon">🎾</div>
                <h3>Tennis</h3>
                <p style="color: #cccccc; margin-top: 0.5rem;">ATP, WTA, Slam del Grande</p>
            </div>
            <div class="sport-icon-item">
                <div class="sport-icon">🏎️</div>
                <h3>Formula 1</h3>
                <p style="color: #cccccc; margin-top: 0.5rem;">Tutti i Gran Premi e qualifiche</p>
            </div>
            <div class="sport-icon-item">
                <div class="sport-icon">🏐</div>
                <h3>Volley</h3>
                <p style="color: #cccccc; margin-top: 0.5rem;">SuperLega, Champions League</p>
            </div>
            <div class="sport-icon-item">
                <div class="sport-icon">🏆</div>
                <h3>Altri Sport</h3>
                <p style="color: #cccccc; margin-top: 0.5rem;">Rugby, Baseball, Sport Olimpici</p>
            </div>
        </div>
    </div>
</section>

<!-- Latest Posts -->
<section class="section-padding" style="background: var(--gambla-gray);">
    <div class="container">
        <div class="text-center" style="margin-bottom: 4rem;">
            <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                Ultime <span class="gradient-text">Notizie</span>
            </h2>
            <p style="font-size: 1.25rem; color: #cccccc;">
                Resta aggiornato con le nostre analisi esclusive
            </p>
        </div>
        
        <div class="posts-grid">
            <?php
            $featured_posts = get_posts(array(
                'numberposts' => 3,
                'post_status' => 'publish'
            ));
            
            if ($featured_posts) :
                foreach($featured_posts as $post) : setup_postdata($post);
            ?>
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
            <?php 
                endforeach; 
                wp_reset_postdata();
            else :
            ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem;">
                    <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">Nessun articolo ancora</h3>
                    <p style="color: #cccccc;">Inizia a pubblicare i tuoi primi articoli!</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center" style="margin-top: 3rem;">
            <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn-primary">
                Vedi tutti gli articoli →
            </a>
        </div>
    </div>
</section>

<!-- Newsletter CTA -->
<section class="newsletter-section">
    <div class="container">
        <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem; color: white;">
            Non Perdere Nessuna Notizia
        </h2>
        <p style="font-size: 1.25rem; margin-bottom: 2rem; color: white;">
            Iscriviti alla nostra newsletter per ricevere le ultime news sportive
        </p>
        
        <form class="newsletter-form" id="newsletter-form">
            <input type="email" placeholder="Il tuo indirizzo email" required>
            <button type="submit">Iscriviti</button>
        </form>
    </div>
</section>

<?php get_footer(); ?>
