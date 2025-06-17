
// GAMBLA Theme JavaScript
document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile Menu Toggle
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    
    if (mobileToggle && mainNav) {
        mobileToggle.addEventListener('click', function() {
            if (mainNav.style.display === 'block') {
                mainNav.style.display = 'none';
            } else {
                mainNav.style.display = 'block';
                mainNav.style.position = 'absolute';
                mainNav.style.top = '100%';
                mainNav.style.left = '0';
                mainNav.style.right = '0';
                mainNav.style.background = 'var(--gambla-dark)';
                mainNav.style.padding = '1rem';
                mainNav.style.zIndex = '1000';
            }
        });
        
        // Close mobile menu on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                mainNav.style.display = '';
                mainNav.style.position = '';
                mainNav.style.top = '';
                mainNav.style.left = '';
                mainNav.style.right = '';
                mainNav.style.background = '';
                mainNav.style.padding = '';
            }
        });
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Newsletter form submission
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[name="email"]').value;
            
            // Simple validation
            if (email && email.includes('@')) {
                alert('Grazie per la tua iscrizione! Ti invieremo presto le nostre migliori notizie sportive.');
                this.reset();
            } else {
                alert('Per favore inserisci un indirizzo email valido.');
            }
        });
    }
    
    // FAQ Toggle functionality
    window.toggleFaq = function(element) {
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
    };
    
    // Interactive elements hover effects
    document.querySelectorAll('.interactive-element').forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
    
    // Fade in animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.post-card, .sport-icon-item, .demo-card').forEach(el => {
        observer.observe(el);
    });
});
