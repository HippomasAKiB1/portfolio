<?php
/**
 * portfolio_model.php
 * Pure data functions — no database yet, just PHP arrays.
 * Each function returns a structured array used by the views.
 */

// ── Hero section ──────────────────────────────────────────────────────────────
function get_hero_data() {
    return [
        'name'          => 'AKIB',
        // typed_strings cycle through in the hero typed-text effect
        'typed_strings' => [
            'Full Stack Developer',
            'Creative Technologist',
            'UI/UX Enthusiast',
            'Open Source Contributor',
        ],
        'cta_primary'   => 'View My Work',
        'cta_secondary' => 'Get In Touch',
    ];
}

// ── About section ─────────────────────────────────────────────────────────────
function get_about_data() {
    return [
        'title'      => 'About Me',
        'paragraphs' => [
            "I'm a passionate developer with a creative mindset, combining technical expertise with artistic vision to build stunning digital products.",
            "I specialise in modern web development, UI/UX design, and emerging technologies — turning ideas into fast, interactive, user-friendly experiences.",
            "My work is driven by curiosity: I push boundaries, write clean code, and constantly explore the next wave of tech.",
            "Outside of code you'll find me experimenting with new design trends, contributing to open-source, or just making cool stuff.",
        ],
        // Quick-stat numbers displayed under the bio
        'stats' => [
            ['value' => '3+',  'label' => 'Years Experience'],
            ['value' => '20+', 'label' => 'Projects Built'],
            ['value' => '10+', 'label' => 'Happy Clients'],
            ['value' => '5+',  'label' => 'Open Source Repos'],
        ],
    ];
}

// ── Education section ─────────────────────────────────────────────────────────
function get_education_data() {
    return [
        [
            'icon'        => 'fas fa-graduation-cap',
            'title'       => 'Bachelor of Science in Computer Science',
            'institution' => 'University of Technology',
            'year'        => '2018 – 2022',
            'description' => 'Advanced studies in Web Development, Machine Learning, and Software Engineering.',
        ],
        [
            'icon'        => 'fas fa-certificate',
            'title'       => 'Certified Full Stack Developer',
            'institution' => 'Professional Certification Program',
            'year'        => '2022 – 2023',
            'description' => 'Covered React, Node.js, MongoDB, and modern web development practices.',
        ],
        [
            'icon'        => 'fas fa-paint-brush',
            'title'       => 'Advanced Web Design & UX',
            'institution' => 'Design Institute',
            'year'        => '2023 – Present',
            'description' => 'Specialised training in UI/UX design, micro-animations, and interactive web experiences.',
        ],
    ];
}

// ── Skills section ────────────────────────────────────────────────────────────
function get_skills_data() {
    return [
        [
            'name'        => 'React',
            'icon'        => 'fab fa-react',
            'description' => 'Component-based UI with hooks and modern state management',
            'proficiency' => 90,
        ],
        [
            'name'        => 'Node.js',
            'icon'        => 'fab fa-node-js',
            'description' => 'Server-side JavaScript and RESTful API development',
            'proficiency' => 85,
        ],
        [
            'name'        => 'Databases',
            'icon'        => 'fas fa-database',
            'description' => 'MySQL, MongoDB, PostgreSQL — design to optimisation',
            'proficiency' => 80,
        ],
        [
            'name'        => 'JavaScript',
            'icon'        => 'fab fa-js',
            'description' => 'ES2024+, async/await, DOM, Canvas, Web APIs',
            'proficiency' => 92,
        ],
        [
            'name'        => 'CSS & Design',
            'icon'        => 'fab fa-css3-alt',
            'description' => 'Advanced animations, CSS Grid/Flexbox, responsive design',
            'proficiency' => 88,
        ],
        [
            'name'        => 'PHP',
            'icon'        => 'fab fa-php',
            'description' => 'Procedural and MVC-style backend development',
            'proficiency' => 82,
        ],
    ];
}

// ── Projects section ──────────────────────────────────────────────────────────
function get_projects_data() {
    return [
        [
            'emoji'       => '💼',
            'title'       => 'E-Commerce Platform',
            'description' => 'Full-featured e-commerce solution with real-time inventory management and Stripe payment integration.',
            'tags'        => ['React', 'Node.js', 'Stripe', 'MongoDB'],
            'demo_url'    => '#',
            'code_url'    => '#',
        ],
        [
            'emoji'       => '🎨',
            'title'       => 'Creative Animation Studio',
            'description' => 'Interactive web platform showcasing animated designs with WebGL effects and 3D canvas transformations.',
            'tags'        => ['Three.js', 'WebGL', 'Canvas', 'GSAP'],
            'demo_url'    => '#',
            'code_url'    => '#',
        ],
        [
            'emoji'       => '🚀',
            'title'       => 'AI-Powered Dashboard',
            'description' => 'Analytics dashboard with ML predictions and real-time data visualisation using D3.js.',
            'tags'        => ['Python', 'TensorFlow', 'D3.js', 'Flask'],
            'demo_url'    => '#',
            'code_url'    => '#',
        ],
    ];
}

// ── Testimonials section ──────────────────────────────────────────────────────
function get_testimonials_data() {
    return [
        [
            'text'   => 'AKIB is an exceptional developer with a keen eye for design. Delivered projects that were not only technically sound but visually stunning.',
            'author' => 'Sarah Johnson',
            'role'   => 'Project Manager',
        ],
        [
            'text'   => 'Working with AKIB on our platform was a game-changer. The innovative approach transformed our vision into reality.',
            'author' => 'Michael Chen',
            'role'   => 'CEO',
        ],
        [
            'text'   => 'The interactive animations AKIB built elevated our brand presence significantly. Highly recommended!',
            'author' => 'Emma Williams',
            'role'   => 'Design Lead',
        ],
        [
            'text'   => "AKIB's full-stack expertise and creative problem-solving skills made them invaluable to our dev team.",
            'author' => 'David Roberts',
            'role'   => 'Tech Director',
        ],
    ];
}

// ── Contact section ───────────────────────────────────────────────────────────
function get_contact_data() {
    return [
        'email'    => PORTFOLIO_EMAIL,
        'phone'    => PORTFOLIO_PHONE,
        'location' => PORTFOLIO_LOCATION,
    ];
}

// ── Navigation items ──────────────────────────────────────────────────────────
function get_navigation_items() {
    return [
        ['label' => 'About',    'id' => 'about'],
        ['label' => 'Education','id' => 'education'],
        ['label' => 'Skills',   'id' => 'skills'],
        ['label' => 'Projects', 'id' => 'projects'],
        ['label' => 'Contact',  'id' => 'contact'],
    ];
}

// ── Social links ──────────────────────────────────────────────────────────────
function get_social_links() {
    return [
        ['icon' => 'fab fa-github',   'url' => SOCIAL_GITHUB,   'title' => 'GitHub'],
        ['icon' => 'fab fa-linkedin', 'url' => SOCIAL_LINKEDIN, 'title' => 'LinkedIn'],
        ['icon' => 'fab fa-twitter',  'url' => SOCIAL_TWITTER,  'title' => 'Twitter / X'],
        ['icon' => 'fab fa-codepen',  'url' => SOCIAL_CODEPEN,  'title' => 'CodePen'],
    ];
}
