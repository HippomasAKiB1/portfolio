/**
 * script.js — AKIB Portfolio
 * Procedural JavaScript only. No classes, no frameworks.
 * Sections:
 *   1. Custom cursor
 *   2. Loading screen → intro page flow
 *   3. Canvas particle animation (intro page)
 *   4. Intro → main site transition
 *   5. Navigation helpers (smooth scroll, active state)
 *   6. Hamburger mobile menu
 *   7. Theme toggle (dark / light)
 *   8. Scroll progress bar + scroll-to-top button
 *   9. Typed text effect (hero tagline)
 *  10. Scroll-reveal with IntersectionObserver
 *  11. Skill progress bars (triggered on scroll-reveal)
 *  12. Project card 3D tilt
 *  13. Testimonials carousel
 *  14. AJAX contact form
 */

'use strict';

/* ── 1. CUSTOM CURSOR ─────────────────────────────────────────────────────── */
var cursor    = null;
var cursorDot = null;

function initCursor() {
    cursor    = document.createElement('div');
    cursorDot = document.createElement('div');
    cursor.className    = 'cursor';
    cursorDot.className = 'cursor-dot';
    document.body.appendChild(cursor);
    document.body.appendChild(cursorDot);

    document.addEventListener('mousemove', function (e) {
        cursor.style.left    = e.clientX + 'px';
        cursor.style.top     = e.clientY + 'px';
        cursorDot.style.left = e.clientX + 'px';
        cursorDot.style.top  = e.clientY + 'px';

        // Enlarge cursor over interactive elements
        var target = e.target;
        if (target.closest('a, button, input, textarea, .skill-card, .project-card, .carousel-btn, .social-icon')) {
            cursor.classList.add('cursor--active');
        } else {
            cursor.classList.remove('cursor--active');
        }
    });

    // Hide cursor when mouse leaves the window
    document.addEventListener('mouseleave', function () {
        cursor.style.opacity = '0';
        cursorDot.style.opacity = '0';
    });

    document.addEventListener('mouseenter', function () {
        cursor.style.opacity = '1';
        cursorDot.style.opacity = '1';
    });
}


/* ── 2. LOADING SCREEN → INTRO PAGE ──────────────────────────────────────── */
function generateLoadingParticles() {
    var container = document.getElementById('loadingParticles');
    if (!container) return;

    for (var i = 0; i < 40; i++) {
        var p = document.createElement('div');
        p.className = 'loading-particle';
        var size = Math.random() * 5 + 2;
        p.style.cssText = [
            'left:'              + (Math.random() * 100) + '%',
            'top:'               + (Math.random() * 100) + '%',
            'width:'             + size + 'px',
            'height:'            + size + 'px',
            'background:'        + 'hsl(' + (Math.random() * 60 + 180) + ',100%,60%)',
            'animation-delay:'   + (Math.random() * 4) + 's',
            'animation-duration:'+ (Math.random() * 3 + 4) + 's',
        ].join(';');
        container.appendChild(p);
    }
}

function animateLoadingLetters() {
    var letters = document.querySelectorAll('.loading-text span');
    letters.forEach(function (span, i) {
        span.style.animationDelay = (i * 0.1 + 0.2) + 's';
    });
}

function hideLoadingShowIntro() {
    var loading   = document.getElementById('loading-screen');
    var introPage = document.getElementById('intro-page');

    if (loading) {
        loading.classList.add('hide');
    }
    if (introPage) {
        introPage.classList.add('visible');
        // Start canvas animation once intro is visible
        initCanvasAnimation();
    }
}

// Show loading screen for 2.6 s then reveal intro
setTimeout(hideLoadingShowIntro, 2600);


/* ── 3. CANVAS PARTICLE ANIMATION (intro page) ───────────────────────────── */
var canvasAnimId = null;

