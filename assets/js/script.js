/* ═══════════════════════════════════════════════════════════════════════════
   PORTFOLIO SCRIPT — SCI-FI CINEMATIC EDITION
   Modules: Cursor | Lenis | Boot | Particles | Three.js | GSAP | Skill Tree
            Projects | Carousel | Nav | Contact Ajax | Radar
   ═══════════════════════════════════════════════════════════════════════════ */

'use strict';

/* ── Utility: wait for DOM ─────────────────────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
    initCursor();
    runBootSequence();
});

/* ════════════════════════════════════════════════════════════════════════════
   1. CUSTOM CURSOR
   ════════════════════════════════════════════════════════════════════════════ */
function initCursor() {
    const ring = document.getElementById('cursor-ring');
    const dot = document.getElementById('cursor-dot');
    if (!ring || !dot) return;

    let rx = 0, ry = 0;
    let mx = window.innerWidth / 2, my = window.innerHeight / 2;

    document.addEventListener('mousemove', e => {
        mx = e.clientX; my = e.clientY;
        dot.style.left = mx + 'px';
        dot.style.top = my + 'px';
    });

    // Smooth ring follow
    function animRing() {
        rx += (mx - rx) * 0.12;
        ry += (my - ry) * 0.12;
        ring.style.left = rx + 'px';
        ring.style.top = ry + 'px';
        requestAnimationFrame(animRing);
    }
    animRing();

    // Hover scale on interactive elements
    const hoverTargets = 'a, button, [data-radar], .project-card, .nav-link, .cta-btn, .cluster-btn, .filter-btn';
    document.addEventListener('mouseover', e => {
        if (e.target.closest(hoverTargets)) document.body.classList.add('cursor-hover');
    });
    document.addEventListener('mouseout', e => {
        if (e.target.closest(hoverTargets)) document.body.classList.remove('cursor-hover');
    });
}

/* ════════════════════════════════════════════════════════════════════════════
   2. BOOT SEQUENCE — Terminal + Progress + Glitch reveal
   ════════════════════════════════════════════════════════════════════════════ */
function runBootSequence() {
    const screen = document.getElementById('loading-screen');
    const lines = document.querySelectorAll('.boot-line');
    const fill = document.getElementById('boot-progress-fill');
    const pct = document.getElementById('boot-percent');
    const strips = document.querySelectorAll('.glitch-strip');

    if (!screen) { revealIntro(); return; }

    const total = lines.length;
    const stepDelay = 280;
    let current = 0;

    function showNextLine() {
        if (current >= total) {
            // All lines shown — play glitch then reveal intro
            setTimeout(playGlitchAndReveal, 400);
            return;
        }
        lines[current].classList.add('visible');
        const progress = Math.round(((current + 1) / total) * 100);
        fill.style.width = progress + '%';
        pct.textContent = progress + '%';
        current++;
        setTimeout(showNextLine, stepDelay);
    }

    // Small initial pause (feels intentional)
    setTimeout(showNextLine, 500);

    function playGlitchAndReveal() {
        // Glitch strips flash
        strips.forEach((s, i) => {
            setTimeout(() => {
                s.style.opacity = '1';
                setTimeout(() => { s.style.opacity = '0'; }, 80);
            }, i * 60);
        });
        setTimeout(() => {
            strips.forEach(s => { s.style.opacity = '1'; });
            setTimeout(() => {
                screen.style.transition = 'opacity 0.6s ease, filter 0.6s ease';
                screen.style.opacity = '0';
                screen.style.filter = 'blur(4px)';
                setTimeout(() => {
                    screen.style.display = 'none';
                    revealIntro();
                }, 620);
            }, 120);
        }, 300);
    }
}

/* ════════════════════════════════════════════════════════════════════════════
   3. INTRO SPLASH — Particle canvas + ENTER transition
   ════════════════════════════════════════════════════════════════════════════ */
function revealIntro() {
    const intro = document.getElementById('intro-screen');
    if (!intro) { revealMain(); return; }
    intro.classList.add('visible');
    initIntroParticles();

    const enterBtn = document.getElementById('enter-btn');
    if (enterBtn) {
        enterBtn.addEventListener('click', () => {
            enterBtn.disabled = true;
            playEnterTransition();
        });
    }
}

function initIntroParticles() {
    const canvas = document.getElementById('particle-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');

    function resize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    // Particles = drifting data-stream dots
    const PARTICLE_COUNT = 120;
    const particles = Array.from({ length: PARTICLE_COUNT }, () => ({
        x: Math.random() * window.innerWidth,
        y: Math.random() * window.innerHeight,
        vx: (Math.random() - 0.5) * 0.4,
        vy: -Math.random() * 0.6 - 0.2,
        size: Math.random() * 1.5 + 0.5,
        alpha: Math.random() * 0.5 + 0.1,
        color: Math.random() > 0.5 ? '#00d4ff' : '#00ff88',
    }));

    let animId;
    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(p => {
            ctx.save();
            ctx.globalAlpha = p.alpha;
            ctx.fillStyle = p.color;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();

            p.x += p.vx;
            p.y += p.vy;

            if (p.y < -10) { p.y = canvas.height + 10; p.x = Math.random() * canvas.width; }
            if (p.x < -10) { p.x = canvas.width + 10; }
            if (p.x > canvas.width + 10) { p.x = -10; }
        });
        animId = requestAnimationFrame(draw);
    }
    draw();

    // Store cancel fn
    canvas._cancelAnim = () => cancelAnimationFrame(animId);
}

