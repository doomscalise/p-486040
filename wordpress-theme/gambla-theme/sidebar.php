
<aside class="sidebar">
    <!-- Newsletter Signup Widget -->
    <div class="widget">
        <h3 class="widget-title">🔥 Unisciti a GAMBLA</h3>
        <p style="color: #cccccc; margin-bottom: 1rem; font-size: 0.9rem;">
            Non perdere le ultime notizie sportive. Iscriviti alla newsletter!
        </p>
        <form class="newsletter-form" style="display: flex; flex-direction: column; gap: 0.5rem;" id="sidebar-newsletter">
            <input type="email" placeholder="La tua email" required name="email" 
                   style="padding: 0.75rem; border: 1px solid #444; border-radius: 25px; background: #000; color: white; font-size: 0.875rem;">
            <button type="submit" class="btn-primary" style="padding: 0.75rem; font-size: 0.875rem;">
                Iscriviti
            </button>
        </form>
    </div>
    
    <!-- Recent Posts -->
    <div class="widget">
        <h3 class="widget-title">📰 Articoli Recenti</h3>
        <ul>
            <?php
            $recent_posts = get_posts(array(
                'numberposts' => 5,
                'post_status' => 'publish'
            ));
            foreach($recent_posts as $post) : setup_postdata($post);
            ?>
                <li style="padding: 1rem 0; border-bottom: 1px solid #333;">
                    <a href="<?php echo get_permalink($post->ID); ?>" style="text-decoration: none;">
                        <h4 style="color: white; margin-bottom: 0.5rem; font-size: 0.9rem; line-height: 1.3;">
                            <?php echo get_the_title($post->ID); ?>
                        </h4>
                        <div style="display: flex; justify-content: space-between; font-size: 0.75rem; color: #999;">
                            <span><?php echo get_the_date('j M Y', $post->ID); ?></span>
                            <span>👁 <?php echo rand(100, 1000); ?></span>
                        </div>
                    </a>
                </li>
            <?php endforeach; wp_reset_postdata(); ?>
        </ul>
        <div style="text-align: center; margin-top: 1rem;">
            <a href="<?php echo esc_url(home_url('/blog')); ?>" class="read-more">
                Vedi tutti gli articoli →
            </a>
        </div>
    </div>
    
    <!-- Categories -->
    <div class="widget">
        <h3 class="widget-title">🏆 Categorie Sport</h3>
        <ul>
            <?php
            $categories = get_categories(array('number' => 8));
            foreach($categories as $category) :
            ?>
                <li style="padding: 0.75rem 0; border-bottom: 1px solid #333;">
                    <a href="<?php echo get_category_link($category->term_id); ?>" 
                       style="display: flex; justify-content: space-between; align-items: center; text-decoration: none;">
                        <span style="color: #cccccc;"><?php echo $category->name; ?></span>
                        <span style="background: var(--gambla-primary); color: white; padding: 0.25rem 0.5rem; border-radius: 12px; font-size: 0.75rem;">
                            <?php echo $category->count; ?>
                        </span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <!-- Popular Tags -->
    <div class="widget">
        <h3 class="widget-title">🏷️ Tag Popolari</h3>
        <?php
        $tags = get_tags(array('orderby' => 'count', 'order' => 'DESC', 'number' => 15));
        if ($tags) :
        ?>
            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                <?php foreach($tags as $tag) : ?>
                    <a href="<?php echo get_tag_link($tag->term_id); ?>" 
                       style="background: #333; padding: 0.4rem 0.8rem; border-radius: 20px; font-size: 0.8rem; text-decoration: none; color: #cccccc; transition: all 0.3s; display: inline-block;">
                        <?php echo $tag->name; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- FantaGambla Widget -->
    <div class="widget">
        <h3 class="widget-title">⚽ FantaGAMBLA</h3>
        <div style="background: linear-gradient(135deg, var(--gambla-primary), var(--gambla-secondary)); padding: 1.5rem; border-radius: 15px; text-align: center;">
            <h4 style="color: white; margin-bottom: 1rem;">🏆 Consiglio della Settimana</h4>
            <div style="background: rgba(0,0,0,0.3); padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                <p style="color: white; font-weight: bold; margin-bottom: 0.5rem;">Osimhen (NAP)</p>
                <p style="color: rgba(255,255,255,0.9); font-size: 0.875rem;">vs Salernitana in casa</p>
                <p style="color: var(--gambla-yellow); font-weight: bold;">Quotazione: 8.5</p>
            </div>
            <a href="<?php echo esc_url(home_url('/fantagambla')); ?>" 
               style="background: white; color: var(--gambla-primary); padding: 0.75rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: bold; display: inline-block;">
                Scopri FantaGAMBLA
            </a>
        </div>
    </div>
    
    <!-- Quick Stats -->
    <div class="widget">
        <h3 class="widget-title">📊 GAMBLA Stats</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div style="text-align: center; padding: 1rem; background: #333; border-radius: 10px;">
                <div style="font-size: 1.5rem; font-weight: bold; color: var(--gambla-primary);">10K+</div>
                <div style="font-size: 0.8rem; color: #999;">Utenti</div>
            </div>
            <div style="text-align: center; padding: 1rem; background: #333; border-radius: 10px;">
                <div style="font-size: 1.5rem; font-weight: bold; color: var(--gambla-secondary);">500+</div>
                <div style="font-size: 0.8rem; color: #999;">Articoli</div>
            </div>
            <div style="text-align: center; padding: 1rem; background: #333; border-radius: 10px;">
                <div style="font-size: 1.5rem; font-weight: bold; color: var(--gambla-yellow);">24/7</div>
                <div style="font-size: 0.8rem; color: #999;">Live</div>
            </div>
            <div style="text-align: center; padding: 1rem; background: #333; border-radius: 10px;">
                <div style="font-size: 1.5rem; font-weight: bold; color: var(--gambla-primary);">5★</div>
                <div style="font-size: 0.8rem; color: #999;">Rating</div>
            </div>
        </div>
    </div>
    
    <!-- Call to Action -->
    <div class="widget">
        <div style="background: var(--gambla-gray); padding: 2rem; border-radius: 15px; text-align: center; border: 2px solid var(--gambla-primary);">
            <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">🚀 Unisciti alla Community</h3>
            <p style="color: #cccccc; margin-bottom: 1.5rem; font-size: 0.9rem;">
                Oltre 10.000 appassionati di sport si sono già uniti a noi. Cosa aspetti?
            </p>
            <a href="<?php echo esc_url(home_url('/newsletter')); ?>" class="btn-primary" style="width: 100%; text-align: center;">
                Unisciti Ora - Gratis!
            </a>
        </div>
    </div>
</aside>
