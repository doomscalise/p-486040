
<?php
/*
Template Name: FAQ
*/
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1><span class="gradient-text">FAQ</span></h1>
        <p style="font-size: 1.25rem; color: #cccccc; margin-top: 1rem;">
            Domande frequenti su GAMBLA e i nostri servizi
        </p>
    </div>
</div>

<main class="content-section">
    <div class="container">
        <div class="two-column">
            <div>
                <?php
                $faq_posts = get_posts(array(
                    'post_type' => 'faq',
                    'numberposts' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));
                
                if (!empty($faq_posts)) :
                    foreach($faq_posts as $faq) : setup_postdata($faq);
                ?>
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span><?php echo get_the_title($faq->ID); ?></span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <?php echo apply_filters('the_content', get_the_content(null, false, $faq->ID)); ?>
                        </div>
                    </div>
                <?php 
                    endforeach; 
                    wp_reset_postdata();
                else : 
                ?>
                    <!-- Default FAQs if none are created -->
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>Cos'è GAMBLA?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>GAMBLA è il portale sportivo più innovativo d'Italia. Offriamo notizie in tempo reale, analisi approfondite, FantaGAMBLA (il nostro fantacalcio rivoluzionario) e una community appassionata per condividere la tua passione sportiva.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>Come funziona FantaGAMBLA?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>FantaGAMBLA è il nostro sistema di fantacalcio che utilizza algoritmi AI per suggerirti le migliori formazioni. Puoi partecipare a leghe pubbliche o private, vincere premi reali e scalare le classifiche nazionali.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>È gratis utilizzare GAMBLA?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Sì! La registrazione e l'accesso ai contenuti base sono completamente gratuiti. Abbiamo anche piani premium che offrono funzionalità aggiuntive come statistiche avanzate e consigli AI personalizzati.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>Quali sport coprite?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Copriamo principalmente calcio (Serie A, Champions League, Europa League), ma anche basket NBA, tennis ATP/WTA, Formula 1, volley e sport olimpici. La nostra copertura si espande costantemente.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>Come posso contattare il supporto?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Puoi contattarci attraverso la pagina Contatti, via email a info@gambla.it, o attraverso i nostri canali social. Il nostro team risponde entro 24 ore durante i giorni lavorativi.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>Posso cancellare il mio account?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Certamente. Puoi cancellare il tuo account in qualsiasi momento dalle impostazioni del profilo o contattando il nostro supporto. Tutti i tuoi dati verranno eliminati secondo le normative GDPR.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>Come vengono calcolati i punteggi in FantaGAMBLA?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>I punteggi si basano sulle performance reali dei calciatori (gol, assist, voti in pagella) con bonus speciali per prestazioni eccezionali. Il nostro algoritmo AI considera anche fattori come difficoltà dell'avversario e importanza della partita.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>Avete un'app mobile?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Al momento GAMBLA è ottimizzato per browser mobile, ma stiamo sviluppando app native per iOS e Android che saranno disponibili nel 2024. Iscriviti alla newsletter per essere aggiornato!</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Sidebar with contact info -->
            <div>
                <div class="gambla-form" style="position: sticky; top: 2rem;">
                    <h3 style="color: var(--gambla-primary); margin-bottom: 1.5rem;">Non trovi la risposta?</h3>
                    <p style="color: #cccccc; margin-bottom: 2rem;">
                        Contattaci direttamente e ti risponderemo il prima possibile.
                    </p>
                    
                    <div style="margin-bottom: 2rem;">
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                            <span style="color: var(--gambla-primary);">📧</span>
                            <span>info@gambla.it</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                            <span style="color: var(--gambla-primary);">💬</span>
                            <span>Live Chat disponibile</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <span style="color: var(--gambla-primary);">📱</span>
                            <span>Social Media: @gambla.it</span>
                        </div>
                    </div>
                    
                    <a href="<?php echo esc_url(home_url('/contatti')); ?>" class="btn-primary" style="width: 100%; text-align: center;">
                        Contattaci
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function toggleFaq(element) {
    const faqItem = element.parentElement;
    const faqAnswer = faqItem.querySelector('.faq-answer');
    const faqIcon = element.querySelector('.faq-icon');
    
    if (faqItem.classList.contains('active')) {
        faqItem.classList.remove('active');
        faqAnswer.style.display = 'none';
        faqIcon.textContent = '+';
    } else {
        // Close all other FAQs
        document.querySelectorAll('.faq-item.active').forEach(item => {
            item.classList.remove('active');
            item.querySelector('.faq-answer').style.display = 'none';
            item.querySelector('.faq-icon').textContent = '+';
        });
        
        // Open clicked FAQ
        faqItem.classList.add('active');
        faqAnswer.style.display = 'block';
        faqIcon.textContent = '−';
    }
}
</script>

<?php get_footer(); ?>
