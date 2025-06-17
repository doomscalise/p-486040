
<?php
/*
Template Name: Blog
*/
get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="font-display blog-page-title">
                    <?php echo esc_html(get_theme_mod('gambla_blog_title', 'Accendi la Tua Passione Sportiva')); ?>
                </h1>
                <p class="blog-page-description"><?php echo esc_html(get_theme_mod('gambla_blog_description', 'Unisciti alla community sportiva più dinamica d\'Italia. Notizie live, fantacalcio, discussioni accese e contenuti esclusivi ti aspettano.')); ?></p>
                
                <div class="hero-buttons">
                    <a href="#sport" class="btn-primary">
                        Esplora Sport →
                    </a>
                    <a href="<?php echo esc_url(home_url('/newsletter')); ?>" class="btn-secondary">
                        Iscriviti Gratis
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="stats-grid" style="margin-top: 3rem;">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">Utenti Attivi</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Articoli</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Copertura Live</div>
                    </div>
                </div>
            </div>
            
            <div class="hero-visual">
                <div class="hero-card">
                    <h3 style="color: var(--gambla-primary); margin-bottom: 1rem; font-family: var(--font-display);">🎯 GAMBLA Demo</h3>
                    <div class="accent-line"></div>
                    
                    <div class="demo-item interactive-element">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: white; font-weight: bold;">📈 Analisi Live</span>
                            <span style="color: var(--gambla-primary); font-weight: bold;">ATTIVO</span>
                        </div>
                    </div>
                    
                    <div class="demo-item interactive-element">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: white; font-weight: bold;">⚽ FantaGambla</span>
                            <span style="color: var(--gambla-secondary); font-weight: bold;">NUOVO</span>
                        </div>
                    </div>
                    
                    <div class="demo-item interactive-element">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: white; font-weight: bold;">💬 Community</span>
                            <span style="color: var(--gambla-yellow); font-weight: bold;">1.2K</span>
                        </div>
                    </div>
                    
                    <div style="margin-top: 1.5rem; text-align: center;">
                        <a href="<?php echo esc_url(home_url('/unisciti-ora')); ?>" class="btn-primary" style="font-size: 0.9rem; padding: 0.75rem 1.5rem;">
                            Prova Ora Gratis
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What is GAMBLA Section -->
<section class="section-padding" style="background: var(--gambla-gray);" id="sport">
    <div class="container">
        <div class="text-center" style="margin-bottom: 4rem;">
            <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                Cos'è <span class="gradient-text">GAMBLA</span>
            </h2>
            <div class="accent-line" style="width: 100px; margin: 1rem auto;"></div>
            <p style="font-size: 1.25rem; color: #cccccc; max-width: 800px; margin: 0 auto;">
                La piattaforma che unisce passione sportiva, tecnologia avanzata e community attiva per offrirti un'esperienza unica nel mondo dello sport online.
            </p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; margin-bottom: 4rem;">
            <div class="demo-card">
                <h3 style="color: var(--gambla-primary); margin-bottom: 1rem; font-size: 1.5rem;">📊 Analisi Avanzate</h3>
                <div class="accent-line" style="width: 50px;"></div>
                <p style="color: #cccccc; margin-bottom: 1.5rem;">
                    Statistiche in tempo reale, pronostici basati su AI e analisi approfondite per ogni partita.
                </p>
                <div style="background: #000; padding: 1rem; border-radius: 10px; border-left: 3px solid var(--gambla-primary);">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                        <span style="color: white;">Accuratezza</span>
                        <span style="color: var(--gambla-primary); font-weight: bold;">87%</span>
                    </div>
                    <div style="background: #333; height: 8px; border-radius: 4px;">
                        <div style="background: linear-gradient(135deg, var(--gambla-primary), var(--gambla-secondary)); width: 87%; height: 100%; border-radius: 4px;"></div>
                    </div>
                </div>
            </div>
            
            <div class="demo-card">
                <h3 style="color: var(--gambla-secondary); margin-bottom: 1rem; font-size: 1.5rem;">🏆 FantaGambla</h3>
                <div class="accent-line" style="width: 50px;"></div>
                <p style="color: #cccccc; margin-bottom: 1.5rem;">
                    Il fantacalcio più innovativo d'Italia con premi reali e competizioni esclusive.
                </p>
                <div style="background: #000; padding: 1rem; border-radius: 10px; border-left: 3px solid var(--gambla-secondary);">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                        <span style="color: white;">Posizione</span>
                        <span style="color: var(--gambla-secondary); font-weight: bold;">#3</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: white;">Punti</span>
                        <span style="color: var(--gambla-yellow); font-weight: bold;">1,247</span>
                    </div>
                </div>
            </div>
            
            <div class="demo-card">
                <h3 style="color: var(--gambla-yellow); margin-bottom: 1rem; font-size: 1.5rem;">💬 Community</h3>
                <div class="accent-line" style="width: 50px;"></div>
                <p style="color: #cccccc; margin-bottom: 1.5rem;">
                    Confrontati con migliaia di appassionati, condividi le tue previsioni e scalda le classifiche.
                </p>
                <div style="background: #000; padding: 1rem; border-radius: 10px; border-left: 3px solid var(--gambla-yellow);">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                        <span style="color: white;">Membri Online</span>
                        <span style="color: var(--gambla-primary); font-weight: bold;">342</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: white;">Discussioni Attive</span>
                        <span style="color: var(--gambla-secondary); font-weight: bold;">28</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sport Icons Grid -->
