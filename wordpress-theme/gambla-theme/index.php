
<?php get_header(); ?>

<?php if (is_home() && !is_paged()): ?>
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
                    <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">🎯 GAMBLA Sport</h3>
                    <div style="background: #000; padding: 1.5rem; border-radius: 10px;">
                        <div style="text-align: center; padding: 1rem; background: #333; border-radius: 5px; margin-bottom: 1rem;">
                            <span style="color: var(--gambla-primary); font-weight: bold;">Notizie Live</span>
                        </div>
                        <div style="text-align: center; padding: 1rem; background: #333; border-radius: 5px; margin-bottom: 1rem;">
                            <span style="color: var(--gambla-secondary); font-weight: bold;">Analisi</span>
                        </div>
                        <div style="text-align: center; padding: 1rem; background: #333; border-radius: 5px;">
                            <span style="color: var(--gambla-yellow); font-weight: bold;">Community</span>
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
            <?php for ($i = 1; $i <= 6; $i++) : ?>
                <?php if (get_theme_mod("gambla_sport_{$i}_show", true)) : ?>
                    <div class="sport-icon-item">
                        <div class="sport-icon"><?php echo esc_html(get_theme_mod("gambla_sport_{$i}_icon", '⚽')); ?></div>
                        <h3><?php echo esc_html(get_theme_mod("gambla_sport_{$i}_name", 'Sport')); ?></h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">
                            <?php echo esc_html(get_theme_mod("gambla_sport_{$i}_description", 'Descrizione sport')); ?>
                        </p>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Blog Posts Section -->
<main class="content-section">
    <div class="container">
        <?php if (is_home() && !is_paged()): ?>
        <div class="text-center" style="margin-bottom: 4rem;">
            <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                Ultimi <span class="gradient-text">Articoli</span>
            </h2>
            <p style="font-size: 1.25rem; color: #cccccc;">
                Le notizie più fresche dal mondo dello sport
            </p>
        </div>
        <?php endif; ?>
        
        <div class="two-column">
            <div class="posts-container">
                <?php if (have_posts()) : ?>
                    <div class="posts-grid">
                        <?php while (have_posts()) : the_post(); ?>
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
                                        <?php echo gambla_excerpt(25); ?>
                                    </div>
                                    
                                    <div class="post-meta">
                                        <div>
                                            <span><?php echo get_the_author(); ?></span> • 
                                            <span><?php echo get_the_date('j M Y'); ?></span> •
                                            <span><?php echo gambla_reading_time(); ?></span>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="read-more">
                                            Leggi articolo →
                                        </a>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                    
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '← Precedente',
                        'next_text' => 'Successivo →',
                        'class' => 'pagination'
                    ));
                    ?>
                    
                <?php else : ?>
                    <div class="no-posts">
                        <h2>Nessun articolo trovato</h2>
                        <p>Non ci sono ancora articoli pubblicati.</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php if (is_home() && !is_paged()): ?>
<!-- Newsletter Section -->
<section class="newsletter-section">
    <div class="container">
        <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem; color: white;">
            <?php echo esc_html(get_theme_mod('gambla_newsletter_title', 'Non Perdere Nemmeno una Notizia')); ?>
        </h2>
        <p style="font-size: 1.25rem; margin-bottom: 2rem; color: white;">
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
<?php endif; ?>

<?php get_footer(); ?>
