
<?php
/*
Template Name: Contatti
*/
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1><span class="gradient-text">Contatti</span></h1>
        <p style="font-size: 1.25rem; color: #cccccc; margin-top: 1rem;">
            Mettiti in contatto con il team GAMBLA
        </p>
    </div>
</div>

<main class="content-section">
    <div class="container">
        <div class="two-column">
            <!-- Contact Form -->
            <div>
                <div class="gambla-form">
                    <h2 style="color: var(--gambla-primary); margin-bottom: 1.5rem;">Invia un Messaggio</h2>
                    <p style="color: #cccccc; margin-bottom: 2rem;">
                        Hai domande, suggerimenti o vuoi collaborare con noi? Compila il form e ti risponderemo entro 24 ore.
                    </p>
                    
                    <form id="contact-form">
                        <div class="form-group">
                            <label for="contact-name">Nome Completo *</label>
                            <input type="text" id="contact-name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-email">Email *</label>
                            <input type="email" id="contact-email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-subject">Oggetto *</label>
                            <select id="contact-subject" name="subject" required>
                                <option value="">Seleziona un oggetto</option>
                                <option value="general">Informazioni Generali</option>
                                <option value="support">Supporto Tecnico</option>
                                <option value="partnership">Partnership/Collaborazioni</option>
                                <option value="press">Ufficio Stampa</option>
                                <option value="feedback">Feedback/Suggerimenti</option>
                                <option value="other">Altro</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-phone">Telefono (Opzionale)</label>
                            <input type="tel" id="contact-phone" name="phone">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-message">Messaggio *</label>
                            <textarea id="contact-message" name="message" rows="6" required placeholder="Descrivi la tua richiesta o il tuo messaggio..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox" id="contact-privacy" name="privacy" required style="width: auto;">
                                <span>Accetto la <a href="#" style="color: var(--gambla-primary);">Privacy Policy</a> *</span>
                            </label>
                        </div>
                        
                        <button type="submit" class="btn-primary" style="width: 100%; font-size: 1.125rem; padding: 1.25rem;">
                            Invia Messaggio
                        </button>
                    </form>
                    
                    <div id="contact-message-result" style="margin-top: 1rem; text-align: center; display: none;"></div>
                </div>
            </div>
            
            <!-- Contact Info -->
            <div>
                <div class="gambla-form" style="margin-bottom: 2rem;">
                    <h3 style="color: var(--gambla-primary); margin-bottom: 1.5rem;">Informazioni di Contatto</h3>
                    
                    <div style="margin-bottom: 2rem;">
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                            <span style="color: var(--gambla-primary); font-size: 1.5rem;">📧</span>
                            <div>
                                <strong style="color: white;">Email</strong><br>
                                <span style="color: #cccccc;">info@gambla.it</span>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                            <span style="color: var(--gambla-primary); font-size: 1.5rem;">💬</span>
                            <div>
                                <strong style="color: white;">Live Chat</strong><br>
                                <span style="color: #cccccc;">Disponibile 9:00-18:00</span>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                            <span style="color: var(--gambla-primary); font-size: 1.5rem;">📱</span>
                            <div>
                                <strong style="color: white;">Social Media</strong><br>
                                <span style="color: #cccccc;">@gambla.it su tutti i canali</span>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <span style="color: var(--gambla-primary); font-size: 1.5rem;">⏰</span>
                            <div>
                                <strong style="color: white;">Orari di Supporto</strong><br>
                                <span style="color: #cccccc;">Lun-Ven: 9:00-18:00<br>Sab: 9:00-13:00</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Social Links -->
                <div class="gambla-form" style="margin-bottom: 2rem;">
                    <h3 style="color: var(--gambla-primary); margin-bottom: 1.5rem;">Seguici sui Social</h3>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <a href="https://instagram.com/gambla.it" target="_blank" style="display: flex; align-items: center; gap: 0.5rem; padding: 1rem; background: #E4405F; color: white; text-decoration: none; border-radius: 10px; font-weight: 600;">
                            📷 Instagram
                        </a>
                        <a href="https://tiktok.com/@gambla.it" target="_blank" style="display: flex; align-items: center; gap: 0.5rem; padding: 1rem; background: #000; color: white; text-decoration: none; border-radius: 10px; font-weight: 600;">
                            🎵 TikTok
                        </a>
                        <a href="https://t.me/gambla_community" target="_blank" style="display: flex; align-items: center; gap: 0.5rem; padding: 1rem; background: #0088CC; color: white; text-decoration: none; border-radius: 10px; font-weight: 600;">
                            📲 Telegram
                        </a>
                        <a href="mailto:info@gambla.it" style="display: flex; align-items: center; gap: 0.5rem; padding: 1rem; background: var(--gambla-primary); color: white; text-decoration: none; border-radius: 10px; font-weight: 600;">
                            ✉️ Email
                        </a>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="gambla-form">
                    <h3 style="color: var(--gambla-primary); margin-bottom: 1.5rem;">Azioni Rapide</h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <a href="<?php echo esc_url(home_url('/faq')); ?>" class="btn-secondary" style="text-align: center;">
                            Consulta le FAQ
                        </a>
                        <a href="<?php echo esc_url(home_url('/newsletter')); ?>" class="btn-primary" style="text-align: center;">
                            Iscriviti alla Newsletter
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Team & Office Info -->
        <section class="section-padding" style="background: var(--gambla-gray); margin-top: 4rem; border-radius: 20px;">
            <div class="container">
                <div class="text-center" style="margin-bottom: 3rem;">
                    <h2 class="font-display" style="font-size: 2.5rem; margin-bottom: 1rem;">
                        Il Nostro <span class="gradient-text">Team</span>
                    </h2>
                    <p style="font-size: 1.125rem; color: #cccccc;">
                        Un team appassionato al tuo servizio 24/7
                    </p>
                </div>
                
                <div class="posts-grid">
                    <div class="post-card" style="text-align: center;">
                        <div style="font-size: 4rem; margin-bottom: 1rem;">👨‍💼</div>
                        <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">Supporto Generale</h3>
                        <p style="color: #cccccc; margin-bottom: 1rem;">Per domande generali, informazioni sui servizi e assistenza account.</p>
                        <a href="mailto:info@gambla.it" style="color: var(--gambla-secondary);">info@gambla.it</a>
                    </div>
                    
                    <div class="post-card" style="text-align: center;">
                        <div style="font-size: 4rem; margin-bottom: 1rem;">🔧</div>
                        <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">Supporto Tecnico</h3>
                        <p style="color: #cccccc; margin-bottom: 1rem;">Per problemi tecnici, bug report e assistenza tecnica specializzata.</p>
                        <a href="mailto:tech@gambla.it" style="color: var(--gambla-secondary);">tech@gambla.it</a>
                    </div>
                    
                    <div class="post-card" style="text-align: center;">
                        <div style="font-size: 4rem; margin-bottom: 1rem;">🤝</div>
                        <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">Partnership</h3>
                        <p style="color: #cccccc; margin-bottom: 1rem;">Per collaborazioni, sponsorizzazioni e opportunità di business.</p>
                        <a href="mailto:business@gambla.it" style="color: var(--gambla-secondary);">business@gambla.it</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const messageDiv = document.getElementById('contact-message-result');
    
    // Basic validation
    if (!formData.get('privacy')) {
        messageDiv.style.display = 'block';
        messageDiv.style.color = '#ff6b6b';
        messageDiv.textContent = 'Devi accettare la Privacy Policy per inviare il messaggio.';
        return;
    }
    
    // Simulate AJAX request
    messageDiv.style.display = 'block';
    messageDiv.style.color = '#4ecdc4';
    messageDiv.textContent = '✅ Messaggio inviato con successo! Ti risponderemo entro 24 ore.';
    
    // Reset form
    this.reset();
    
    // Hide message after 5 seconds
    setTimeout(() => {
        messageDiv.style.display = 'none';
    }, 5000);
});
</script>

<?php get_footer(); ?>
