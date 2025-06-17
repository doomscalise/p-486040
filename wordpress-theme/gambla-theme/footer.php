
<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <!-- Brand Section -->
            <div class="footer-section">
                <h3>GAMBLA</h3>
                <p style="color: #cccccc; margin-bottom: 1.5rem;">
                    Il portale sportivo #1 d'Italia. Accendi la tua passione sportiva con notizie esclusive, 
                    fantacalcio innovativo e una community appassionata.
                </p>
                
                <!-- Social Links -->
                <div style="display: flex; gap: 1rem;">
                    <a href="https://instagram.com/gambla.it" target="_blank" 
                       style="width: 40px; height: 40px; background: var(--gambla-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">
                        📷
                    </a>
                    <a href="https://tiktok.com/@gambla.it" target="_blank" 
                       style="width: 40px; height: 40px; background: var(--gambla-secondary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">
                        🎵
                    </a>
                    <a href="https://t.me/gambla_community" target="_blank" 
                       style="width: 40px; height: 40px; background: var(--gambla-yellow); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: black; text-decoration: none;">
                        📲
                    </a>
                    <a href="mailto:info@gambla.it" 
                       style="width: 40px; height: 40px; background: #333; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">
                        ✉️
                    </a>
                </div>
            </div>
            
            <!-- Navigation -->
            <div class="footer-section">
                <h3>Navigazione</h3>
                <ul style="list-style: none;">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a></li>
                    <li><a href="<?php echo esc_url(home_url('/fantagambla')); ?>">FantaGambla</a></li>
                    <li><a href="<?php echo esc_url(home_url('/chi-siamo')); ?>">Chi Siamo</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contatti')); ?>">Contatti</a></li>
                </ul>
            </div>
            
            <!-- Categories -->
            <div class="footer-section">
                <h3>Sport</h3>
                <ul style="list-style: none;">
                    <?php
                    $categories = get_categories(array('number' => 6));
                    foreach($categories as $category) {
                        echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
            
            <!-- Community -->
            <div class="footer-section">
                <h3>Community</h3>
                <ul style="list-style: none;">
                    <li><a href="<?php echo esc_url(home_url('/newsletter')); ?>">Newsletter</a></li>
                    <li><a href="<?php echo esc_url(home_url('/faq')); ?>">FAQ</a></li>
                    <li><a href="https://t.me/gambla_community" target="_blank">Telegram Community</a></li>
                    <li><a href="https://instagram.com/gambla.it" target="_blank">Instagram</a></li>
                    <li><a href="https://tiktok.com/@gambla.it" target="_blank">TikTok</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <p>&copy; <?php echo date('Y'); ?> GAMBLA. Tutti i diritti riservati.</p>
                </div>
                
                <div style="display: flex; gap: 2rem; font-size: 0.875rem;">
                    <a href="#" style="color: #999;">Privacy Policy</a>
                    <a href="#" style="color: #999;">Termini di Servizio</a>
                    <span style="color: #999;">Made with ❤️ in Italy</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