function initCanvasAnimation() {
    var canvas = document.getElementById('introCanvas');
    if (!canvas) return;

    var ctx = canvas.getContext('2d');
    var particles = [];
    var mouseX = window.innerWidth / 2;
    var mouseY = window.innerHeight / 2;

    function resizeCanvas() {
        canvas.width  = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    canvas.addEventListener('mousemove', function (e) {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });

    // Build particle objects as plain objects (no class)
    function makeParticle() {
        return {
            x:      Math.random() * canvas.width,
            y:      Math.random() * canvas.height,
            size:   Math.random() * 3 + 1,
            speedX: (Math.random() - 0.5) * 2,
            speedY: (Math.random() - 0.5) * 2,
            opacity: Math.random() * 0.5 + 0.2,
        };
    }

    function updateParticle(p) {
        p.x += p.speedX;
        p.y += p.speedY;

        if (p.x < 0) p.x = canvas.width;
        if (p.x > canvas.width)  p.x = 0;
        if (p.y < 0) p.y = canvas.height;
        if (p.y > canvas.height) p.y = 0;

        var dx   = p.x - mouseX;
        var dy   = p.y - mouseY;
        var dist = Math.sqrt(dx * dx + dy * dy);

        if (dist < 180) {
            var angle = Math.atan2(dy, dx);
            p.speedX  = Math.cos(angle) * 4;
            p.speedY  = Math.sin(angle) * 4;
        } else {
            p.speedX *= 0.97;
            p.speedY *= 0.97;

            // Drift back toward a slow speed
            if (Math.abs(p.speedX) < 0.3) p.speedX += (Math.random() - 0.5) * 0.2;
            if (Math.abs(p.speedY) < 0.3) p.speedY += (Math.random() - 0.5) * 0.2;
        }
    }

    function drawParticle(p) {
        ctx.fillStyle  = 'rgba(0,212,255,' + p.opacity + ')';
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
        ctx.fill();

        // Draw connection lines to nearby particles
        for (var j = 0; j < particles.length; j++) {
            var other = particles[j];
            var dist  = Math.hypot(other.x - p.x, other.y - p.y);
            if (dist < 90) {
                ctx.strokeStyle = 'rgba(0,212,255,' + (0.18 * (1 - dist / 90)) + ')';
                ctx.lineWidth   = 0.8;
                ctx.beginPath();
                ctx.moveTo(p.x, p.y);
                ctx.lineTo(other.x, other.y);
                ctx.stroke();
            }
        }
    }

    // Initialise 120 particles
    for (var i = 0; i < 120; i++) {
        particles.push(makeParticle());
    }

    function animateCanvas() {
        canvasAnimId = requestAnimationFrame(animateCanvas);
        ctx.fillStyle = 'rgba(10,14,39,0.12)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        for (var k = 0; k < particles.length; k++) {
            updateParticle(particles[k]);
            drawParticle(particles[k]);
        }
    }
    animateCanvas();
}


/* ── 4. INTRO → MAIN SITE TRANSITION ─────────────────────────────────────── */
function startExplore() {
    var introPage   = document.getElementById('intro-page');
    var mainContent = document.getElementById('main-content');

    if (introPage) {
        introPage.classList.remove('visible');
        introPage.classList.add('fade-out');
        introPage.setAttribute('aria-hidden', 'true');
    }

    if (mainContent) {
        mainContent.classList.add('visible');
    }

    // Stop canvas animation after the fade to save resources
    setTimeout(function () {
        if (canvasAnimId) {
            cancelAnimationFrame(canvasAnimId);
        }
        if (introPage) {
            introPage.style.display = 'none';
        }

        // Kick off scroll-driven features
        initScrollProgress();
        initScrollReveal();
        initTypedText();
    }, 900);
}

document.addEventListener('DOMContentLoaded', function () {
    var exploreBtn = document.getElementById('exploreBtn');
    if (exploreBtn) {
        exploreBtn.addEventListener('click', startExplore);
    }

    generateLoadingParticles();
    animateLoadingLetters();
    initCursor();
    initTheme();
    initNavigation();
    initHamburgerMenu();
    initTestimonialsCarousel();
    initProjectTilt();
    initContactForm();
    initScrollToTop();
});


