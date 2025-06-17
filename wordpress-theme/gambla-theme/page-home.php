
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
                    <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">🎯 GAMBLA</h3>
                    <div style="text-align: center; padding: 1.5rem; background: #000; border-radius: 10px;">
                        <div style="color: var(--gambla-secondary); font-size: 1.2rem; margin-bottom: 1rem;">
                            Il tuo portale sportivo
                        </div>
                        <div style="color: var(--gambla-yellow); font-size: 1.5rem; font-weight: bold;">
                            Always ON
                        </div>
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
            <?php echo esc_html(get_theme_mod('gambla_newsletter_title', 'Non Perdere Nessuna Notizia')); ?>
        </h2>
        <p style="font-size: 1.25rem; margin-bottom: 2rem; color: white;">
            <?php echo esc_html(get_theme_mod('gambla_newsletter_subtitle', 'Iscriviti alla nostra newsletter per ricevere le ultime news sportive')); ?>
        </p>
        
        <form class="newsletter-form" id="newsletter-form">
            <input type="email" placeholder="Il tuo indirizzo email" required>
            <button type="submit">Iscriviti</button>
        </form>
    </div>
</section>

<?php get_footer(); ?>
