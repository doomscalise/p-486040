
<?php get_header(); ?>

<main class="content-section">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="single-page fade-in" style="max-width: 1000px; margin: 0 auto;">
                    <header class="page-header text-center" style="margin-bottom: 3rem;">
                        <h1 class="gradient-text" style="font-size: 3.5rem; margin-bottom: 1rem;"><?php the_title(); ?></h1>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'gambla-large'); ?>" 
                                 alt="<?php the_title_attribute(); ?>" 
                                 style="width: 100%; height: 400px; object-fit: cover; border-radius: 20px; margin: 2rem 0;">
                        <?php endif; ?>
                    </header>
                    
                    <div class="page-content" style="font-size: 1.1rem; line-height: 1.8; color: #e0e0e0;">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
