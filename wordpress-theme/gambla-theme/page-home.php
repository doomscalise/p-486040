
<?php
/*
Template Name: Home
*/
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1 class="hero-title font-display">
            <?php echo esc_html(get_theme_mod('gambla_hero_title', 'Accendi la Tua Passione Sportiva')); ?>
        </h1>
        <p class="hero-subtitle" style="font-size: 1.25rem; color: #cccccc; margin-top: 1rem;">
            <?php echo esc_html(get_theme_mod('gambla_hero_subtitle', 'Unisciti alla community sportiva più dinamica d\'Italia. Notizie live, fantacalcio, discussioni accese e contenuti esclusivi ti aspettano.')); ?>
        </p>
    </div>
</div>

<main class="content-section">
    <div class="container">
        <div class="two-column">
            <div class="posts-container">
                <?php
                $featured_posts = get_posts(array(
                    'numberposts' => 9,
                    'post_status' => 'publish'
                ));
                
                if ($featured_posts) : ?>
                    <div class="posts-grid">
                        <?php foreach($featured_posts as $post) : setup_postdata($post); ?>
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
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                    
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
                <?php endif; ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
