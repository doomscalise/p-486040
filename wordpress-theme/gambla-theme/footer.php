
<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3 class="footer-about-title"><?php echo esc_html(get_theme_mod('gambla_footer_about_title', 'Su GAMBLA')); ?></h3>
                <p class="footer-about-text"><?php echo esc_html(get_theme_mod('gambla_footer_about_text', 'La piattaforma italiana dedicata al mondo dello sport. Notizie, analisi, fantacalcio e molto altro per tutti gli appassionati.')); ?></p>
            </div>
            
            <div class="footer-section">
                <h3 class="footer-nav-title"><?php echo esc_html(get_theme_mod('gambla_footer_nav_title', 'Navigazione')); ?></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a></li>
                    <li><a href="<?php echo esc_url(home_url('/chi-siamo')); ?>">Chi Siamo</a></li>
                    <li><a href="<?php echo esc_url(home_url('/fantagambla')); ?>">FantaGambla</a></li>
                    <li><a href="<?php echo esc_url(home_url('/newsletter')); ?>">Newsletter</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contatti')); ?>">Contatti</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3 class="footer-sport-title"><?php echo esc_html(get_theme_mod('gambla_footer_sport_title', 'Sport')); ?></h3>
                <ul>
                    <li><a href="#">Calcio</a></li>
                    <li><a href="#">Basket</a></li>
                    <li><a href="#">Tennis</a></li>
                    <li><a href="#">Volley</a></li>
                    <li><a href="#">Formula 1</a></li>
                    <li><a href="#">Motori</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3 class="footer-community-title"><?php echo esc_html(get_theme_mod('gambla_footer_community_title', 'Community')); ?></h3>
                <ul>
                    <li><a href="#">Forum</a></li>
                    <li><a href="#">Discord</a></li>
                    <li><a href="#">Telegram</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">YouTube</a></li>
                    <li><a href="#">TikTok</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p class="footer-copyright"><?php echo esc_html(get_theme_mod('gambla_footer_text', '© 2024 GAMBLA. Tutti i diritti riservati.')); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
