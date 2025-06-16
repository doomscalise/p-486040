
<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>GAMBLA</h3>
                <p>La tua fonte principale per notizie sportive, analisi e fantacalcio.</p>
            </div>
            
            <div class="footer-section">
                <h3>Categorie</h3>
                <ul>
                    <?php
                    $categories = get_categories();
                    foreach($categories as $category) {
                        echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Links</h3>
                <ul>
                    <li><a href="https://gambla.it">Sito Principale</a></li>
                    <li><a href="https://gambla.it/fantagambla">FantaGambla</a></li>
                    <li><a href="https://gambla.it/chi-siamo">Chi Siamo</a></li>
                    <li><a href="https://gambla.it/contatti">Contatti</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Social</h3>
                <ul>
                    <li><a href="#" target="_blank">Instagram</a></li>
                    <li><a href="#" target="_blank">Twitter</a></li>
                    <li><a href="#" target="_blank">YouTube</a></li>
                    <li><a href="#" target="_blank">TikTok</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> GAMBLA. Tutti i diritti riservati.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