<section class="section-padding" style="background: var(--gambla-dark);">
    <div class="container">
        <div class="text-center" style="margin-bottom: 4rem;">
            <h2 class="font-display sports-section-title" style="font-size: 3rem; margin-bottom: 1rem;">
                <?php 
                $sports_title = get_theme_mod('gambla_sports_title', 'I Nostri Sport');
                $parts = explode(' ', $sports_title);
                if (count($parts) >= 2) {
                    echo esc_html($parts[0] . ' ' . $parts[1]) . ' <span class="gradient-text">' . esc_html(implode(' ', array_slice($parts, 2))) . '</span>';
                } else {
                    echo '<span class="gradient-text">' . esc_html($sports_title) . '</span>';
                }
                ?>
            </h2>
            <div class="accent-line" style="width: 100px; margin: 1rem auto;"></div>
            <p class="sports-section-subtitle" style="font-size: 1.25rem; color: #cccccc;">
                <?php echo esc_html(get_theme_mod('gambla_sports_subtitle', 'Copertura completa per tutti gli sport che ami')); ?>
            </p>
        </div>
        
        <div class="sport-icons-grid">
            <?php for ($i = 1; $i <= 6; $i++) : ?>
                <?php if (get_theme_mod("gambla_sport_{$i}_show", true)) : ?>
                    <div class="sport-icon-item interactive-element">
                        <div class="sport-icon"><?php echo esc_html(get_theme_mod("gambla_sport_{$i}_icon", '⚽')); ?></div>
                        <div class="accent-line" style="width: 30px; margin: 1rem auto;"></div>
                        <h3><?php echo esc_html(get_theme_mod("gambla_sport_{$i}_name", 'Sport')); ?></h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">
                            <?php echo esc_html(get_theme_mod("gambla_sport_{$i}_description", 'Descrizione sport')); ?>
                        </p>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding" style="background: linear-gradient(135deg, var(--gambla-primary), var(--gambla-secondary)); position: relative; overflow: hidden;">
    <div style="position: absolute; top: -50%; right: -25%; width: 500px; height: 500px; background: rgba(255,255,255,0.1); border-radius: 50%; filter: blur(100px);"></div>
    <div style="position: absolute; bottom: -50%; left: -25%; width: 300px; height: 300px; background: rgba(0,0,0,0.2); border-radius: 50%; filter: blur(80px);"></div>
    
    <div class="container" style="position: relative; z-index: 10;">
        <div class="text-center">
            <h2 class="font-display" style="font-size: 3.5rem; margin-bottom: 1rem; color: white;">
                Pronto a Vivere lo Sport <br>in Prima Persona?
            </h2>
            <p style="font-size: 1.25rem; margin-bottom: 2rem; color: rgba(255,255,255,0.9); max-width: 600px; margin-left: auto; margin-right: auto;">
                Unisciti a migliaia di appassionati che hanno già scelto GAMBLA come fonte principale di notizie sportive e fantacalcio.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url(home_url('/unisciti-ora')); ?>" class="btn-primary" style="background: white; color: var(--gambla-primary); font-size: 1.1rem; padding: 1.25rem 2.5rem;">
                    Inizia Subito - È Gratis!
                </a>
                <a href="<?php echo esc_url(home_url('/fantagambla')); ?>" class="btn-secondary" style="background: rgba(0,0,0,0.3); border: 2px solid white; font-size: 1.1rem; padding: 1.25rem 2.5rem;">
                    Scopri FantaGambla
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
