
jQuery(document).ready(function($) {
    // Newsletter signup
    $('#newsletter-form').on('submit', function(e) {
        e.preventDefault();
        
        var email = $(this).find('input[name="email"]').val();
        var name = $(this).find('input[name="name"]').val() || '';
        
        $.ajax({
            url: gambla_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'gambla_newsletter_signup',
                email: email,
                name: name,
                nonce: gambla_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    alert('Iscrizione completata con successo!');
                    $('#newsletter-form')[0].reset();
                } else {
                    alert('Errore: ' + response.data);
                }
            },
            error: function() {
                alert('Errore durante l\'invio. Riprova.');
            }
        });
    });
    
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 80
            }, 1000);
        }
    });
    
    // Fade in animations
    function checkFadeIn() {
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
    
    $(window).on('scroll resize', checkFadeIn);
    checkFadeIn(); // Run on page load
    
    // Mobile menu toggle (if you add one later)
    $('.mobile-menu-toggle').on('click', function() {
        $('.main-nav').toggleClass('mobile-open');
    });
    
    // Parallax effects for floating elements
    if (window.innerWidth > 768) {
        $(window).on('scroll', function() {
            var scrolled = $(window).scrollTop();
            var rate = scrolled * -0.5;
            
            $('.float-animation').css('transform', 'translateY(' + rate + 'px)');
        });
    }
    
    // Hero card hover effect
    $('.hero-card').on('mouseenter', function() {
        $(this).css('transform', 'rotate(0deg) scale(1.05)');
    }).on('mouseleave', function() {
        $(this).css('transform', 'rotate(3deg) scale(1)');
    });
    
    // Post card hover effects
    $('.post-card').on('mouseenter', function() {
        $(this).find('.post-image').css('transform', 'scale(1.1)');
    }).on('mouseleave', function() {
        $(this).find('.post-image').css('transform', 'scale(1)');
    });
    
    // Sport icon animations
    $('.sport-icon-item').on('mouseenter', function() {
        $(this).find('.sport-icon').addClass('animate-bounce');
    }).on('mouseleave', function() {
        $(this).find('.sport-icon').removeClass('animate-bounce');
    });
    
    // Initialize any other JavaScript functionality
    initCustomSliders();
    initLazyLoading();
});

// Custom slider initialization
function initCustomSliders() {
    // Add custom slider logic if needed
}

// Lazy loading for images
function initLazyLoading() {
    if ('IntersectionObserver' in window) {
        var imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var image = entry.target;
                    image.src = image.dataset.src;
                    image.classList.remove('lazy');
                    imageObserver.unobserve(image);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(function(img) {
            imageObserver.observe(img);
        });
    }
}

// Add CSS classes for animations
var style = document.createElement('style');
style.textContent = `
    .animated {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
    
    .animate-bounce {
        animation: bounce 0.6s ease-in-out;
    }
    
    @keyframes bounce {
        0%, 20%, 53%, 80%, 100% {
            transform: translate3d(0,0,0);
        }
        40%, 43% {
            transform: translate3d(0,-10px,0);
        }
        70% {
            transform: translate3d(0,-5px,0);
        }
        90% {
            transform: translate3d(0,-2px,0);
        }
    }
    
    .mobile-open {
        display: block !important;
    }
    
    @media (max-width: 768px) {
        .main-nav {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: var(--gambla-dark);
            border-top: 1px solid var(--gambla-gray);
        }
        
        .main-nav ul {
            flex-direction: column;
            padding: 1rem 0;
        }
        
        .mobile-menu-toggle {
            display: block;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
    }
`;
document.head.appendChild(style);
