
<?php
/*
Template Name: Newsletter
*/
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1>GAMBLA <span class="gradient-text">Newsletter</span></h1>
        <p style="font-size: 1.25rem; color: #cccccc; margin-top: 1rem;">
            Ricevi le migliori notizie sportive direttamente nella tua email
        </p>
    </div>
</div>

<main class="content-section">
    <div class="container">
        <!-- Newsletter Benefits -->
        <section class="section-padding">
            <div class="text-center" style="margin-bottom: 4rem;">
                <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                    Perché Iscriversi alla <span class="gradient-text">Newsletter</span>?
                </h2>
                <p style="font-size: 1.25rem; color: #cccccc; max-width: 600px; margin: 0 auto;">
                    Tutto quello che ti serve per essere sempre aggiornato sul mondo dello sport
                </p>
            </div>
            
            <div class="sport-icons-grid">
                <div class="sport-icon-item">
                    <div class="sport-icon">📰</div>
                    <h3>News Esclusive</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">Le notizie più importanti prima di tutti gli altri</p>
                </div>
                <div class="sport-icon-item">
                    <div class="sport-icon">🎯</div>
                    <h3>Pronostici Expert</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">Analisi e pronostici dai nostri esperti</p>
                </div>
                <div class="sport-icon-item">
                    <div class="sport-icon">⚡</div>
                    <h3>FantaConsigli</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">I migliori consigli per FantaGAMBLA ogni settimana</p>
                </div>
                <div class="sport-icon-item">
                    <div class="sport-icon">🎁</div>
                    <h3>Offerte Speciali</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">Accesso anticipato a contest e promozioni</p>
                </div>
                <div class="sport-icon-item">
                    <div class="sport-icon">📊</div>
                    <h3>Report Settimanali</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">Riassunti completi della settimana sportiva</p>
                </div>
                <div class="sport-icon-item">
                    <div class="sport-icon">🏆</div>
                    <h3>Contest Esclusivi</h3>
                    <p style="color: #cccccc; margin-top: 0.5rem;">Partecipa a concorsi riservati agli iscritti</p>
                </div>
            </div>
        </section>
        
        <!-- Newsletter Signup Form -->
        <section class="section-padding" style="background: var(--gambla-gray);">
            <div class="container">
                <div style="max-width: 600px; margin: 0 auto;">
                    <div class="gambla-form">
                        <div class="text-center" style="margin-bottom: 3rem;">
                            <h2 class="font-display" style="font-size: 2.5rem; margin-bottom: 1rem;">
                                Iscriviti <span class="gradient-text">Ora</span>
                            </h2>
                            <p style="color: #cccccc;">
                                Compila il form qui sotto per iniziare a ricevere la nostra newsletter
                            </p>
                        </div>
                        
                        <form id="newsletter-signup-form">
                            <div class="form-group">
                                <label for="name">Nome Completo</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="interests">I tuoi sport preferiti</label>
                                <select id="interests" name="interests">
                                    <option value="">Seleziona il tuo sport preferito</option>
                                    <option value="calcio">Calcio</option>
                                    <option value="basket">Basket</option>
                                    <option value="tennis">Tennis</option>
                                    <option value="formula1">Formula 1</option>
                                    <option value="volley">Volley</option>
                                    <option value="tutti">Tutti gli sport</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="frequency">Frequenza email</label>
                                <select id="frequency" name="frequency">
                                    <option value="daily">Quotidiana</option>
                                    <option value="weekly" selected>Settimanale</option>
                                    <option value="monthly">Mensile</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                    <input type="checkbox" id="privacy" name="privacy" required style="width: auto;">
                                    <span>Accetto la <a href="#" style="color: var(--gambla-primary);">Privacy Policy</a> e i <a href="#" style="color: var(--gambla-primary);">Termini di Servizio</a></span>
                                </label>
                            </div>
                            
                            <div class="form-group">
                                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                    <input type="checkbox" id="marketing" name="marketing" style="width: auto;">
                                    <span>Voglio ricevere anche promozioni e offerte speciali</span>
                                </label>
                            </div>
                            
                            <button type="submit" class="btn-primary" style="width: 100%; font-size: 1.125rem; padding: 1.25rem;">
                                Iscriviti alla Newsletter
                            </button>
                        </form>
                        
                        <div id="newsletter-message" style="margin-top: 1rem; text-align: center; display: none;"></div>
                        
                        <div style="text-align: center; margin-top: 2rem; color: #999; font-size: 0.875rem;">
                            <p>📧 Niente spam, promesso! Puoi cancellarti in qualsiasi momento.</p>
                            <p style="margin-top: 0.5rem;">🔒 I tuoi dati sono protetti e non verranno mai condivisi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Sample Newsletter -->
        <section class="section-padding">
            <div class="container">
                <div class="text-center" style="margin-bottom: 4rem;">
                    <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                        Anteprima <span class="gradient-text">Newsletter</span>
                    </h2>
                    <p style="font-size: 1.25rem; color: #cccccc;">
                        Ecco come sarà strutturata la tua newsletter settimanale
                    </p>
                </div>
                
                <div style="max-width: 800px; margin: 0 auto;">
                    <div class="gambla-form">
                        <div style="text-align: center; margin-bottom: 2rem;">
                            <h3 style="color: var(--gambla-primary);">📬 GAMBLA Weekly - 15 Gennaio 2024</h3>
                        </div>
                        
                        <div style="margin-bottom: 2rem;">
                            <h4 style="color: var(--gambla-secondary); margin-bottom: 1rem;">🔥 Top News della Settimana</h4>
                            <ul style="color: #cccccc; padding-left: 1.5rem;">
                                <li style="margin-bottom: 0.5rem;">Milan, ufficiale l'arrivo di Pulisic dal Chelsea</li>
                                <li style="margin-bottom: 0.5rem;">Juventus-Atalanta: la preview della sfida scudetto</li>
                                <li style="margin-bottom: 0.5rem;">Calciomercato: tutte le trattative in corso</li>
                            </ul>
                        </div>
                        
                        <div style="margin-bottom: 2rem;">
                            <h4 style="color: var(--gambla-secondary); margin-bottom: 1rem;">⚽ FantaConsigli</h4>
                            <div style="background: #000; padding: 1rem; border-radius: 10px;">
                                <p style="color: #cccccc; margin-bottom: 0.5rem;"><strong>Consigliati:</strong> Osimhen, Lautaro, Kvara</p>
                                <p style="color: #cccccc; margin-bottom: 0.5rem;"><strong>Scommesse:</strong> Zaniolo, Politano, Berardi</p>
                                <p style="color: #cccccc;"><strong>Da evitare:</strong> Giocatori in dubbio per infortuni</p>
                            </div>
                        </div>
                        
                        <div style="margin-bottom: 2rem;">
                            <h4 style="color: var(--gambla-secondary); margin-bottom: 1rem;">📊 Statistiche Premium</h4>
                            <p style="color: #cccccc;">Expected goals, heat maps e analisi avanzate dei match più importanti della giornata.</p>
                        </div>
                        
                        <div style="text-align: center; padding: 1rem; background: var(--gambla-gray); border-radius: 10px;">
                            <p style="color: #cccccc; margin-bottom: 1rem;">Ti è piaciuta questa newsletter?</p>
                            <div style="display: flex; gap: 1rem; justify-content: center;">
                                <span style="background: var(--gambla-primary); padding: 0.5rem 1rem; border-radius: 20px; color: white; cursor: pointer;">👍 Sì</span>
                                <span style="background: #333; padding: 0.5rem 1rem; border-radius: 20px; color: white; cursor: pointer;">👎 No</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
document.getElementById('newsletter-signup-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const messageDiv = document.getElementById('newsletter-message');
    
    // Basic validation
    if (!formData.get('privacy')) {
        messageDiv.style.display = 'block';
        messageDiv.style.color = '#ff6b6b';
        messageDiv.textContent = 'Devi accettare la Privacy Policy per proseguire.';
        return;
    }
    
    // Simulate AJAX request
    messageDiv.style.display = 'block';
    messageDiv.style.color = '#4ecdc4';
    messageDiv.textContent = '✅ Iscrizione completata con successo! Controlla la tua email per confermare.';
    
    // Reset form
    this.reset();
    
    // Hide message after 5 seconds
    setTimeout(() => {
        messageDiv.style.display = 'none';
    }, 5000);
});
</script>

<?php get_footer(); ?>
