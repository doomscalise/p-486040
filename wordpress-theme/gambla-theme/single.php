
<?php get_header(); ?>

<main class="content-section">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="single-post fade-in" style="max-width: 800px; margin: 0 auto;">
                    <header class="post-header text-center" style="margin-bottom: 3rem;">
                        <?php 
                        $categories = get_the_category();
                        if (!empty($categories)) :
                        ?>
                            <span class="post-category"><?php echo esc_html($categories[0]->name); ?></span>
                        <?php endif; ?>
                        
                        <h1 class="post-title gradient-text" style="font-size: 3rem; margin: 1rem 0;"><?php the_title(); ?></h1>
                        
                        <div class="post-meta" style="justify-content: center; margin: 2rem 0; display: flex; gap: 2rem; flex-wrap: wrap; color: #999;">
                            <span>👤 <?php echo get_the_author(); ?></span>
                            <span>📅 <?php echo get_the_date('j M Y'); ?></span>
                            <span>⏱️ <?php echo gambla_reading_time(); ?></span>
                        </div>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'gambla-large'); ?>" 
                                 alt="<?php the_title_attribute(); ?>" 
                                 style="width: 100%; height: 400px; object-fit: cover; border-radius: 20px; margin: 2rem 0;">
                        <?php endif; ?>
                    </header>
                    
                    <div class="post-content" style="font-size: 1.1rem; line-height: 1.8; color: #e0e0e0;">
                        <?php the_content(); ?>
                    </div>
                    
                    <!-- Social Share -->
                    <div style="margin: 3rem 0; padding: 2rem; background: var(--gambla-gray); border-radius: 20px; text-align: center; border: 2px solid transparent; background-image: linear-gradient(var(--gambla-gray), var(--gambla-gray)), linear-gradient(135deg, var(--gambla-primary), var(--gambla-secondary)); background-origin: border-box; background-clip: content-box, border-box;">
                        <h3 class="gradient-text" style="margin-bottom: 1rem;">Condividi questo articolo</h3>
                        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" class="btn-primary">
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                               target="_blank" class="btn-secondary">
                                Twitter
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" 
                               target="_blank" class="btn-primary">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                    
                    <!-- Navigation -->
                    <div style="margin: 3rem 0; display: grid; grid-template-columns: 1fr auto 1fr; gap: 2rem; align-items: center;">
                        <div>
                            <?php 
                            $prev_post = get_previous_post();
                            if ($prev_post) :
                            ?>
                                <a href="<?php echo get_permalink($prev_post); ?>" class="btn-secondary">
                                    ← Articolo Precedente
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn-primary">
                                Torna al Blog
                            </a>
                        </div>
                        
                        <div style="text-align: right;">
                            <?php 
                            $next_post = get_next_post();
                            if ($next_post) :
                            ?>
                                <a href="<?php echo get_permalink($next_post); ?>" class="btn-secondary">
                                    Articolo Successivo →
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
