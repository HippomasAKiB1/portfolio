// ====== ENHANCED CURSOR EFFECT WITH TRAILS ======
const cursor = document.createElement('div');
cursor.className = 'cursor';
document.body.appendChild(cursor);

let mouseX = 0, mouseY = 0;
let cursorX = 0, cursorY = 0;

document.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
    cursor.style.left = mouseX + 'px';
    cursor.style.top = mouseY + 'px';
    
    // Create cursor trail
    createCursorTrail(mouseX, mouseY);
    
    // Activate cursor on interactive elements
    const target = e.target;
    if (target.closest('a, button, input, .carousel-btn, .project-card, .skill-card, .timeline-item, .social-icon')) {
        cursor.classList.add('active');
    } else {
        cursor.classList.remove('active');
    }
});

function createCursorTrail(x, y) {
    if (Math.random() > 0.8) {
        const trail = document.createElement('div');
        trail.className = 'cursor-trail';
        trail.style.left = x + 'px';
        trail.style.top = y + 'px';
        document.body.appendChild(trail);
        
        setTimeout(() => {
            trail.style.opacity = '0';
            trail.style.transform = `scale(0)`;
            trail.style.transition = 'all 0.6s ease-out';
        }, 10);
        
        setTimeout(() => {
            trail.remove();
        }, 600);
    }
}

// ====== PARTICLES GENERATION FOR LOADING SCREEN ======
function generateLoadingParticles() {
    const particlesContainer = document.querySelector('.particles');
    if (!particlesContainer) return;
    
    for (let i = 0; i < 60; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.width = (Math.random() * 4 + 2) + 'px';
        particle.style.height = particle.style.width;
        particle.style.background = `hsl(${Math.random() * 60 + 180}, 100%, 50%)`;
        particle.style.animationDelay = Math.random() * 2 + 's';
        particle.style.animationDuration = (Math.random() * 6 + 6) + 's';
        particlesContainer.appendChild(particle);
    }
}

// ====== SIMPLE LOADING SCREEN HIDE ======
// Hide loading screen after 2.5 seconds
setTimeout(function() {
    var loadingScreen = document.getElementById('loading-screen');
    var introPage = document.getElementById('intro-page');
    
    if (loadingScreen) {
        loadingScreen.style.display = 'none';
        loadingScreen.style.visibility = 'hidden';
        loadingScreen.style.opacity = '0';
    }
    
    if (introPage) {
        introPage.style.display = 'flex';
        introPage.style.visibility = 'visible';
        introPage.style.opacity = '1';
    }
}, 2500);

