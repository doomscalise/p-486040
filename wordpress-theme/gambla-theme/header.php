
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <a href="https://gambla.it" class="site-logo font-display">
                GAMBLA
            </a>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="https://gambla.it">Home</a></li>
                    <li><a href="<?php echo home_url(); ?>">Blog</a></li>
                    <li><a href="https://gambla.it/fantagambla">FantaGambla</a></li>
                    <li><a href="https://gambla.it/chi-siamo">Chi Siamo</a></li>
                    <li><a href="https://gambla.it/contatti">Contatti</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<?php if (is_home() || is_front_page()) : ?>
<section class="blog-hero">
    <div class="container">
        <h1 class="font-display">Il Blog di GAMBLA</h1>
        <p>Analisi, pronostici e tutto quello che devi sapere sul mondo dello sport</p>
    </div>
</section>
<?php endif; ?>
