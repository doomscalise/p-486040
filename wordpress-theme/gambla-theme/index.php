
<?php get_header(); ?>

<main class="content-section">
    <div class="container">
        <div class="page-hero">
            <h1 class="gradient-text">GAMBLA Blog</h1>
            <p>Le notizie più fresche dal mondo dello sport, analisi esclusive e approfondimenti dai nostri esperti</p>
            <div class="accent-line"></div>
        </div>
        
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
                                <?php echo gambla_custom_excerpt(25); ?>
                            </div>
                            
                            <div class="post-meta">
                                <div>
                                    <span>👤 <?php echo get_the_author(); ?></span> • 
                                    <span>📅 <?php echo get_the_date('j M Y'); ?></span> •
                                    <span>⏱️ <?php echo gambla_reading_time(); ?></span>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    Leggi Articolo →
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="text-center" style="margin: 3rem 0;">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '← Precedente',
                    'next_text' => 'Successivo →',
                ));
                ?>
            </div>
            
        <?php else : ?>
            <div class="no-posts">
                <h2>Contenuti in Arrivo</h2>
                <p>Stiamo preparando contenuti esclusivi per te. Torna presto!</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-primary" style="margin-top: 2rem;">Torna alla Home</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