/* ── 5. NAVIGATION (smooth scroll + active highlight) ──────────────────────── */
function scrollToSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section) {
        var headerH = document.getElementById('site-header').offsetHeight;
        var top     = section.getBoundingClientRect().top + window.pageYOffset - headerH;
        window.scrollTo({ top: top, behavior: 'smooth' });
    }
}

function initNavigation() {
    // Handle all [data-scroll] links — desktop nav, mobile nav, hero CTAs
    document.querySelectorAll('[data-scroll]').forEach(function (link) {
        link.addEventListener('click', function (e) {
            var target = link.getAttribute('data-scroll');
            if (target) {
                e.preventDefault();
                closeMobileNav();
                scrollToSection(target);
            }
        });
    });
}


/* ── 6. HAMBURGER MOBILE MENU ──────────────────────────────────────────────── */
function openMobileNav() {
    var nav     = document.getElementById('mobileNav');
    var btn     = document.getElementById('hamburgerBtn');
    if (nav) {
        nav.classList.add('open');
        nav.setAttribute('aria-hidden', 'false');
    }
    if (btn) {
        btn.classList.add('open');
        btn.setAttribute('aria-expanded', 'true');
    }
    document.body.style.overflow = 'hidden';
}

function closeMobileNav() {
    var nav = document.getElementById('mobileNav');
    var btn = document.getElementById('hamburgerBtn');
    if (nav) {
        nav.classList.remove('open');
        nav.setAttribute('aria-hidden', 'true');
    }
    if (btn) {
        btn.classList.remove('open');
        btn.setAttribute('aria-expanded', 'false');
    }
    document.body.style.overflow = '';
}

function initHamburgerMenu() {
    var hamburger = document.getElementById('hamburgerBtn');
    var closeBtn  = document.getElementById('mobileNavClose');

    if (hamburger) {
        hamburger.addEventListener('click', openMobileNav);
    }
    if (closeBtn) {
        closeBtn.addEventListener('click', closeMobileNav);
    }

    // Close when pressing Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeMobileNav();
    });
}


/* ── 7. THEME TOGGLE ───────────────────────────────────────────────────────── */
function initTheme() {
    var saved = localStorage.getItem('akib-theme') || 'dark';
    applyTheme(saved);

    var btn = document.getElementById('themeToggle');
    if (btn) {
        btn.addEventListener('click', function () {
            var current = document.body.classList.contains('dark-mode') ? 'dark' : 'light';
            var next    = current === 'dark' ? 'light' : 'dark';
            applyTheme(next);
            localStorage.setItem('akib-theme', next);
        });
    }
}

function applyTheme(theme) {
    var body = document.body;
    var icon = document.querySelector('#themeToggle i');

    if (theme === 'light') {
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
        if (icon) { icon.className = 'fas fa-sun'; }
    } else {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
        if (icon) { icon.className = 'fas fa-moon'; }
    }
}


