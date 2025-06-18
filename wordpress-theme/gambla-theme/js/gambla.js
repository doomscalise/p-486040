
// GAMBLA Theme JavaScript

jQuery(document).ready(function($) {
    
    // Mobile Menu Toggle
    $('.mobile-menu-toggle').click(function() {
        $('.main-nav ul').slideToggle();
    });
    
    // FAQ Toggle
    $('.faq-question').click(function() {
        $(this).closest('.faq-item').toggleClass('active');
        $(this).closest('.faq-item').find('.faq-answer').slideToggle();
    });
    
    // Smooth Scroll per i link interni
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 80
            }, 1000);
        }
    });
    
    // Animate on Scroll
    function animateOnScroll() {
        $('.fade-in').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animated');
            }
        });
    }
    
    // Trigger animation on scroll
    $(window).on('scroll resize', animateOnScroll);
    animateOnScroll(); // Trigger on load
    
    // Interactive Elements Hover
    $('.interactive-element').hover(
        function() {
            $(this).addClass('hovered');
        },
        function() {
            $(this).removeClass('hovered');
        }
    );
    
    // Copy to Clipboard (per codici promozionali o link)
    $('.copy-button').click(function() {
        var textToCopy = $(this).data('copy');
        navigator.clipboard.writeText(textToCopy).then(function() {
            // Feedback visivo
            $('.copy-button').text('Copiato!').addClass('copied');
            setTimeout(function() {
                $('.copy-button').text('Copia').removeClass('copied');
            }, 2000);
        });
    });
    
    // Lazy Loading per le immagini
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        const lazyImages = document.querySelectorAll('img[data-src]');
        lazyImages.forEach(img => imageObserver.observe(img));
    }
    
    // Form Enhancement
    $('.gambla-form input, .gambla-form textarea').on('focus', function() {
        $(this).closest('.form-group').addClass('focused');
    }).on('blur', function() {
        if (!$(this).val()) {
            $(this).closest('.form-group').removeClass('focused');
        }
    });
    
    // Stats Counter Animation
    function animateStats() {
        $('.stat-number').each(function() {
            var $this = $(this);
            var countTo = $this.attr('data-count') || $this.text().replace(/[^\d]/g, '');
            
            if (countTo && !$this.hasClass('counted')) {
                $this.addClass('counted');
                $({ countNum: 0 }).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(countTo);
                    }
                });
            }
        });
    }
    
    // Trigger stats animation when in view
    $(window).scroll(function() {
        $('.stats-grid').each(function() {
            var elementTop = $(this).offset().top;
            var viewportBottom = $(window).scrollTop() + $(window).height();
            
            if (elementTop < viewportBottom - 100) {
                animateStats();
            }
        });
    });
    
});

// Vanilla JS per performance critiche
document.addEventListener('DOMContentLoaded', function() {
    
    // Header scroll effect
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.site-header');
        if (window.scrollY > 100) {
            header.style.backgroundColor = 'rgba(10, 10, 10, 0.95)';
            header.style.backdropFilter = 'blur(10px)';
        } else {
            header.style.backgroundColor = 'var(--gambla-dark)';
            header.style.backdropFilter = 'none';
        }
    });
    
    // Parallax effect per elementi specifici
    const parallaxElements = document.querySelectorAll('.parallax');
    
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;
        
        parallaxElements.forEach(function(element) {
            element.style.transform = `translateY(${rate}px)`;
        });
    });
    
});