function playEnterTransition() {
    const intro = document.getElementById('intro-screen');

    if (typeof gsap !== 'undefined') {
        gsap.to(intro, {
            scale: 1.08,
            opacity: 0,
            filter: 'blur(8px)',
            duration: 0.7,
            ease: 'power2.in',
            onComplete: () => {
                intro.style.display = 'none';
                // Cancel particle animation
                const canvas = document.getElementById('particle-canvas');
                if (canvas && canvas._cancelAnim) canvas._cancelAnim();
                revealMain();
            }
        });
    } else {
        intro.style.transition = 'opacity 0.5s ease';
        intro.style.opacity = '0';
        setTimeout(() => {
            intro.style.display = 'none';
            revealMain();
        }, 500);
    }
}

/* ════════════════════════════════════════════════════════════════════════════
   4. REVEAL MAIN SITE
   ════════════════════════════════════════════════════════════════════════════ */
function revealMain() {
    const main = document.getElementById('main-site');
    const header = document.getElementById('site-header');
    if (!main) return;

    main.classList.add('visible');
    if (header) setTimeout(() => header.classList.add('visible'), 200);

    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') lucide.createIcons();

    // Init all main modules
    initLenis();
    initHeroThree();
    initGlitchTypewriter();
    initHeroNameAnim();
    initScrollAnimations();
    initTimelineScroll();
    initSkillTree();
    initProjectFilter();
    initDossierOverlay();
    initCarousel();
    initNavIndicator();
    initContactForm();
    initRadarPing();
    initMobileNav();
}

/* ════════════════════════════════════════════════════════════════════════════
   5. LENIS SMOOTH SCROLL
   ════════════════════════════════════════════════════════════════════════════ */
function initLenis() {
    if (typeof Lenis === 'undefined') return;
    const lenis = new Lenis({ lerp: 0.08, smoothWheel: true });

    // Use GSAP ticker exclusively to drive Lenis (avoids double-stepping per frame)
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        lenis.on('scroll', ScrollTrigger.update);
        gsap.ticker.add(time => lenis.raf(time * 1000));
        gsap.ticker.lagSmoothing(0);
    } else {
        // Fallback: standalone rAF loop only when GSAP is not available
        function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
        requestAnimationFrame(raf);
    }

    // Smooth-scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) { e.preventDefault(); lenis.scrollTo(target, { offset: -64, duration: 1.2 }); }
        });
    });
}

/* ════════════════════════════════════════════════════════════════════════════
   6. THREE.JS HERO BACKGROUND
   ════════════════════════════════════════════════════════════════════════════ */
function initHeroThree() {
    const canvas = document.getElementById('hero-canvas');
    if (!canvas || typeof THREE === 'undefined') return;

    const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(canvas.offsetWidth, canvas.offsetHeight);
    renderer.setClearColor(0x000000, 0);

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(60, canvas.offsetWidth / canvas.offsetHeight, 0.1, 100);
    camera.position.z = 5;

    // Icosahedron wireframe
    const geo = new THREE.IcosahedronGeometry(2.2, 2);
    const mat = new THREE.MeshBasicMaterial({
        color: 0x00d4ff,
        wireframe: true,
        transparent: true,
        opacity: 0.12,
    });
    const mesh = new THREE.Mesh(geo, mat);
    scene.add(mesh);

    // Floating particles
    const ptCount = 200;
    const positions = new Float32Array(ptCount * 3);
    for (let i = 0; i < ptCount * 3; i++) positions[i] = (Math.random() - 0.5) * 12;
    const ptGeo = new THREE.BufferGeometry();
    ptGeo.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    const ptMat = new THREE.PointsMaterial({ color: 0x00ff88, size: 0.04, transparent: true, opacity: 0.6 });
    scene.add(new THREE.Points(ptGeo, ptMat));

    // Mouse influence
    let targetX = 0, targetY = 0;
    const hero = document.getElementById('hero');
    hero && hero.addEventListener('mousemove', e => {
        targetX = (e.clientX / window.innerWidth - 0.5) * 0.8;
        targetY = (e.clientY / window.innerHeight - 0.5) * 0.6;
    });

    window.addEventListener('resize', () => {
        renderer.setSize(canvas.offsetWidth, canvas.offsetHeight);
        camera.aspect = canvas.offsetWidth / canvas.offsetHeight;
        camera.updateProjectionMatrix();
    });

    let animId;
    function animate() {
        animId = requestAnimationFrame(animate);
        mesh.rotation.x += 0.0015 + targetY * 0.01;
        mesh.rotation.y += 0.0025 + targetX * 0.01;
        camera.position.x += (targetX * 0.5 - camera.position.x) * 0.05;
        camera.position.y += (-targetY * 0.5 - camera.position.y) * 0.05;
        renderer.render(scene, camera);
    }
    animate();
}

