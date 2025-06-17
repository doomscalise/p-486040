
<?php get_header(); ?>

<!-- Blog Posts Section -->
<main class="content-section">
    <div class="container">
        <div class="text-center" style="margin-bottom: 4rem; padding-top: 2rem;">
            <h1 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                Ultimi <span class="gradient-text">Articoli</span>
            </h1>
            <p style="font-size: 1.25rem; color: #cccccc;">
                Le notizie più fresche dal mondo dello sport
            </p>
        </div>
        
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

<?php get_footer(); ?>