/* ── 8. SCROLL PROGRESS BAR + SCROLL-TO-TOP ────────────────────────────────── */
function initScrollProgress() {
    var bar         = document.getElementById('scrollProgress');
    var topBtn      = document.getElementById('scrollToTop');
    var headerEl    = document.getElementById('site-header');

    window.addEventListener('scroll', function () {
        var scrolled = window.pageYOffset;
        var total    = document.documentElement.scrollHeight - window.innerHeight;

        // Progress bar width
        if (bar) {
            bar.style.width = (scrolled / total * 100) + '%';
        }

        // Scroll-to-top visibility
        if (topBtn) {
            if (scrolled > 400) {
                topBtn.classList.add('visible');
            } else {
                topBtn.classList.remove('visible');
            }
        }

        // Add shadow to header when scrolled
        if (headerEl) {
            if (scrolled > 10) {
                headerEl.style.boxShadow = '0 4px 24px rgba(0,0,0,0.4)';
            } else {
                headerEl.style.boxShadow = 'none';
            }
        }
    });

    if (topBtn) {
        topBtn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
}

function initScrollToTop() {
    // Bound early so button works even before explore click (just in case)
    var topBtn = document.getElementById('scrollToTop');
    if (topBtn) {
        topBtn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
}


/* ── 9. TYPED TEXT EFFECT (hero tagline) ──────────────────────────────────── */
// typedStrings is injected by hero.php via inline <script>
var typedState = {
    strIndex:  0,
    charIndex: 0,
    deleting:  false,
    paused:    false,
};

function initTypedText() {
    if (typeof typedStrings === 'undefined' || !typedStrings.length) return;
    typedTick();
}

function typedTick() {
    var el      = document.getElementById('typed-text');
    if (!el) return;

    var str     = typedStrings[typedState.strIndex];
    var current = typedState.deleting
        ? str.slice(0, typedState.charIndex - 1)
        : str.slice(0, typedState.charIndex + 1);

    el.textContent = current;

    if (!typedState.deleting) {
        typedState.charIndex++;
        if (typedState.charIndex > str.length) {
            // Full string typed — pause before deleting
            typedState.paused = true;
            setTimeout(function () {
                typedState.deleting = true;
                typedState.paused   = false;
                typedTick();
            }, 1800);
            return;
        }
    } else {
        typedState.charIndex--;
        if (typedState.charIndex < 0) {
            typedState.deleting  = false;
            typedState.charIndex = 0;
            typedState.strIndex  = (typedState.strIndex + 1) % typedStrings.length;
        }
    }

    var speed = typedState.deleting ? 60 : 100;
    setTimeout(typedTick, speed);
}


/* ── 10. SCROLL-REVEAL with IntersectionObserver ─────────────────────────── */
function initScrollReveal() {
    if (!('IntersectionObserver' in window)) {
        // Fallback: make everything visible immediately
        document.querySelectorAll('.reveal-item').forEach(function (el) {
            el.classList.add('revealed');
        });
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;

            // Stagger siblings by their index
            var siblings = Array.from(entry.target.parentElement.querySelectorAll('.reveal-item'));
            var idx      = siblings.indexOf(entry.target);
            entry.target.style.transitionDelay = (idx * 0.1) + 's';
            entry.target.classList.add('revealed');

            // ── 11. Animate skill progress bars on reveal ──
            if (entry.target.classList.contains('skill-card')) {
                var fill   = entry.target.querySelector('.skill-progress-fill');
                var target = entry.target.getAttribute('data-proficiency');
                if (fill && target) {
                    // Slight extra delay so bar animates after card fades in
                    setTimeout(function () {
                        fill.style.width = target + '%';
                    }, 200);
                }
            }

            observer.unobserve(entry.target);
        });
    }, {
        threshold:  0.12,
        rootMargin: '0px 0px -40px 0px',
    });

    document.querySelectorAll('.reveal-item').forEach(function (el) {
        observer.observe(el);
    });
}


/* ── 12. PROJECT CARD 3D TILT ─────────────────────────────────────────────── */
function initProjectTilt() {
    document.querySelectorAll('.project-card').forEach(function (card) {
        card.addEventListener('mousemove', function (e) {
            var rect    = card.getBoundingClientRect();
            var x       = e.clientX - rect.left - rect.width  / 2;
            var y       = e.clientY - rect.top  - rect.height / 2;
            var rotateX = -(y / rect.height) * 10;
            var rotateY =  (x / rect.width)  * 10;
            card.style.transform = 'perspective(1000px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg) scale(1.03)';
        });

        card.addEventListener('mouseleave', function () {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
        });
    });
}


/* ── 13. TESTIMONIALS CAROUSEL ────────────────────────────────────────────── */
// `testimonials` is injected by recommendations.php via inline <script>
var currentTestimonialIdx = 0;