/* ════════════════════════════════════════════════════════════════════════════
   7. HERO NAME PARTICLE ASSEMBLY (GSAP)
   ════════════════════════════════════════════════════════════════════════════ */
function initHeroNameAnim() {
    const chars = document.querySelectorAll('.hero-char');
    if (!chars.length || typeof gsap === 'undefined') return;

    gsap.set(chars, { opacity: 0, y: 80, rotationX: -90, filter: 'blur(12px)' });
    gsap.to(chars, {
        opacity: 1,
        y: 0,
        rotationX: 0,
        filter: 'blur(0px)',
        stagger: 0.06,
        duration: 0.9,
        ease: 'power4.out',
        delay: 0.3,
    });
}

/* ════════════════════════════════════════════════════════════════════════════
   8. GLITCH TYPEWRITER — Role cycling
   ════════════════════════════════════════════════════════════════════════════ */
function initGlitchTypewriter() {
    const el = document.getElementById('hero-role-text');
    const roles = window.HERO_ROLES || [];
    if (!el || !roles.length) return;

    const GLITCH_CHARS = '░▒▓█▀▄╗╔╚╝║═';
    let roleIdx = 0;
    let charIdx = 0;
    let deleting = false;
    let glitching = false;

    function getRandGlitch() {
        return GLITCH_CHARS[Math.floor(Math.random() * GLITCH_CHARS.length)];
    }

    function tick() {
        const current = roles[roleIdx];
        if (deleting) {
            el.textContent = current.substring(0, --charIdx);
            if (charIdx === 0) {
                deleting = false;
                roleIdx = (roleIdx + 1) % roles.length;
                setTimeout(tick, 400);
                return;
            }
            setTimeout(tick, 40);
        } else {
            if (charIdx < current.length) {
                // Glitch frame
                el.textContent = current.substring(0, charIdx) + getRandGlitch();
                setTimeout(() => {
                    charIdx++;
                    el.textContent = current.substring(0, charIdx);
                    setTimeout(tick, 70);
                }, 35);
            } else {
                // Pause then delete
                setTimeout(() => { deleting = true; tick(); }, 2200);
            }
        }
    }

    setTimeout(tick, 1400);
}

/* ════════════════════════════════════════════════════════════════════════════
   9. GSAP SCROLL ANIMATIONS
   ════════════════════════════════════════════════════════════════════════════ */
function initScrollAnimations() {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
        // Fallback: IntersectionObserver
        const observer = new IntersectionObserver(entries => {
            entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('in-view'); });
        }, { threshold: 0.15 });
        document.querySelectorAll('.reveal-card, .reveal-node').forEach(el => observer.observe(el));
        return;
    }

    // ScrollTrigger already registered in initLenis(); no need to re-register

    // Section titles / heads
    document.querySelectorAll('.section-head').forEach(el => {
        gsap.from(el, {
            opacity: 0, y: 40,
            scrollTrigger: { trigger: el, start: 'top 85%', once: true },
            duration: 0.8, ease: 'power3.out',
        });
    });

    // Project cards stagger: only animate those not already marked in-view
    const cards = document.querySelectorAll('.project-card:not(.in-view)');
    if (cards.length) {
        gsap.from(cards, {
            opacity: 0, y: 50, stagger: 0.1,
            scrollTrigger: { trigger: '.projects-grid', start: 'top 80%', once: true },
            duration: 0.7, ease: 'power3.out',
            onComplete: () => cards.forEach(c => c.classList.add('in-view')),
        });
    }

    // Debrief cards
    gsap.from('.debrief-card', {
        opacity: 0, x: 40, stagger: 0.15,
        scrollTrigger: { trigger: '.carousel-wrap', start: 'top 80%', once: true },
        duration: 0.7, ease: 'power3.out',
    });

    // Contact layout
    gsap.from('.contact-info', {
        opacity: 0, x: -40,
        scrollTrigger: { trigger: '.contact-layout', start: 'top 80%', once: true },
        duration: 0.8, ease: 'power3.out',
    });
    gsap.from('.contact-form-wrap', {
        opacity: 0, x: 40,
        scrollTrigger: { trigger: '.contact-layout', start: 'top 80%', once: true },
        duration: 0.8, ease: 'power3.out',
        delay: 0.1,
    });
}

/* ════════════════════════════════════════════════════════════════════════════
   10. EDUCATION TIMELINE
   ════════════════════════════════════════════════════════════════════════════ */
function initTimelineScroll() {
    const nodes = document.querySelectorAll('.timeline-node');
    const fill = document.getElementById('timeline-fill');
    if (!nodes.length) return;

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                // Grow the track fill proportionally
                const activeCount = document.querySelectorAll('.timeline-node.active').length;
                if (fill) fill.style.height = (activeCount / nodes.length * 100) + '%';
            }
        });
    }, { threshold: 0.4 });

    nodes.forEach(n => observer.observe(n));
}

/* ════════════════════════════════════════════════════════════════════════════
   11. SKILL TREE — Canvas node-graph
   ════════════════════════════════════════════════════════════════════════════ */
