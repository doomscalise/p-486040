
<?php
/*
Template Name: Blog
*/
get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="gradient-text">
                    <?php echo esc_html(get_theme_mod('gambla_blog_title', 'Il Blog di GAMBLA')); ?>
                </h1>
                <p><?php echo esc_html(get_theme_mod('gambla_blog_description', 'Analisi, pronostici e tutto quello che devi sapere sul mondo dello sport')); ?></p>
                
                <div class="hero-buttons">
                    <a href="#articoli" class="btn-primary">
                        Leggi gli Articoli →
                    </a>
                    <a href="<?php echo esc_url(home_url('/newsletter')); ?>" class="btn-secondary">
                        Iscriviti alla Newsletter
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
            <h2 class="font-display sports-section-title" style="font-size: 3rem; margin-bottom: 1rem;">
                <?php 
                $sports_title = get_theme_mod('gambla_sports_title', 'I Nostri Sport');
                $parts = explode(' ', $sports_title);
                if (count($parts) >= 2) {
                    echo esc_html($parts[0] . ' ' . $parts[1]) . ' <span class="gradient-text">' . esc_html(implode(' ', array_slice($parts, 2))) . '</span>';
                } else {
                    echo '<span class="gradient-text">' . esc_html($sports_title) . '</span>';
                }
                ?>
            </h2>
            <p class="sports-section-subtitle" style="font-size: 1.25rem; color: #cccccc;">
                <?php echo esc_html(get_theme_mod('gambla_sports_subtitle', 'Copertura completa per tutti gli sport che ami')); ?>
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

<!-- Blog Posts Section -->
<main class="content-section" id="articoli">
    <div class="container">
        <div class="text-center" style="margin-bottom: 4rem;">
            <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                Ultimi <span class="gradient-text">Articoli</span>
            </h2>
            <p style="font-size: 1.25rem; color: #cccccc;">
                Le notizie più fresche dal mondo dello sport
            </p>
        </div>
        
        <div class="two-column">
            <div class="posts-container">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $blog_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'paged' => $paged,
                    'post_status' => 'publish'
                ));
                
                if ($blog_posts->have_posts()) : ?>
                    <div class="posts-grid">
                        <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
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
                                        <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
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
                        <?php endwhile; ?>
                    </div>
                    
                    <?php
                    echo paginate_links(array(
                        'total' => $blog_posts->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '← Precedente',
                        'next_text' => 'Successivo →',
                        'type' => 'list',
                        'end_size' => 3,
                        'mid_size' => 3
                    ));
                    ?>
                    
                <?php else : ?>
                    <div class="no-posts">
                        <h2>Nessun articolo trovato</h2>
                        <p>Non ci sono ancora articoli pubblicati. Inizia a creare i tuoi primi contenuti!</p>
                        <div style="margin-top: 2rem;">
                            <a href="<?php echo admin_url('post-new.php'); ?>" class="btn-primary">
                                Crea il primo articolo
                            </a>
                        </div>
                    </div>
                <?php endif; 
                wp_reset_postdata(); ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

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
