
<?php get_header(); ?>

<main class="content-section">
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
                        
                        <div class="post-meta" style="justify-content: center; margin: 2rem 0; padding: 1.5rem; background: var(--gambla-gray); border-radius: 15px;">
                            <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <span style="color: var(--gambla-primary);">👤</span>
                                    <span><?php echo get_the_author(); ?></span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <span style="color: var(--gambla-primary);">📅</span>
                                    <span><?php echo get_the_date('j M Y'); ?></span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <span style="color: var(--gambla-primary);">⏱️</span>
                                    <span><?php echo gambla_reading_time(); ?></span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <span style="color: var(--gambla-primary);">👁️</span>
                                    <span><?php echo rand(150, 2500); ?> visualizzazioni</span>
                                </div>
                            </div>
                        </div>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div style="margin: 2rem 0;">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'gambla-large'); ?>" 
                                     alt="<?php the_title_attribute(); ?>" 
                                     style="width: 100%; height: 400px; object-fit: cover; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
                            </div>
                        <?php endif; ?>
                    </header>
                    
                    <div class="post-content" style="max-width: 800px; margin: 0 auto;">
                        <?php the_content(); ?>
                        
                        <!-- Social Share -->
                        <div style="margin: 3rem 0; padding: 2rem; background: var(--gambla-gray); border-radius: 15px; text-align: center;">
                            <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">📢 Condividi questo articolo</h3>
                            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                                   target="_blank" 
                                   style="background: #3b5998; color: white; padding: 0.75rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600;">
                                    📘 Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                                   target="_blank" 
                                   style="background: #1da1f2; color: white; padding: 0.75rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600;">
                                    🐦 Twitter
                                </a>
                                <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" 
                                   target="_blank" 
                                   style="background: #25d366; color: white; padding: 0.75rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600;">
                                    💬 WhatsApp
                                </a>
                                <button onclick="copyToClipboard('<?php echo get_permalink(); ?>')" 
                                        style="background: var(--gambla-primary); color: white; padding: 0.75rem 1.5rem; border-radius: 25px; border: none; font-weight: 600; cursor: pointer;">
                                    🔗 Copia Link
                                </button>
                            </div>
                        </div>
                        
                        <!-- Tags -->
                        <?php
                        $tags = get_the_tags();
                        if ($tags) :
                        ?>
                            <div style="margin: 2rem 0;">
                                <h4 style="color: var(--gambla-primary); margin-bottom: 1rem;">🏷️ Tag:</h4>
                                <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                                    <?php foreach($tags as $tag) : ?>
                                        <a href="<?php echo get_tag_link($tag->term_id); ?>" 
                                           style="background: #333; color: #cccccc; padding: 0.5rem 1rem; border-radius: 25px; text-decoration: none; font-size: 0.875rem; transition: all 0.3s;">
                                            <?php echo $tag->name; ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Author Bio -->
                    <div style="margin: 3rem 0; padding: 2rem; background: var(--gambla-gray); border-radius: 20px; display: flex; gap: 2rem; align-items: center;">
                        <div style="width: 80px; height: 80px; background: var(--gambla-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: white; flex-shrink: 0;">
                            👨‍✍️
                        </div>
                        <div>
                            <h3 style="color: var(--gambla-primary); margin-bottom: 0.5rem;">
                                Scritto da <?php echo get_the_author(); ?>
                            </h3>
                            <p style="color: #cccccc; margin-bottom: 1rem;">
                                <?php echo get_the_author_meta('description') ?: 'Giornalista sportivo appassionato, segue da anni il mondo del calcio e dello sport in generale. Contribuisce regolarmente con analisi e approfondimenti per GAMBLA.'; ?>
                            </p>
                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="read-more">
                                Vedi tutti gli articoli di <?php echo get_the_author(); ?> →
                            </a>
                        </div>
                    </div>
                    
                    <!-- Navigation -->
                    <div class="post-navigation" style="margin-top: 3rem; padding: 2rem; background: var(--gambla-gray); border-radius: 20px;">
                        <div style="display: grid; grid-template-columns: 1fr auto 1fr; gap: 2rem; align-items: center;">
                            <div>
                                <?php 
                                $prev_post = get_previous_post();
                                if ($prev_post) :
                                ?>
                                    <a href="<?php echo get_permalink($prev_post); ?>" 
                                       style="display: flex; align-items: center; gap: 1rem; text-decoration: none; padding: 1rem; background: #333; border-radius: 15px; transition: all 0.3s;">
                                        <span style="font-size: 2rem;">←</span>
                                        <div>
                                            <div style="color: var(--gambla-primary); font-size: 0.875rem; margin-bottom: 0.25rem;">Articolo precedente</div>
                                            <div style="color: white; font-weight: 600;"><?php echo wp_trim_words(get_the_title($prev_post), 6); ?></div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                            
                            <div style="text-align: center;">
                                <a href="<?php echo esc_url(home_url('/blog')); ?>" 
                                   style="background: var(--gambla-primary); color: white; padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: 600;">
                                    🏠 Torna al Blog
                                </a>
                            </div>
                            
                            <div style="text-align: right;">
                                <?php 
                                $next_post = get_next_post();
                                if ($next_post) :
                                ?>
                                    <a href="<?php echo get_permalink($next_post); ?>" 
                                       style="display: flex; align-items: center; gap: 1rem; text-decoration: none; padding: 1rem; background: #333; border-radius: 15px; transition: all 0.3s; justify-content: flex-end;">
                                        <div style="text-align: right;">
                                            <div style="color: var(--gambla-primary); font-size: 0.875rem; margin-bottom: 0.25rem;">Articolo successivo</div>
                                            <div style="color: white; font-weight: 600;"><?php echo wp_trim_words(get_the_title($next_post), 6); ?></div>
                                        </div>
                                        <span style="font-size: 2rem;">→</span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </article>
                
                <!-- Related Posts -->
                <section style="margin-top: 4rem;">
                    <h2 class="font-display" style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem;">
                        Articoli <span class="gradient-text">Correlati</span>
                    </h2>
                    
                    <?php
                    $related_posts = get_posts(array(
                        'category__in' => wp_get_post_categories(get_the_ID()),
                        'numberposts' => 3,
                        'post__not_in' => array(get_the_ID()),
                        'post_status' => 'publish'
                    ));
                    
                    if ($related_posts) :
                    ?>
                        <div class="posts-grid">
                            <?php foreach($related_posts as $post) : setup_postdata($post); ?>
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
                                        
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        
                                        <div class="post-excerpt">
                                            <?php echo gambla_excerpt(20); ?>
                                        </div>
                                        
                                        <div class="post-meta">
                                            <div>
                                                <span><?php echo get_the_author(); ?></span> • 
                                                <span><?php echo get_the_date('j M Y'); ?></span>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="read-more">
                                                Leggi →
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            <?php endforeach; wp_reset_postdata(); ?>
                        </div>
                    <?php endif; ?>
                </section>
                
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Link copiato negli appunti!');
    });
}
</script>

<?php get_footer(); ?>
