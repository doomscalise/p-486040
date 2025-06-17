
<?php
/*
Template Name: Blog
*/
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1>Il Blog di <span class="gradient-text">GAMBLA</span></h1>
        <p style="font-size: 1.25rem; color: #cccccc; margin-top: 1rem;">
            Analisi, pronostici e tutto quello che devi sapere sul mondo dello sport
        </p>
    </div>
</div>

<main class="content-section">
    <div class="container">
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
                        <p>Non ci sono ancora articoli pubblicati.</p>
                    </div>
                <?php endif; 
                wp_reset_postdata(); ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
