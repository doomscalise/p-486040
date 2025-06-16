
<aside class="sidebar">
    <div class="widget">
        <h3 class="widget-title">Articoli Recenti</h3>
        <ul>
            <?php
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 5,
                'post_status' => 'publish'
            ));
            foreach($recent_posts as $post) :
            ?>
                <li>
                    <a href="<?php echo get_permalink($post['ID']); ?>">
                        <?php echo $post['post_title']; ?>
                    </a>
                    <small style="display: block; color: #666; margin-top: 0.25rem;">
                        <?php echo date('j M Y', strtotime($post['post_date'])); ?>
                    </small>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <div class="widget">
        <h3 class="widget-title">Categorie</h3>
        <ul>
            <?php
            $categories = get_categories();
            foreach($categories as $category) :
            ?>
                <li>
                    <a href="<?php echo get_category_link($category->term_id); ?>">
                        <?php echo $category->name; ?>
                        <span style="color: #666;">(<?php echo $category->count; ?>)</span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <div class="widget">
        <h3 class="widget-title">Tag Popolari</h3>
        <?php
        $tags = get_tags(array('orderby' => 'count', 'order' => 'DESC', 'number' => 10));
        if ($tags) :
        ?>
            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                <?php foreach($tags as $tag) : ?>
                    <a href="<?php echo get_tag_link($tag->term_id); ?>" 
                       style="background: #222; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; text-decoration: none;">
                        <?php echo $tag->name; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="widget">
        <h3 class="widget-title">Torna al Sito</h3>
        <p style="color: #999; margin-bottom: 1rem;">
            Scopri tutte le funzionalità di GAMBLA
        </p>
        <a href="https://gambla.it" 
           style="display: inline-block; background: linear-gradient(135deg, #ff6b35, #d946ef); color: white; padding: 0.75rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600;">
            Vai al Sito Principale
        </a>
    </div>
</aside>
