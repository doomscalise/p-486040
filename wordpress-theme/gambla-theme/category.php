
<?php get_header(); ?>

<main class="main-content">
    <div class="container">
        <div class="content-grid">
            <div class="posts-container">
                <div class="category-header" style="margin-bottom: 2rem;">
                    <h1 class="font-display" style="font-size: 2.5rem; margin-bottom: 0.5rem;">
                        <?php single_cat_title(); ?>
                    </h1>
                    <?php if (category_description()) : ?>
                        <p style="color: #999; font-size: 1.125rem;">
                            <?php echo category_description(); ?>
                        </p>
                    <?php endif; ?>
                </div>
                
                <?php if (have_posts()) : ?>
                    <div class="posts-grid">
                        <?php while (have_posts()) : the_post(); ?>
                            <article class="post-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>" 
                                         alt="<?php the_title(); ?>" class="post-image">
                                <?php endif; ?>
                                
                                <div class="post-content">
                                    <span class="post-category"><?php single_cat_title(); ?></span>
                                    
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    
                                    <div class="post-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
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
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '← Precedente',
                        'next_text' => 'Successivo →',
                        'class' => 'pagination'
                    ));
                    ?>
                    
                <?php else : ?>
                    <div class="no-posts">
                        <h2>Nessun articolo in questa categoria</h2>
                        <p>Non ci sono ancora articoli pubblicati in questa categoria.</p>
                        <a href="<?php echo home_url(); ?>" class="read-more">← Torna al Blog</a>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
