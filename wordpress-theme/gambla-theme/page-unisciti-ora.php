
<?php
/*
Template Name: Unisciti Ora
*/
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1><span class="gradient-text">Unisciti a GAMBLA</span></h1>
        <p style="font-size: 1.25rem; color: #cccccc; margin-top: 1rem;">
            Entra a far parte della community sportiva più dinamica d'Italia
        </p>
    </div>
</div>

<main class="content-section">
    <div class="container">
        <!-- Registration Form -->
        <section class="section-padding">
            <div class="text-center" style="margin-bottom: 4rem;">
                <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                    Inizia Subito la Tua <span class="gradient-text">Avventura</span>
                </h2>
                <p style="font-size: 1.25rem; color: #cccccc; max-width: 600px; margin: 0 auto;">
                    Registrati gratuitamente e scopri tutti i vantaggi di essere un membro GAMBLA
                </p>
            </div>
            
            <div style="max-width: 600px; margin: 0 auto;">
                <form class="gambla-form" id="registration-form">
                    <div class="form-group">
                        <label for="username">Nome Utente</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="sport-preference">Sport Preferito</label>
                        <select id="sport-preference" name="sport_preference">
                            <option value="">Seleziona il tuo sport preferito</option>
                            <option value="calcio">Calcio</option>
                            <option value="basket">Basket</option>
                            <option value="tennis">Tennis</option>
                            <option value="formula1">Formula 1</option>
                            <option value="volley">Volley</option>
                            <option value="altro">Altro</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            <input type="checkbox" required> 
                            Accetto i <a href="#" style="color: var(--gambla-primary);">termini e condizioni</a>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn-primary" style="width: 100%; font-size: 1.2rem; margin-top: 2rem;">
                        🚀 Unisciti a GAMBLA
                    </button>
                </form>
            </div>
        </section>
        
        <!-- Benefits Section -->
        <section class="section-padding" style="background: var(--gambla-gray);">
            <div class="container">
                <div class="text-center" style="margin-bottom: 4rem;">
                    <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                        Cosa Ottieni <span class="gradient-text">Gratis</span>
                    </h2>
                </div>
                
                <div class="sport-icons-grid">
                    <div class="sport-icon-item">
                        <div class="sport-icon">📈</div>
                        <h3>Analisi Gratuite</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">Accesso a tutte le nostre analisi sportive</p>
                    </div>
                    <div class="sport-icon-item">
                        <div class="sport-icon">🎯</div>
                        <h3>Pronostici Premium</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">I nostri consigli esperti per le tue scommesse</p>
                    </div>
                    <div class="sport-icon-item">
                        <div class="sport-icon">👥</div>
                        <h3>Community Esclusiva</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">Accesso al gruppo privato Telegram</p>
                    </div>
                    <div class="sport-icon-item">
                        <div class="sport-icon">📱</div>
                        <h3>App Mobile</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">Notifiche in tempo reale sui tuoi dispositivi</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