function initSkillTree() {
    const canvas = document.getElementById('skill-tree-canvas');
    const tooltip = document.getElementById('skill-tooltip');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const skills = window.SKILLS_DATA || [];
    const wrap = document.getElementById('skill-tree-wrap');

    const DPR = Math.min(window.devicePixelRatio, 2);

    const CLUSTER_COLORS = {
        'DATA': '#00d4ff',
        'CODE': '#9b59b6',
        'ML/AI': '#00ff88',
        'TOOLS': '#f39c12',
        'ESPORTS': '#e74c3c',
    };
    const CLUSTER_BG = {
        'DATA': 'rgba(0,212,255,0.06)',
        'CODE': 'rgba(155,89,182,0.06)',
        'ML/AI': 'rgba(0,255,136,0.06)',
        'TOOLS': 'rgba(243,156,18,0.06)',
        'ESPORTS': 'rgba(231,76,60,0.06)',
    };

    let nodes = [];
    let animProgress = 0;
    let hoveredNode = null;
    let activeCluster = null;
    let animId;
    let pulseT = 0; // for animated pulse rings
    let rafPulse;

    function resize() {
        const w = wrap.offsetWidth;
        const h = Math.max(Math.round(w * 0.62), 440);
        canvas.width = w * DPR;
        canvas.height = h * DPR;
        canvas.style.width = w + 'px';
        canvas.style.height = h + 'px';
        ctx.scale(DPR, DPR);
        layoutNodes(w, h);
    }

    function layoutNodes(W, H) {
        const clusters = {};
        skills.forEach(s => {
            if (!clusters[s.cluster]) clusters[s.cluster] = [];
            clusters[s.cluster].push(s);
        });

        const clusterKeys = Object.keys(clusters);
        const colW = W / clusterKeys.length;
        nodes = [];

        clusterKeys.forEach((cluster, ci) => {
            const cSkills = clusters[cluster];
            const cx = colW * ci + colW / 2;
            cSkills.forEach((s, si) => {
                const totalInCol = cSkills.length;
                // Base radius 26, scale slightly with proficiency
                const baseR = 26 + Math.round((s.proficiency - 60) / 40 * 8);
                const cy = H * 0.18 + (H * 0.68) * ((si + 1) / (totalInCol + 1));
                nodes.push({
                    ...s,
                    x: cx, y: cy,
                    r: baseR,
                    color: CLUSTER_COLORS[cluster] || '#00d4ff',
                    bgColor: CLUSTER_BG[cluster] || 'rgba(0,212,255,0.06)',
                    label: s.name,
                    cluster,
                });
            });
        });
        draw();
    }

    function drawHexGrid(W, H) {
        const size = 22;
        const cols = Math.ceil(W / (size * 1.73)) + 2;
        const rows = Math.ceil(H / (size * 1.5)) + 2;
        ctx.save();
        ctx.strokeStyle = 'rgba(0,212,255,0.035)';
        ctx.lineWidth = 0.5;
        for (let row = -1; row < rows; row++) {
            for (let col = -1; col < cols; col++) {
                const x = col * size * 1.73 + (row % 2 === 0 ? 0 : size * 0.865);
                const y = row * size * 1.5;
                ctx.beginPath();
                for (let i = 0; i < 6; i++) {
                    const angle = (Math.PI / 3) * i - Math.PI / 6;
                    const px = x + size * Math.cos(angle);
                    const py = y + size * Math.sin(angle);
                    if (i === 0) ctx.moveTo(px, py); else ctx.lineTo(px, py);
                }
                ctx.closePath();
                ctx.stroke();
            }
        }
        ctx.restore();
    }

    function drawColumnBg(W, H) {
        const clusterKeys = [...new Set(nodes.map(n => n.cluster))];
        const colW = W / clusterKeys.length;
        clusterKeys.forEach((cluster, i) => {
            const dim = activeCluster && activeCluster !== cluster;
            ctx.save();
            ctx.globalAlpha = dim ? 0.02 : 0.07;
            ctx.fillStyle = CLUSTER_COLORS[cluster] || '#00d4ff';
            ctx.fillRect(i * colW + 4, 0, colW - 8, H);
            ctx.restore();
        });
    }

    function drawColumnHeaders(W, H) {
        const clusterKeys = [...new Set(nodes.map(n => n.cluster))];
        const colW = W / clusterKeys.length;
        clusterKeys.forEach((cluster, i) => {
            const cx = colW * i + colW / 2;
            const dim = activeCluster && activeCluster !== cluster;
            const color = CLUSTER_COLORS[cluster] || '#00d4ff';

            ctx.save();
            ctx.globalAlpha = dim ? 0.15 : 1;

            // Accent underline bar
            const barW = Math.min(colW * 0.6, 90);
            const barX = cx - barW / 2;
            const barY = 36;
            const grad = ctx.createLinearGradient(barX, 0, barX + barW, 0);
            grad.addColorStop(0, 'transparent');
            grad.addColorStop(0.5, color);
            grad.addColorStop(1, 'transparent');
            ctx.strokeStyle = grad;
            ctx.lineWidth = 1.5;
            ctx.beginPath();
            ctx.moveTo(barX, barY);
            ctx.lineTo(barX + barW, barY);
            ctx.stroke();

            // Cluster label
            ctx.font = '700 11px "JetBrains Mono", monospace';
            ctx.fillStyle = color;
            ctx.textAlign = 'center';
            ctx.shadowColor = color;
            ctx.shadowBlur = dim ? 0 : 8;
            ctx.fillText(cluster, cx, 26);

            ctx.restore();
        });
    }

    function drawScanLine(W, H) {
        if (animProgress < 1) return;
        const y = ((Date.now() / 18) % H);
        ctx.save();
        const grad = ctx.createLinearGradient(0, y - 40, 0, y + 40);
        grad.addColorStop(0, 'transparent');
        grad.addColorStop(0.5, 'rgba(0,212,255,0.04)');
        grad.addColorStop(1, 'transparent');
        ctx.fillStyle = grad;
        ctx.fillRect(0, y - 40, W, 80);
        ctx.restore();
    }

    function drawWires() {
        const clusterMap = {};
        nodes.forEach(n => {
            if (!clusterMap[n.cluster]) clusterMap[n.cluster] = [];
            clusterMap[n.cluster].push(n);
        });

        Object.values(clusterMap).forEach(clusterNodes => {
            for (let i = 0; i < clusterNodes.length - 1; i++) {
                const a = clusterNodes[i], b = clusterNodes[i + 1];
                const np = Math.min(animProgress * clusterNodes.length * 1.4 - i, 1);
                if (np <= 0) continue;
                const dim = activeCluster && activeCluster !== a.cluster;

                ctx.save();
                ctx.globalAlpha = (dim ? 0.05 : 0.3) * np;
                ctx.strokeStyle = a.color;
                ctx.lineWidth = 1.5;
                ctx.setLineDash([5, 7]);
                ctx.shadowColor = a.color;
                ctx.shadowBlur = dim ? 0 : 4;
                ctx.beginPath();
                ctx.moveTo(a.x, a.y);
                const ex = a.x + (b.x - a.x) * np;
                const ey = a.y + (b.y - a.y) * np;
                ctx.lineTo(ex, ey);
                ctx.stroke();
                ctx.setLineDash([]);
                ctx.restore();
            }
        });
    }

    function drawNode(n, idx) {
        const np = Math.min(animProgress * nodes.length * 1.3 - idx, 1);
        if (np <= 0) return;

        const dimmed = activeCluster && activeCluster !== n.cluster;
        const isHov = hoveredNode === n;
        const r = isHov ? n.r * 1.18 : n.r;

        ctx.save();
        ctx.globalAlpha = dimmed ? 0.18 : np;

        // Shadow glow (reliable cross-browser approach)
        if (!dimmed) {
            ctx.shadowColor = n.color;
            ctx.shadowBlur = isHov ? 30 : 14;
        }

        // Node fill — use rgba directly (colors are hex so we parse)
        function hexAlpha(hex, a) {
            const r = parseInt(hex.slice(1, 3), 16);
            const g = parseInt(hex.slice(3, 5), 16);
            const b = parseInt(hex.slice(5, 7), 16);
            return `rgba(${r},${g},${b},${a})`;
        }
        const fillGrad = ctx.createRadialGradient(n.x - r * 0.3, n.y - r * 0.3, 0, n.x, n.y, r);
        if (isHov) {
            fillGrad.addColorStop(0, hexAlpha(n.color, 0.8));
            fillGrad.addColorStop(1, hexAlpha(n.color, 0.3));
        } else {
            fillGrad.addColorStop(0, 'rgba(20,20,40,0.96)');
            fillGrad.addColorStop(1, 'rgba(8,8,20,0.98)');
        }
        ctx.beginPath();
        ctx.arc(n.x, n.y, r * np, 0, Math.PI * 2);
        ctx.fillStyle = fillGrad;
        ctx.fill();

        // Border
        ctx.strokeStyle = n.color;
        ctx.lineWidth = isHov ? 2.5 : 1.5;
        ctx.stroke();

        ctx.shadowBlur = 0;


        // Proficiency arc (outer ring)
        if (!dimmed && np > 0.6) {
            const arcAlpha = (np - 0.6) / 0.4;
            const arcR = r + 6;
            const startAngle = -Math.PI / 2;
            const endAngle = startAngle + (Math.PI * 2) * (n.proficiency / 100) * Math.min(animProgress * 2, 1);
            ctx.save();
            ctx.globalAlpha = arcAlpha * (isHov ? 0.9 : 0.55);
            ctx.strokeStyle = n.color;
            ctx.lineWidth = isHov ? 3 : 2;
            ctx.lineCap = 'round';
            ctx.shadowColor = n.color;
            ctx.shadowBlur = isHov ? 12 : 6;
            // Track (dim)
            ctx.globalAlpha *= 0.15;
            ctx.beginPath();
            ctx.arc(n.x, n.y, arcR, 0, Math.PI * 2);
            ctx.stroke();
            // Fill arc
            ctx.globalAlpha = arcAlpha * (isHov ? 0.9 : 0.55);
            ctx.beginPath();
            ctx.arc(n.x, n.y, arcR, startAngle, endAngle);
            ctx.stroke();
            ctx.restore();
        }

        // Animated pulse ring (for top-proficiency nodes)
        if (!dimmed && n.proficiency >= 85 && animProgress >= 1) {
            const pulseR = r + 10 + Math.sin(pulseT * 0.04 + idx) * 6;
            const pulseAlpha = (0.4 + Math.sin(pulseT * 0.04 + idx) * 0.2) * (isHov ? 1 : 0.5);
            ctx.save();
            ctx.globalAlpha = dimmed ? 0 : pulseAlpha;
            ctx.strokeStyle = n.color;
            ctx.lineWidth = 1;
            ctx.shadowColor = n.color;
            ctx.shadowBlur = 8;
            ctx.beginPath();
            ctx.arc(n.x, n.y, pulseR, 0, Math.PI * 2);
            ctx.stroke();
            ctx.restore();
        }

        // Label inside node
        if (np > 0.75) {
            const labelAlpha = (np - 0.75) / 0.25;
            ctx.save();
            ctx.globalAlpha = labelAlpha * (dimmed ? 0.2 : 1);
            ctx.shadowColor = isHov ? 'rgba(0,0,0,0.8)' : n.color;
            ctx.shadowBlur = isHov ? 0 : 4;

            // Skill name (split if long)
            const words = n.label.split('/');
            const fontSize = Math.max(8, Math.min(10, r * 0.38));
            ctx.font = `700 ${fontSize}px "JetBrains Mono", monospace`;
            ctx.fillStyle = isHov ? '#080810' : n.color;
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            if (words.length > 1) {
                ctx.fillText(words[0], n.x, n.y - fontSize * 0.6);
                ctx.fillText('/' + words[1], n.x, n.y + fontSize * 0.6);
            } else {
                ctx.fillText(n.label, n.x, n.y);
            }

            // Proficiency % below node (outside)
            ctx.shadowBlur = 0;
            ctx.font = `500 9px "JetBrains Mono", monospace`;
            ctx.fillStyle = isHov ? n.color : 'rgba(255,255,255,0.35)';
            ctx.fillText(n.proficiency + '%', n.x, n.y + r + 13);
            ctx.restore();
        }

        ctx.restore();
    }

    function draw() {
        const W = canvas.offsetWidth, H = canvas.offsetHeight;
        ctx.clearRect(0, 0, W, H);

        drawHexGrid(W, H);
        drawColumnBg(W, H);
        drawScanLine(W, H);
        drawColumnHeaders(W, H);
        drawWires();
        nodes.forEach((n, i) => drawNode(n, i));
    }

    // Continuous pulse animation after reveal
    function startPulse() {
        cancelAnimationFrame(rafPulse);
        function pulse() {
            pulseT++;
            draw();
            rafPulse = requestAnimationFrame(pulse);
        }
        pulse();
    }

    // Scroll-triggered entry animation
    const observer = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                cancelAnimationFrame(animId);
                let start = null;
                function anim(ts) {
                    if (!start) start = ts;
                    animProgress = Math.min((ts - start) / 1400, 1);
                    draw();
                    if (animProgress < 1) {
                        animId = requestAnimationFrame(anim);
                    } else {
                        startPulse();
                    }
                }
                animId = requestAnimationFrame(anim);
                observer.unobserve(canvas);
            }
        });
    }, { threshold: 0.25 });
    observer.observe(canvas);

    // Mouse hover
    canvas.addEventListener('mousemove', e => {
        const rect = canvas.getBoundingClientRect();
        const mx = e.clientX - rect.left;
        const my = e.clientY - rect.top;
        const prev = hoveredNode;
        hoveredNode = nodes.find(n => Math.hypot(n.x - mx, n.y - my) < n.r * 1.5) || null;
        if (hoveredNode !== prev) {
            if (!rafPulse) draw(); // only redraw if pulse not running
            if (hoveredNode && tooltip) {
                const tn = tooltip.querySelector('.tooltip-name');
                const tl = tooltip.querySelector('.tooltip-level');
                const td = tooltip.querySelector('.tooltip-desc');
                const tf = tooltip.querySelector('.tooltip-fill');
                if (tn) tn.textContent = hoveredNode.name;
                if (tl) tl.textContent = '// ' + hoveredNode.level + ' · ' + hoveredNode.proficiency + '%';
                if (td) td.textContent = hoveredNode.desc;
                if (tf) tf.style.width = hoveredNode.proficiency + '%';
                // Smart positioning — keep within canvas
                const W = canvas.offsetWidth;
                const tipX = hoveredNode.x + hoveredNode.r + 14;
                tooltip.style.left = (tipX + 200 > W ? hoveredNode.x - hoveredNode.r - 214 : tipX) + 'px';
                tooltip.style.top = Math.max(0, hoveredNode.y - 30) + 'px';
                tooltip.classList.add('visible');
            } else if (tooltip) {
                tooltip.classList.remove('visible');
            }
        }
    });

    canvas.addEventListener('mouseleave', () => {
        hoveredNode = null;
        if (tooltip) tooltip.classList.remove('visible');
    });

    // Cluster filter buttons
    document.querySelectorAll('.cluster-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const cluster = btn.dataset.cluster;
            document.querySelectorAll('.cluster-btn').forEach(b => b.classList.remove('active'));
            if (activeCluster === cluster) {
                activeCluster = null;
            } else {
                activeCluster = cluster;
                btn.classList.add('active');
            }
        });
    });

    resize();
    window.addEventListener('resize', () => {
        cancelAnimationFrame(rafPulse);
        rafPulse = null;
        resize();
    });
}