function initTestimonialsCarousel() {
    if (typeof testimonials === 'undefined' || !testimonials.length) return;

    var prevBtn = document.getElementById('prevTestimonial');
    var nextBtn = document.getElementById('nextTestimonial');
    var dots    = document.querySelectorAll('.dot');

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            currentTestimonialIdx = (currentTestimonialIdx - 1 + testimonials.length) % testimonials.length;
            showTestimonial(currentTestimonialIdx);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            currentTestimonialIdx = (currentTestimonialIdx + 1) % testimonials.length;
            showTestimonial(currentTestimonialIdx);
        });
    }

    // Dot click
    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            var idx = parseInt(dot.getAttribute('data-index'), 10);
            currentTestimonialIdx = idx;
            showTestimonial(idx);
        });
    });

    // Auto-advance every 5 s
    setInterval(function () {
        currentTestimonialIdx = (currentTestimonialIdx + 1) % testimonials.length;
        showTestimonial(currentTestimonialIdx);
    }, 5000);
}

function showTestimonial(idx) {
    var card   = document.getElementById('testimonialCard');
    var textEl = document.getElementById('testimonialText');
    var authEl = document.getElementById('testimonialAuthor');
    var roleEl = document.getElementById('testimonialRole');
    var dots   = document.querySelectorAll('.dot');

    if (!card || !textEl || !authEl) return;

    var t = testimonials[idx];

    // Fade out → update → fade in
    card.style.opacity   = '0';
    card.style.transform = 'scale(0.95)';

    setTimeout(function () {
        textEl.textContent = t.text;
        authEl.textContent = t.author;
        if (roleEl) roleEl.textContent = t.role || '';

        card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        card.style.opacity    = '1';
        card.style.transform  = 'scale(1)';

        // Update dot indicators
        dots.forEach(function (dot, i) {
            dot.classList.toggle('active', i === idx);
        });
    }, 250);
}


/* ── 14. AJAX CONTACT FORM ─────────────────────────────────────────────────── */
// `ajaxContactUrl` is injected by contact.php via inline <script>
function initContactForm() {
    var form     = document.getElementById('contactForm');
    var submitBtn = document.getElementById('contactSubmit');
    var response = document.getElementById('formResponse');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        var name    = form.querySelector('#contactName').value.trim();
        var email   = form.querySelector('#contactEmail').value.trim();
        var message = form.querySelector('#contactMessage').value.trim();

        // Basic client-side check before sending
        if (!name || !email || !message) {
            showFormResponse('Please fill in all fields.', 'error');
            return;
        }

        // Show loading state
        setSubmitLoading(true);
        hideFormResponse();

        var url = (typeof ajaxContactUrl !== 'undefined') ? ajaxContactUrl : 'ajax_contact.php';

        fetch(url, {
            method:  'POST',
            headers: { 'Content-Type': 'application/json' },
            body:    JSON.stringify({ name: name, email: email, message: message }),
        })
        .then(function (res) {
            return res.json();
        })
        .then(function (data) {
            setSubmitLoading(false);
            if (data.success) {
                showFormResponse(data.message, 'success');
                form.reset();
            } else {
                showFormResponse(data.message || 'Something went wrong. Please try again.', 'error');
            }
        })
        .catch(function () {
            setSubmitLoading(false);
            showFormResponse('Network error. Please check your connection and try again.', 'error');
        });
    });

    function setSubmitLoading(loading) {
        if (!submitBtn) return;
        var text   = submitBtn.querySelector('.btn-text');
        var loader = submitBtn.querySelector('.btn-loader');
        submitBtn.disabled = loading;
        if (text)   text.hidden   =  loading;
        if (loader) loader.hidden = !loading;
    }

    function showFormResponse(msg, type) {
        if (!response) return;
        response.textContent = msg;
        response.className   = 'form-response ' + type;
        response.hidden      = false;
    }

    function hideFormResponse() {
        if (!response) return;
        response.hidden = true;
    }
}