// ====== INTRO PAGE ADVANCED CANVAS ANIMATION ======
function initCanvasAnimation() {
    try {
        const canvas = document.querySelector('.intro-canvas');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        let particles = [];
        
        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        class CanvasParticle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 4 + 1;
                this.speedX = (Math.random() - 0.5) * 3;
                this.speedY = (Math.random() - 0.5) * 3;
                this.opacity = Math.random() * 0.6 + 0.2;
                this.targetX = this.x;
                this.targetY = this.y;
            }

            update(mouseX, mouseY) {
                this.x += this.speedX;
                this.y += this.speedY;

                if (this.x < 0) this.x = canvas.width;
                if (this.x > canvas.width) this.x = 0;
                if (this.y < 0) this.y = canvas.height;
                if (this.y > canvas.height) this.y = 0;

                const dx = this.x - mouseX;
                const dy = this.y - mouseY;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < 200) {
                    const angle = Math.atan2(dy, dx);
                    this.speedX = Math.cos(angle) * 5;
                    this.speedY = Math.sin(angle) * 5;
                } else {
                    this.speedX *= 0.98;
                    this.speedY *= 0.98;
                }
            }

            draw() {
                ctx.fillStyle = `rgba(0, 212, 255, ${this.opacity})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
                
                particles.forEach((p) => {
                    const dist = Math.hypot(p.x - this.x, p.y - this.y);
                    if (dist < 100) {
                        ctx.strokeStyle = `rgba(0, 212, 255, ${0.2 * (1 - dist / 100)})`;
                        ctx.lineWidth = 1;
                        ctx.beginPath();
                        ctx.moveTo(this.x, this.y);
                        ctx.lineTo(p.x, p.y);
                        ctx.stroke();
                    }
                });
            }
        }

        function initIntroParticles() {
            for (let i = 0; i < 150; i++) {
                particles.push(new CanvasParticle());
            }
        }

        let introMouseX = 0, introMouseY = 0;
        canvas.addEventListener('mousemove', (e) => {
            introMouseX = e.clientX;
            introMouseY = e.clientY;
        });

        function animateIntroCanvas() {
            ctx.fillStyle = 'rgba(10, 14, 39, 0.1)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            particles.forEach(particle => {
                particle.update(introMouseX, introMouseY);
                particle.draw();
            });

            requestAnimationFrame(animateIntroCanvas);
        }

        initIntroParticles();
        animateIntroCanvas();
    } catch(e) {
        console.error('Canvas error:', e);
    }
}

// Start canvas animation when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCanvasAnimation);
} else {
    initCanvasAnimation();
}

// ====== INTRO PAGE ANIMATION ======
function startExplore() {
    console.log('Starting explore...');
    const introPage = document.getElementById('intro-page');
    const main = document.querySelector('main');
    
    if (introPage) {
        introPage.classList.add('fade-out');
        introPage.classList.remove('show-intro');
    }
    
    if (main) {
        main.classList.add('show');
    }
    
    setTimeout(() => {
        if (introPage) {
            introPage.style.display = 'none';
        }
    }, 800);
}

// ====== SMOOTH SCROLL NAVIGATION ======
function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// ====== SCROLL PROGRESS BAR ======
window.addEventListener('scroll', () => {
    // Update progress bar
    const winScroll = document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    
    const progressBar = document.querySelector('.scroll-progress');
    if (progressBar) {
        progressBar.style.width = scrolled + '%';
    }

    // Show/hide scroll to top button
    const scrollToTopBtn = document.querySelector('.scroll-to-top');
    if (scrollToTopBtn) {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.add('show');
        } else {
            scrollToTopBtn.classList.remove('show');
        }
    }
    
    // Parallax effect on hero
    const hero = document.querySelector('.hero');
    if (hero && winScroll < window.innerHeight) {
        hero.style.transform = `translateY(${winScroll * 0.5}px)`;
    }
});

// ====== SCROLL TO TOP BUTTON ======
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// ====== THEME TOGGLE ======
function toggleTheme() {
    const body = document.body;
    const themeToggle = document.querySelector('.theme-toggle i');

    body.classList.toggle('dark-mode');
    body.classList.toggle('light-mode');

    if (body.classList.contains('light-mode')) {
        themeToggle.classList.remove('fa-moon');
        themeToggle.classList.add('fa-sun');
        localStorage.setItem('theme', 'light');
    } else {
        themeToggle.classList.remove('fa-sun');
        themeToggle.classList.add('fa-moon');
        localStorage.setItem('theme', 'dark');
    }
}

// Load saved theme
const savedTheme = localStorage.getItem('theme') || 'dark';
document.body.classList.add(savedTheme === 'light' ? 'light-mode' : 'dark-mode');
const themeIcon = document.querySelector('.theme-toggle i');
if (themeIcon) {
    if (savedTheme === 'light') {
        themeIcon.classList.remove('fa-moon');
        themeIcon.classList.add('fa-sun');
    } else {
        themeIcon.classList.remove('fa-sun');
        themeIcon.classList.add('fa-moon');
    }
}

// ====== INTERACTIVE LOGO ======
const logo = document.querySelector('.logo');
if (logo) {
    logo.addEventListener('click', () => {
        scrollToTop();
    });
}

// ====== NAVIGATION SCROLL HANDLING ======
document.querySelectorAll('nav a').forEach(link => {
    link.addEventListener('click', (e) => {
        const href = link.getAttribute('href');
        if (href && href.startsWith('#')) {
            e.preventDefault();
            scrollToSection(href.substring(1));
        }
    });
});

// ====== TESTIMONIALS CAROUSEL ======
let currentTestimonial = 0;
const testimonials = [
    { text: "This portfolio showcases exceptional design and attention to detail. Highly impressed!", author: "- Sarah Johnson, Design Director" },
    { text: "A truly immersive digital experience. The interactions feel natural and polished.", author: "- Michael Chen, Creative Lead" },
    { text: "Outstanding work! The futuristic design elements are perfectly executed.", author: "- Emma Rodriguez, UX Manager" },
    { text: "This is what modern web design should look like. Absolutely brilliant!", author: "- David Park, Tech Innovator" }
];

function updateTestimonial() {
    const testimonialCard = document.querySelector('.testimonial-card');
    if (!testimonialCard) return;
    
    testimonialCard.style.animation = 'none';
    setTimeout(() => {
        const textEl = document.querySelector('.testimonial-text');
        const authorEl = document.querySelector('.testimonial-author');
        
        if (textEl && authorEl) {
            textEl.textContent = testimonials[currentTestimonial].text;
            authorEl.textContent = testimonials[currentTestimonial].author;
            testimonialCard.style.animation = 'testimonial-show 0.8s ease forwards';
        }
    }, 10);
}

function nextTestimonial() {
    currentTestimonial = (currentTestimonial + 1) % testimonials.length;
    updateTestimonial();
}

function prevTestimonial() {
    currentTestimonial = (currentTestimonial - 1 + testimonials.length) % testimonials.length;
    updateTestimonial();
}

// Initialize testimonials
const carouselBtns = document.querySelectorAll('.carousel-btn');
if (carouselBtns.length > 0) {
    carouselBtns[0].addEventListener('click', prevTestimonial);
    carouselBtns[1].addEventListener('click', nextTestimonial);
    updateTestimonial();
}

// ====== ADVANCED INTERSECTION OBSERVER FOR SCROLL ANIMATIONS ======
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            
            // Animate skill progress bars
            if (entry.target.classList.contains('skill-card')) {
                const progressFill = entry.target.querySelector('.skill-progress-fill');
                if (progressFill) {
                    const skillWidth = entry.target.getAttribute('data-skill-width') || '70%';
                    progressFill.style.setProperty('--skill-width', skillWidth);
                }
            }
            
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.querySelectorAll('.timeline-item, .skill-card, .project-card, .about p').forEach(el => {
    observer.observe(el);
});

// ====== SKILLS PROGRESS ANIMATION ======
document.querySelectorAll('.skill-card').forEach(card => {
    const proficiency = card.getAttribute('data-proficiency') || '75';
    card.setAttribute('data-skill-width', proficiency + '%');
});

// ====== HERO PARALLAX & MOUSE INTERACTION ======
const heroContent = document.querySelector('.hero-content');
if (heroContent) {
    document.addEventListener('mousemove', (e) => {
        const centerX = window.innerWidth / 2;
        const centerY = window.innerHeight / 2;

        const rotateX = (e.clientY - centerY) * 0.02;
        const rotateY = (e.clientX - centerX) * 0.02;

        heroContent.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1)`;
    });
    
    document.addEventListener('mouseleave', () => {
        heroContent.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)`;
    });
}

// ====== PROJECT CARD INTERACTIONS ======
document.querySelectorAll('.project-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transformOrigin = 'center';
    });
    
    card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        const rotateX = (y - centerY) * 0.1;
        const rotateY = (x - centerX) * 0.1;
        
        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
    });
    
    card.addEventListener('mouseleave', () => {
        card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
    });
});

// ====== CONTACT ITEM INTERACTIONS ======
document.querySelectorAll('.contact-item').forEach(item => {
    item.addEventListener('mouseenter', function() {
        this.style.boxShadow = '0 30px 80px rgba(0, 212, 255, 0.3)';
    });
    
    item.addEventListener('mouseleave', function() {
        this.style.boxShadow = '';
    });
});

// ====== TAG INTERACTIONS ======
document.querySelectorAll('.tag').forEach(tag => {
    tag.addEventListener('click', function(e) {
        e.preventDefault();
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
            this.style.transform = '';
        }, 200);
    });
});

// ====== ABOUT IMAGE TILT EFFECT ======
const aboutImage = document.querySelector('.about-image');
if (aboutImage) {
    aboutImage.addEventListener('mousemove', (e) => {
        const rect = aboutImage.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        const rotateX = (y - centerY) * 0.05;
        const rotateY = (x - centerX) * 0.05;
        
        aboutImage.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
    });
    
    aboutImage.addEventListener('mouseleave', () => {
        aboutImage.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
    });
}

// ====== BUTTON RIPPLE EFFECT ======
document.querySelectorAll('.btn, .carousel-btn, .social-icon').forEach(button => {
    button.addEventListener('click', function(e) {
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const ripple = document.createElement('span');
        ripple.style.position = 'absolute';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.style.width = '0';
        ripple.style.height = '0';
        ripple.style.borderRadius = '50%';
        ripple.style.background = 'rgba(255, 255, 255, 0.6)';
        ripple.style.pointerEvents = 'none';
        ripple.style.transform = 'translate(-50%, -50%)';
        
        this.style.position = 'relative';
        this.style.overflow = 'hidden';
        this.appendChild(ripple);
        
        setTimeout(() => {
            ripple.style.transition = 'all 0.6s ease-out';
            ripple.style.width = (Math.max(rect.width, rect.height) * 2) + 'px';
            ripple.style.height = ripple.style.width;
            ripple.style.opacity = '0';
        }, 10);
        
        setTimeout(() => {
            ripple.remove();
        }, 600);
    });
});

// ====== SMOOTH PAGE LOAD ======
document.addEventListener('DOMContentLoaded', () => {
    // Ensure loading particles are generated
    generateLoadingParticles();
    
    // Delay slight reveal for better effect
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});