/* ════════════════════════════════════════════════════════════════════════════
   12. PROJECT FILTER
   ════════════════════════════════════════════════════════════════════════════ */
function initProjectFilter() {
    const btns = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.project-card');
    if (!btns.length || !cards.length) return;

    // helper that actually shows/hides cards according to filter
    function applyFilter(filter, animate = true) {
        cards.forEach(card => {
            const match = filter === 'ALL' || card.dataset.category === filter;
            if (match) {
                card.classList.remove('hidden');
                // make sure reveal animation won't keep it invisible
                card.classList.add('in-view');
                if (animate && typeof gsap !== 'undefined') {
                    gsap.fromTo(card, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.4, ease: 'power2.out' });
                } else {
                    card.style.opacity = 1;
                    card.style.transform = '';
                }
            } else {
                card.classList.add('hidden');
            }
        });
    }

    btns.forEach(btn => {
        btn.addEventListener('click', () => {
            btns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            applyFilter(btn.dataset.filter);
        });
    });

    // apply whichever filter is already marked active (usually "ALL")
    const initial = document.querySelector('.filter-btn.active');
    if (initial) {
        applyFilter(initial.dataset.filter, false);
    }
}

/* ════════════════════════════════════════════════════════════════════════════
   13. DOSSIER OVERLAY
   ════════════════════════════════════════════════════════════════════════════ */
