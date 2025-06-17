
<?php
/*
Template Name: Fantagambla
*/
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1><span class="gradient-text">FantaGAMBLA</span></h1>
        <p style="font-size: 1.25rem; color: #cccccc; margin-top: 1rem;">
            Il fantacalcio reinventato. Più strategia, più divertimento, più vincite.
        </p>
    </div>
</div>

<main class="content-section">
    <div class="container">
        <!-- Features Section -->
        <section class="section-padding">
            <div class="text-center" style="margin-bottom: 4rem;">
                <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                    Perché <span class="gradient-text">FantaGAMBLA</span>?
                </h2>
                <p style="font-size: 1.25rem; color: #cccccc; max-width: 600px; margin: 0 auto;">
                    Non è il solito fantacalcio. È qualcosa di completamente nuovo.
                </p>
            </div>
            
            <div class="sport-icons-grid">
                <div class="sport-icon-item">
                    <div class="sport-icon">🎯</div>
                    <h3>AI Powered</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">Algoritmi avanzati per i migliori consigli di formazione</p>
                </div>
                <div class="sport-icon-item">
                    <div class="sport-icon">💎</div>
                    <h3>Premi Reali</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">Vinci premi in denaro e gadget esclusivi</p>
                </div>
                <div class="sport-icon-item">
                    <div class="sport-icon">👥</div>
                    <h3>Community</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">Sfida i migliori fantallenatori d'Italia</p>
                </div>
                <div class="sport-icon-item">
                    <div class="sport-icon">📊</div>
                    <h3>Statistiche Pro</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">Analisi approfondite di ogni giocatore</p>
                </div>
                <div class="sport-icon-item">
                    <div class="sport-icon">⚡</div>
                    <h3>Live Updates</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">Punteggi e classifiche in tempo reale</p>
                </div>
                <div class="sport-icon-item">
                    <div class="sport-icon">🏆</div>
                    <h3>Leghe Esclusive</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">Tornei privati con format innovativi</p>
                </div>
            </div>
        </section>
        
        <!-- How It Works -->
        <section class="section-padding" style="background: var(--gambla-gray);">
            <div class="container">
                <div class="text-center" style="margin-bottom: 4rem;">
                    <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                        Come <span class="gradient-text">Funziona</span>
                    </h2>
                    <p style="font-size: 1.25rem; color: #cccccc;">
                        Tre semplici passaggi per iniziare a vincere
                    </p>
                </div>
                
                <div class="posts-grid">
                    <div class="post-card" style="text-align: center;">
                        <div style="font-size: 4rem; margin-bottom: 1rem;">1️⃣</div>
                        <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">Registrati</h3>
                        <p style="color: #cccccc;">Crea il tuo account e unisciti alla community FantaGAMBLA</p>
                    </div>
                    <div class="post-card" style="text-align: center;">
                        <div style="font-size: 4rem; margin-bottom: 1rem;">2️⃣</div>
                        <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">Componi la Squadra</h3>
                        <p style="color: #cccccc;">Usa i nostri consigli AI per creare la formazione perfetta</p>
                    </div>
                    <div class="post-card" style="text-align: center;">
                        <div style="font-size: 4rem; margin-bottom: 1rem;">3️⃣</div>
                        <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">Vinci</h3>
                        <p style="color: #cccccc;">Scala le classifiche e porta a casa premi incredibili</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Stats -->
        <section class="section-padding">
            <div class="container">
                <div class="text-center" style="margin-bottom: 4rem;">
                    <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                        I <span class="gradient-text">Numeri</span>
                    </h2>
                </div>
                
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">5,000+</div>
                        <div class="stat-label">Fantallenatori Attivi</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">€50,000</div>
                        <div class="stat-label">Premi Distribuiti</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">1,200+</div>
                        <div class="stat-label">Leghe Attive</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Soddisfazione Utenti</div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA -->
        <section class="newsletter-section">
            <div class="container">
                <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem; color: white;">
                    Pronto a Dominare il FantaCalcio?
                </h2>
                <p style="font-size: 1.25rem; margin-bottom: 2rem; color: white;">
                    Unisciti a FantaGAMBLA e inizia a vincere subito
                </p>
                
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="#" class="btn-primary" style="background: white; color: var(--gambla-primary);">
                        Inizia Gratis Ora
                    </a>
                    <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn-secondary" style="border: 2px solid white; background: transparent;">
                        Scopri le Strategie
                    </a>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
