
<?php get_header(); ?>

<main class="main-content">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="single-post">
                    <header class="post-header">
                        <?php 
                        $categories = get_the_category();
                        if (!empty($categories)) :
                        ?>
                            <span class="post-category"><?php echo esc_html($categories[0]->name); ?></span>
                        <?php endif; ?>
                        
                        <h1 class="post-title font-display"><?php the_title(); ?></h1>
                        
                        <div class="post-meta" style="justify-content: center; margin-top: 1rem;">
                            <span><?php echo get_the_author(); ?></span> • 
                            <span><?php echo get_the_date('j M Y'); ?></span> • 
                            <span><?php echo do_shortcode('[rt_reading_time label="Tempo di lettura:" postfix="min"]'); ?></span>
                        </div>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div style="margin: 2rem 0;">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" 
                                     alt="<?php the_title(); ?>" 
                                     style="width: 100%; height: 400px; object-fit: cover; border-radius: 12px;">
                            </div>
                        <?php endif; ?>
                    </header>
                    
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    
                    <div class="post-navigation" style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid #222;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <?php previous_post_link('%link', '← Articolo precedente'); ?>
                            </div>
                            <div>
                                <a href="<?php echo home_url(); ?>" class="read-more">← Torna al Blog</a>
                            </div>
                            <div>
                                <?php next_post_link('%link', 'Articolo successivo →'); ?>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