function initDossierOverlay() {
    const overlay = document.getElementById('dossier-overlay');
    const content = document.getElementById('dossier-content');
    const closeBtn = document.getElementById('dossier-close');
    if (!overlay || !content) return;

    const projects = window.PROJECTS_DATA || [];

    function openDossier(id) {
        const proj = projects.find(p => p.id === id);
        if (!proj) return;

        const statusLabel = proj.status.replace('_', ' ');
        content.innerHTML = `
            <span class="dossier-tag">MISSION DOSSIER // ${proj.id.toUpperCase()}</span>
            <h2 class="dossier-title">${escHtml(proj.title)}</h2>
            <div class="dossier-meta">
                <div class="dossier-meta-item"><strong>CLEARANCE</strong><span>${escHtml(proj.clearance)}</span></div>
                <div class="dossier-meta-item"><strong>STATUS</strong><span>${escHtml(statusLabel)}</span></div>
                <div class="dossier-meta-item"><strong>CATEGORY</strong><span>${escHtml(proj.category)}</span></div>
            </div>
            <p class="dossier-body">${escHtml(proj.details)}</p>
            <div class="dossier-stack">
                ${proj.tags.map(t => `<span class="dossier-stack-tag">${escHtml(t)}</span>`).join('')}
            </div>
            <div class="dossier-links">
                <a href="${escHtml(proj.demo_url)}" class="dossier-link" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15,3 21,3 21,9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    LIVE DEMO
                </a>
                <a href="${escHtml(proj.code_url)}" class="dossier-link" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
                    SOURCE CODE
                </a>
            </div>
        `;
        overlay.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeDossier() {
        overlay.classList.remove('open');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.project-card').forEach(card => {
        card.addEventListener('click', () => openDossier(card.dataset.id));
    });

    closeBtn && closeBtn.addEventListener('click', closeDossier);
    overlay.addEventListener('click', e => { if (e.target === overlay) closeDossier(); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeDossier(); });
}

