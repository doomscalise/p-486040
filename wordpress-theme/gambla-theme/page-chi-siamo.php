
<?php
/*
Template Name: Chi Siamo
*/
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1>Chi <span class="gradient-text">Siamo</span></h1>
        <p style="font-size: 1.25rem; color: #cccccc; margin-top: 1rem;">
            La passione per lo sport che ci unisce da sempre
        </p>
    </div>
</div>

<main class="content-section">
    <div class="container">
        <!-- About Section -->
        <section class="section-padding">
            <div class="two-column">
                <div>
                    <h2 class="font-display" style="font-size: 2.5rem; margin-bottom: 2rem;">
                        La Nostra <span class="gradient-text">Storia</span>
                    </h2>
                    <p style="font-size: 1.125rem; line-height: 1.8; color: #cccccc; margin-bottom: 2rem;">
                        GAMBLA nasce dalla passione di un gruppo di amici per lo sport e l'innovazione. 
                        Quello che è iniziato come un semplice blog di analisi sportive è diventato 
                        la community di riferimento per migliaia di appassionati in tutta Italia.
                    </p>
                    <p style="font-size: 1.125rem; line-height: 1.8; color: #cccccc; margin-bottom: 2rem;">
                        Dal 2020 abbiamo rivoluzionato il modo di vivere lo sport online, combinando 
                        analisi approfondite, tecnologia all'avanguardia e una community attiva che 
                        condivide la stessa passione per il gioco.
                    </p>
                    <div class="hero-buttons">
                        <a href="<?php echo esc_url(home_url('/unisciti-ora')); ?>" class="btn-primary">
                            Unisciti a Noi
                        </a>
                    </div>
                </div>
                
                <div class="hero-visual">
                    <div class="hero-card">
                        <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">🏆 I Nostri Numeri</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; text-align: center;">
                            <div>
                                <div style="font-size: 2rem; font-weight: bold; color: var(--gambla-secondary);">10K+</div>
                                <div style="color: #cccccc;">Utenti Attivi</div>
                            </div>
                            <div>
                                <div style="font-size: 2rem; font-weight: bold; color: var(--gambla-secondary);">500+</div>
                                <div style="color: #cccccc;">Articoli</div>
                            </div>
                            <div>
                                <div style="font-size: 2rem; font-weight: bold; color: var(--gambla-secondary);">24/7</div>
                                <div style="color: #cccccc;">Supporto</div>
                            </div>
                            <div>
                                <div style="font-size: 2rem; font-weight: bold; color: var(--gambla-secondary);">5⭐</div>
                                <div style="color: #cccccc;">Rating</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Team Section -->
        <section class="section-padding" style="background: var(--gambla-gray);">
            <div class="container">
                <div class="text-center" style="margin-bottom: 4rem;">
                    <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                        Il Nostro <span class="gradient-text">Team</span>
                    </h2>
                    <p style="font-size: 1.25rem; color: #cccccc;">
                        Esperti di sport e tecnologia che lavorano per te ogni giorno
                    </p>
                </div>
                
                <div class="posts-grid">
                    <?php
                    $team_members = get_posts(array(
                        'post_type' => 'team_member',
                        'numberposts' => 6,
                        'post_status' => 'publish'
                    ));
                    
                    if ($team_members) :
                        foreach($team_members as $member) : setup_postdata($member);
                            $position = get_post_meta($member->ID, '_team_member_position', true);
                            $linkedin = get_post_meta($member->ID, '_team_member_linkedin', true);
                            $twitter = get_post_meta($member->ID, '_team_member_twitter', true);
                    ?>
                        <div class="post-card" style="text-align: center;">
                            <?php if (has_post_thumbnail($member->ID)) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url($member->ID, 'gambla-card'); ?>" 
                                     alt="<?php echo get_the_title($member); ?>" class="post-image" style="border-radius: 50%; width: 150px; height: 150px; margin: 2rem auto 1rem;">
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <h3 style="color: var(--gambla-primary); margin-bottom: 0.5rem;"><?php echo get_the_title($member); ?></h3>
                                <p style="color: var(--gambla-secondary); font-weight: 600; margin-bottom: 1rem;"><?php echo esc_html($position); ?></p>
                                <div style="color: #cccccc; margin-bottom: 1.5rem;"><?php echo get_the_content($member); ?></div>
                                
                                <div style="display: flex; justify-content: center; gap: 1rem;">
                                    <?php if ($linkedin) : ?>
                                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" style="color: var(--gambla-primary);">LinkedIn</a>
                                    <?php endif; ?>
                                    <?php if ($twitter) : ?>
                                        <a href="<?php echo esc_url($twitter); ?>" target="_blank" style="color: var(--gambla-primary);">Twitter</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php 
                        endforeach; 
                        wp_reset_postdata();
                    else :
                    ?>
                        <!-- Default team members if none are created -->
                        <div class="post-card" style="text-align: center;">
                            <div style="font-size: 4rem; margin: 2rem 0 1rem;">👨‍💼</div>
                            <div class="post-content">
                                <h3 style="color: var(--gambla-primary); margin-bottom: 0.5rem;">Marco Rossi</h3>
                                <p style="color: var(--gambla-secondary); font-weight: 600; margin-bottom: 1rem;">Founder & CEO</p>
                                <div style="color: #cccccc;">Esperto di sport e tecnologia con oltre 10 anni di esperienza nel settore.</div>
                            </div>
                        </div>
                        
                        <div class="post-card" style="text-align: center;">
                            <div style="font-size: 4rem; margin: 2rem 0 1rem;">👩‍💻</div>
                            <div class="post-content">
                                <h3 style="color: var(--gambla-primary); margin-bottom: 0.5rem;">Laura Bianchi</h3>
                                <p style="color: var(--gambla-secondary); font-weight: 600; margin-bottom: 1rem;">CTO</p>
                                <div style="color: #cccccc;">Sviluppatrice senior specializzata in piattaforme sportive innovative.</div>
                            </div>
                        </div>
                        
                        <div class="post-card" style="text-align: center;">
                            <div style="font-size: 4rem; margin: 2rem 0 1rem;">📊</div>
                            <div class="post-content">
                                <h3 style="color: var(--gambla-primary); margin-bottom: 0.5rem;">Giuseppe Verdi</h3>
                                <p style="color: var(--gambla-secondary); font-weight: 600; margin-bottom: 1rem;">Lead Analyst</p>
                                <div style="color: #cccccc;">Analista sportivo con un track record di previsioni accurate del 85%.</div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        
        <!-- Values Section -->
        <section class="section-padding">
            <div class="container">
                <div class="text-center" style="margin-bottom: 4rem;">
                    <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                        I Nostri <span class="gradient-text">Valori</span>
                    </h2>
                </div>
                
                <div class="sport-icons-grid">
                    <div class="sport-icon-item">
                        <div class="sport-icon">🎯</div>
                        <h3>Precisione</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">Analisi accurate basate su dati reali e statistiche approfondite</p>
                    </div>
                    <div class="sport-icon-item">
                        <div class="sport-icon">🤝</div>
                        <h3>Community</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">Crediamo nella forza della condivisione e dell'aiuto reciproco</p>
                    </div>
                    <div class="sport-icon-item">
                        <div class="sport-icon">🚀</div>
                        <h3>Innovazione</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">Utilizziamo sempre le tecnologie più avanzate per migliorare l'esperienza</p>
                    </div>
                    <div class="sport-icon-item">
                        <div class="sport-icon">❤️</div>
                        <h3>Passione</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">Lo sport è la nostra vita e trasmettiamo questa energia ogni giorno</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
