
<?php
/*
Template Name: Chi Siamo
*/
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1>Chi <span class="gradient-text">Siamo</span></h1>
        <p style="font-size: 1.25rem; color: #cccccc; margin-top: 1rem;">
            La storia dietro GAMBLA e la nostra passione per lo sport
        </p>
    </div>
</div>

<main class="content-section">
    <div class="container">
        <!-- Our Story -->
        <section class="section-padding">
            <div class="two-column" style="align-items: center;">
                <div>
                    <h2 class="font-display" style="font-size: 2.5rem; margin-bottom: 1.5rem;">
                        La Nostra <span class="gradient-text">Storia</span>
                    </h2>
                    <p style="font-size: 1.125rem; color: #cccccc; line-height: 1.8; margin-bottom: 1.5rem;">
                        GAMBLA nasce dalla passione di un gruppo di amici accomunati dall'amore per lo sport e l'innovazione tecnologica. 
                        Nel 2020, stanchi di trovare sempre le stesse notizie sui portali tradizionali, abbiamo deciso di creare qualcosa di diverso.
                    </p>
                    <p style="font-size: 1.125rem; color: #cccccc; line-height: 1.8; margin-bottom: 1.5rem;">
                        Non volevamo solo riportare le notizie, ma creare una community dove gli appassionati potessero discutere, 
                        confrontarsi e vivere lo sport in modo più coinvolgente. Così è nato GAMBLA: un portale che unisce informazione 
                        di qualità, community attiva e innovazione tecnologica.
                    </p>
                </div>
                <div>
                    <div class="hero-card" style="transform: rotate(-3deg);">
                        <h3 style="color: var(--gambla-primary); margin-bottom: 1rem;">🚀 La Nostra Missione</h3>
                        <p style="color: #cccccc; margin-bottom: 1rem;">
                            Rendere lo sport più accessibile, coinvolgente e divertente per tutti gli appassionati italiani.
                        </p>
                        <div style="background: #000; padding: 1rem; border-radius: 10px;">
                            <strong style="color: var(--gambla-secondary);">I Nostri Valori:</strong>
                            <ul style="color: #cccccc; margin-top: 0.5rem; padding-left: 1rem;">
                                <li>Passione autentica</li>
                                <li>Innovazione continua</li>
                                <li>Community first</li>
                                <li>Qualità dei contenuti</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Team -->
        <section class="section-padding" style="background: var(--gambla-gray);">
            <div class="container">
                <div class="text-center" style="margin-bottom: 4rem;">
                    <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                        Il Nostro <span class="gradient-text">Team</span>
                    </h2>
                    <p style="font-size: 1.25rem; color: #cccccc;">
                        Le persone che rendono possibile GAMBLA ogni giorno
                    </p>
                </div>
                
                <div class="posts-grid">
                    <?php
                    $team_members = get_posts(array(
                        'post_type' => 'team_member',
                        'numberposts' => -1,
                        'post_status' => 'publish'
                    ));
                    
                    if (!empty($team_members)) :
                        foreach($team_members as $member) : setup_postdata($member);
                            $position = get_post_meta($member->ID, '_team_member_position', true);
                            $linkedin = get_post_meta($member->ID, '_team_member_linkedin', true);
                            $twitter = get_post_meta($member->ID, '_team_member_twitter', true);
                    ?>
                        <div class="post-card" style="text-align: center;">
                            <?php if (has_post_thumbnail($member->ID)) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url($member->ID, 'gambla-card'); ?>" 
                                     alt="<?php echo get_the_title($member->ID); ?>" 
                                     style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin: 0 auto 1rem;">
                            <?php endif; ?>
                            
                            <h3 style="color: white; margin-bottom: 0.5rem;"><?php echo get_the_title($member->ID); ?></h3>
                            <?php if ($position) : ?>
                                <p style="color: var(--gambla-primary); font-weight: 600; margin-bottom: 1rem;"><?php echo esc_html($position); ?></p>
                            <?php endif; ?>
                            
                            <div style="color: #cccccc; margin-bottom: 1rem;">
                                <?php echo get_the_content(null, false, $member->ID); ?>
                            </div>
                            
                            <?php if ($linkedin || $twitter) : ?>
                                <div style="display: flex; gap: 1rem; justify-content: center;">
                                    <?php if ($linkedin) : ?>
                                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" style="color: var(--gambla-primary);">LinkedIn</a>
                                    <?php endif; ?>
                                    <?php if ($twitter) : ?>
                                        <a href="<?php echo esc_url($twitter); ?>" target="_blank" style="color: var(--gambla-secondary);">Twitter</a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php 
                        endforeach; 
                        wp_reset_postdata();
                    else : 
                    ?>
                        <!-- Default team members if none are created -->
                        <div class="post-card" style="text-align: center;">
                            <div style="width: 120px; height: 120px; border-radius: 50%; background: var(--gambla-primary); margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; font-size: 3rem;">👨‍💻</div>
                            <h3 style="color: white; margin-bottom: 0.5rem;">Marco Rossi</h3>
                            <p style="color: var(--gambla-primary); font-weight: 600; margin-bottom: 1rem;">Founder & CEO</p>
                            <p style="color: #cccccc;">Appassionato di calcio e tecnologia, ha fondato GAMBLA con l'obiettivo di rivoluzionare il modo di vivere lo sport online.</p>
                        </div>
                        
                        <div class="post-card" style="text-align: center;">
                            <div style="width: 120px; height: 120px; border-radius: 50%; background: var(--gambla-secondary); margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; font-size: 3rem;">✍️</div>
                            <h3 style="color: white; margin-bottom: 0.5rem;">Laura Bianchi</h3>
                            <p style="color: var(--gambla-primary); font-weight: 600; margin-bottom: 1rem;">Content Manager</p>
                            <p style="color: #cccccc;">Giornalista sportiva con 10 anni di esperienza, coordina il team di redazione per offrire contenuti sempre aggiornati e di qualità.</p>
                        </div>
                        
                        <div class="post-card" style="text-align: center;">
                            <div style="width: 120px; height: 120px; border-radius: 50%; background: var(--gambla-yellow); margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: black;">⚽</div>
                            <h3 style="color: white; margin-bottom: 0.5rem;">Andrea Verdi</h3>
                            <p style="color: var(--gambla-primary); font-weight: 600; margin-bottom: 1rem;">Head of FantaGAMBLA</p>
                            <p style="color: #cccccc;">Ex calciatore professionista, ora sviluppa le strategie e gli algoritmi che rendono FantaGAMBLA unico nel suo genere.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        
        <!-- Our Values -->
        <section class="section-padding">
            <div class="container">
                <div class="text-center" style="margin-bottom: 4rem;">
                    <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem;">
                        I Nostri <span class="gradient-text">Valori</span>
                    </h2>
                </div>
                
                <div class="sport-icons-grid">
                    <div class="sport-icon-item">
                        <div class="sport-icon">❤️</div>
                        <h3>Passione</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">Lo sport è la nostra passione e si riflette in tutto quello che facciamo</p>
                    </div>
                    <div class="sport-icon-item">
                        <div class="sport-icon">🚀</div>
                        <h3>Innovazione</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">Cerchiamo sempre nuovi modi per migliorare l'esperienza degli utenti</p>
                    </div>
                    <div class="sport-icon-item">
                        <div class="sport-icon">👥</div>
                        <h3>Community</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">La nostra community è al centro di tutto: ascoltiamo e cresciamo insieme</p>
                    </div>
                    <div class="sport-icon-item">
                        <div class="sport-icon">🎯</div>
                        <h3>Qualità</h3>
                        <p style="color: #cccccc; margin-top: 0.5rem;">Non accettiamo compromessi sulla qualità dei nostri contenuti</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA -->
        <section class="newsletter-section">
            <div class="container">
                <h2 class="font-display" style="font-size: 3rem; margin-bottom: 1rem; color: white;">
                    Vuoi Far Parte del Team GAMBLA?
                </h2>
                <p style="font-size: 1.25rem; margin-bottom: 2rem; color: white;">
                    Siamo sempre alla ricerca di talenti appassionati di sport e tecnologia
                </p>
                
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/contatti')); ?>" class="btn-primary" style="background: white; color: var(--gambla-primary);">
                        Candidati Ora
                    </a>
                    <a href="<?php echo esc_url(home_url('/contatti')); ?>" class="btn-secondary" style="border: 2px solid white; background: transparent;">
                        Contattaci
                    </a>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
