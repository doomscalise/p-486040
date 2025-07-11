
<?php get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1>Categoria: <span class="gradient-text"><?php single_cat_title(); ?></span></h1>
        <?php if (category_description()) : ?>
            <p style="font-size: 1.25rem; color: #cccccc; margin-top: 1rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                <?php echo category_description(); ?>
            </p>
        <?php endif; ?>
    </div>
</div>

<main class="content-section">
    <div class="container">
        <div class="two-column">
            <div class="posts-container">
                <?php if (have_posts()) : ?>
                    <div class="posts-grid">
                        <?php while (have_posts()) : the_post(); ?>
                            <article class="post-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'gambla-card'); ?>" 
                                         alt="<?php the_title_attribute(); ?>" class="post-image">
                                <?php endif; ?>
                                
                                <div class="post-content">
                                    <span class="post-category"><?php single_cat_title(); ?></span>
                                    
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
                    <div class="no-posts" style="text-align: center; padding: 4rem 2rem; background: var(--gambla-gray); border-radius: 20px;">
                        <h2 style="color: var(--gambla-primary); margin-bottom: 1rem;">Nessun articolo in questa categoria</h2>
                        <p style="color: #cccccc; margin-bottom: 2rem;">Non ci sono ancora articoli pubblicati in questa categoria.</p>
                        <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn-primary">
                            ← Torna al Blog
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