function escHtml(str) {
    const d = document.createElement('div');
    d.textContent = str;
    return d.innerHTML;
}

/* ════════════════════════════════════════════════════════════════════════════
   14. RECOMMENDATIONS CAROUSEL (momentum)
   ════════════════════════════════════════════════════════════════════════════ */
function initCarousel() {
    const track = document.getElementById('carousel-track');
    const prevBtn = document.getElementById('carousel-prev');
    const nextBtn = document.getElementById('carousel-next');
    const dots = document.querySelectorAll('.carousel-dot');
    if (!track) return;

    let current = 0;
    const cards = track.querySelectorAll('.debrief-card');
    if (!cards.length) return;

    function goTo(idx) {
        current = Math.max(0, Math.min(idx, cards.length - 1));
        const card = cards[0];
        const cardW = card.offsetWidth + 24; // gap
        const offset = -current * cardW;

        if (typeof gsap !== 'undefined') {
            gsap.to(track, { x: offset, duration: 0.6, ease: 'power3.out' });
        } else {
            track.style.transform = `translateX(${offset}px)`;
        }
        dots.forEach((d, i) => d.classList.toggle('active', i === current));
    }

    prevBtn && prevBtn.addEventListener('click', () => goTo(current - 1));
    nextBtn && nextBtn.addEventListener('click', () => goTo(current + 1));
    dots.forEach((d, i) => d.addEventListener('click', () => goTo(i)));

    // Drag / touch
    let startX = 0, dragging = false;
    track.addEventListener('pointerdown', e => { startX = e.clientX; dragging = true; track.setPointerCapture(e.pointerId); });
    track.addEventListener('pointermove', e => { if (!dragging) return; });
    track.addEventListener('pointerup', e => {
        if (!dragging) return;
        dragging = false;
        const dx = e.clientX - startX;
        if (Math.abs(dx) > 50) goTo(dx < 0 ? current + 1 : current - 1);
    });

    window.addEventListener('resize', () => goTo(current));
}

