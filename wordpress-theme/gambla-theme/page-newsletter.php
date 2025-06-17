
<?php
/*
Template Name: Newsletter
*/
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1 class="newsletter-page-title">
            <?php echo esc_html(get_theme_mod('gambla_newsletter_title', 'Perché Iscriversi alla Newsletter?')); ?>
        </h1>
        <p class="newsletter-page-subtitle" style="font-size: 1.25rem; color: #cccccc; margin-top: 1rem;">
            <?php echo esc_html(get_theme_mod('gambla_newsletter_subtitle', 'Tutto quello che ti serve per essere sempre aggiornato sul mondo dello sport')); ?>
        </p>
    </div>
</div>

<main class="content-section">
    <div class="container">
        <!-- Newsletter Benefits -->
        <section class="section-padding">
            <div class="newsletter-benefits-grid">
                <?php for ($i = 1; $i <= 6; $i++) : ?>
                    <?php if (get_theme_mod("gambla_newsletter_benefit_{$i}_show", true)) : ?>
                        <div class="newsletter-benefit">
                            <div class="benefit-icon"><?php echo esc_html(get_theme_mod("gambla_newsletter_benefit_{$i}_icon", '📰')); ?></div>
                            <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">
                                <?php echo esc_html(get_theme_mod("gambla_newsletter_benefit_{$i}_title", 'Benefit')); ?>
                            </h3>
                            <p style="color: #cccccc;">
                                <?php echo esc_html(get_theme_mod("gambla_newsletter_benefit_{$i}_description", 'Descrizione del benefit')); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </section>
        
        <!-- Newsletter Signup Form -->
        <section class="newsletter-section" style="border-radius: 20px; margin: 4rem 0;">
            <div class="container">
                <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem; color: white;">
                    Iscriviti Ora!
                </h2>
                <p style="font-size: 1.25rem; margin-bottom: 2rem; color: white;">
                    Ricevi le migliori notizie sportive direttamente nella tua email
                </p>
                
                <form class="newsletter-form" id="newsletter-form">
                    <input type="email" placeholder="Il tuo indirizzo email" required name="email">
                    <button type="submit">Iscriviti Gratis</button>
                </form>
                
                <p style="font-size: 0.875rem; margin-top: 1rem; color: rgba(255,255,255,0.8);">
                    Cancellerai l'iscrizione in qualsiasi momento. Privacy policy garantita.
                </p>
            </div>
        </section>
        
        <!-- Testimonials or Social Proof -->
        <section class="section-padding" style="background: var(--gambla-gray); border-radius: 20px;">
            <div class="container text-center">
                <h2 class="font-display" style="font-size: 2.5rem; margin-bottom: 3rem;">
                    Cosa Dicono di <span class="gradient-text">Noi</span>
                </h2>
                
                <div class="posts-grid">
                    <div class="post-card" style="text-align: center;">
                        <div style="font-size: 3rem; margin-bottom: 1rem;">⭐⭐⭐⭐⭐</div>
                        <div class="post-content">
                            <p style="font-style: italic; margin-bottom: 1.5rem; color: #cccccc;">
                                "La newsletter di GAMBLA è fantastica! Ricevo sempre le notizie più importanti prima di tutti."
                            </p>
                            <h4 style="color: var(--gambla-primary);">Marco T.</h4>
                            <p style="color: #999; font-size: 0.9rem;">Utente dal 2021</p>
                        </div>
                    </div>
                    
                    <div class="post-card" style="text-align: center;">
                        <div style="font-size: 3rem; margin-bottom: 1rem;">⭐⭐⭐⭐⭐</div>
                        <div class="post-content">
                            <p style="font-style: italic; margin-bottom: 1.5rem; color: #cccccc;">
                                "I pronostici sono accurati e i consigli per il fantacalcio mi hanno fatto vincere tante volte!"
                            </p>
                            <h4 style="color: var(--gambla-primary);">Anna R.</h4>
                            <p style="color: #999; font-size: 0.9rem;">Utente dal 2020</p>
                        </div>
                    </div>
                    
                    <div class="post-card" style="text-align: center;">
                        <div style="font-size: 3rem; margin-bottom: 1rem;">⭐⭐⭐⭐⭐</div>
                        <div class="post-content">
                            <p style="font-style: italic; margin-bottom: 1.5rem; color: #cccccc;">
                                "Finalmente una fonte affidabile per le notizie sportive. Non posso più farne a meno!"
                            </p>
                            <h4 style="color: var(--gambla-primary);">Luca M.</h4>
                            <p style="color: #999; font-size: 0.9rem;">Utente dal 2022</p>
                        </div>
                    </div>
                </div>
                
                <div style="margin-top: 3rem;">
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-number">10K+</div>
                            <div class="stat-label">Iscritti Attivi</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">95%</div>
                            <div class="stat-label">Soddisfazione</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">3x</div>
                            <div class="stat-label">Settimanale</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