/* ════════════════════════════════════════════════════════════════════════════
   15. NAV ACTIVE SECTION INDICATOR
   ════════════════════════════════════════════════════════════════════════════ */
function initNavIndicator() {
    const navLinks = document.querySelectorAll('.nav-link');
    const indicator = document.getElementById('nav-indicator');
    const sections = document.querySelectorAll('section[id]');
    if (!navLinks.length) return;

    function setActive(id) {
        navLinks.forEach(link => {
            const active = link.dataset.section === id;
            link.classList.toggle('active', active);
            if (active && indicator) {
                const rect = link.getBoundingClientRect();
                const navRect = link.closest('nav').getBoundingClientRect();
                indicator.style.left = (rect.left - navRect.left) + 'px';
                indicator.style.width = rect.width + 'px';
            }
        });
    }

    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) setActive(e.target.id);
        });
    }, { threshold: 0.4, rootMargin: '-80px 0px -60% 0px' });

    sections.forEach(s => obs.observe(s));
}

/* ════════════════════════════════════════════════════════════════════════════
   16. CONTACT AJAX FORM
   ════════════════════════════════════════════════════════════════════════════ */
function initContactForm() {
    const form = document.getElementById('contact-form');
    const btn = document.getElementById('form-submit');
    const status = document.getElementById('form-status');
    if (!form) return;

    form.addEventListener('submit', async e => {
        e.preventDefault();
        if (btn) { btn.disabled = true; btn.querySelector('span').textContent = 'TRANSMITTING...'; }
        if (status) { status.className = 'form-status'; status.style.display = 'none'; }

        const body = new FormData(form);

        try {
            const resp = await fetch('ajax_contact.php', { method: 'POST', body });
            const text = await resp.text();
            let ok = resp.ok && text.toLowerCase().includes('success');
            if (status) {
                status.className = 'form-status ' + (ok ? 'success' : 'error');
                status.textContent = ok ? '> TRANSMISSION RECEIVED. I\'ll respond within 24h.' : '> SIGNAL LOST. Please try again or email directly.';
            }
            if (ok) form.reset();
        } catch {
            if (status) {
                status.className = 'form-status error';
                status.textContent = '> CONNECTION FAILED. Check your network.';
            }
        } finally {
            if (btn) { btn.disabled = false; btn.querySelector('span').textContent = 'TRANSMIT MESSAGE'; }
        }
    });
}

/* ════════════════════════════════════════════════════════════════════════════
   17. FOOTER RADAR PING
   ════════════════════════════════════════════════════════════════════════════ */
function initRadarPing() {
    document.querySelectorAll('.footer-social[data-radar]').forEach(el => {
        const canvas = el.querySelector('.radar-canvas');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        let animId, hovering = false;

        function resize() {
            canvas.width = el.offsetWidth;
            canvas.height = el.offsetHeight;
        }
        resize();

        let radius = 0, alpha = 0;

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            if (!hovering && radius > canvas.width) return;
            ctx.save();
            ctx.strokeStyle = `rgba(0, 212, 255, ${alpha})`;
            ctx.lineWidth = 1.5;
            ctx.beginPath();
            ctx.arc(canvas.width / 2, canvas.height / 2, radius, 0, Math.PI * 2);
            ctx.stroke();
            ctx.restore();
            radius += 1.2;
            alpha = Math.max(0, 0.7 - radius / (canvas.width * 0.9));
            animId = requestAnimationFrame(draw);
        }

        el.addEventListener('mouseenter', () => {
            hovering = true;
            cancelAnimationFrame(animId);
            radius = 0; alpha = 0.7;
            draw();
        });
        el.addEventListener('mouseleave', () => {
            hovering = false;
        });
    });
}

/* ════════════════════════════════════════════════════════════════════════════
   18. MOBILE NAV TOGGLE
   ════════════════════════════════════════════════════════════════════════════ */
function initMobileNav() {
    const toggle = document.getElementById('nav-toggle');
    const nav = document.getElementById('header-nav');
    if (!toggle || !nav) return;

    toggle.addEventListener('click', () => {
        const expanded = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', String(!expanded));
        nav.classList.toggle('open');
    });

    nav.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('open');
            toggle.setAttribute('aria-expanded', 'false');
        });
    });
}
