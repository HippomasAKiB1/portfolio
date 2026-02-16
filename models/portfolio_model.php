<?php
/**
 * Portfolio Model
 * Contains functions to retrieve portfolio data
 */

// Get education data
function get_education_data() {
    return array(
        array(
            'title' => 'Bachelor of Science in Computer Science',
            'year' => '2018 - 2022',
            'description' => 'University of Technology, Advanced Studies in Web Development, Machine Learning, and Software Engineering.'
        ),
        array(
            'title' => 'Certified Full Stack Developer',
            'year' => '2022 - 2023',
            'description' => 'Professional certification covering React, Node.js, MongoDB, and modern web development practices.'
        ),
        array(
            'title' => 'Advanced Web Design & UX Certification',
            'year' => '2023 - Present',
            'description' => 'Specialized training in UI/UX design, animation, and interactive web experiences.'
        )
    );
}

// Get skills data
function get_skills_data() {
    return array(
        array(
            'name' => 'React',
            'icon' => 'fab fa-react',
            'description' => 'Component-based UI development with hooks and state management',
            'proficiency' => 95
        ),
        array(
            'name' => 'Node.js',
            'icon' => 'fab fa-node',
            'description' => 'Server-side development and backend API creation',
            'proficiency' => 90
        ),
        array(
            'name' => 'Databases',
            'icon' => 'fas fa-database',
            'description' => 'MongoDB, PostgreSQL, and Firebase expertise',
            'proficiency' => 88
        ),
        array(
            'name' => 'JavaScript',
            'icon' => 'fab fa-js',
            'description' => 'Advanced ES6+, async programming, and DOM manipulation',
            'proficiency' => 85
        ),
        array(
            'name' => 'CSS & Design',
            'icon' => 'fab fa-css3',
            'description' => 'Advanced animations, responsive design, and UI frameworks',
            'proficiency' => 92
        ),
        array(
            'name' => 'UX/Design',
            'icon' => 'fas fa-paint-brush',
            'description' => 'Figma, Adobe Suite, and interaction design',
            'proficiency' => 87
        )
    );
}

// Get projects data
function get_projects_data() {
    return array(
        array(
            'emoji' => '💼',
            'title' => 'E-Commerce Platform',
            'description' => 'A full-featured e-commerce solution with real-time inventory management and payment integration.',
            'tags' => array('React', 'Node.js', 'Stripe'),
            'demo_url' => '#',
            'code_url' => '#'
        ),
        array(
            'emoji' => '🎨',
            'title' => 'Creative Animation Studio',
            'description' => 'Interactive web platform showcasing animated designs with WebGL effects and 3D transformations.',
            'tags' => array('Three.js', 'WebGL', 'Canvas'),
            'demo_url' => '#',
            'code_url' => '#'
        ),
        array(
            'emoji' => '🚀',
            'title' => 'AI-Powered Dashboard',
            'description' => 'Analytics dashboard with machine learning predictions and real-time data visualization.',
            'tags' => array('Python', 'TensorFlow', 'D3.js'),
            'demo_url' => '#',
            'code_url' => '#'
        )
    );
}

// Get testimonials data
function get_testimonials_data() {
    return array(
        array(
            'text' => '"AKIB is an exceptional developer with a keen eye for design. The projects delivered were not only technically sound but visually stunning."',
            'author' => '- Sarah Johnson, Project Manager'
        ),
        array(
            'text' => '"Working with AKIB on our web platform was a game-changer. The attention to detail and innovative approach transformed our vision into reality."',
            'author' => '- Michael Chen, CEO'
        ),
        array(
            'text' => '"The interactive animations and smooth user experience created by AKIB elevated our brand presence significantly. Highly recommended!"',
            'author' => '- Emma Williams, Design Lead'
        ),
        array(
            'text' => '"AKIB\'s full-stack expertise and creative problem-solving skills made them invaluable to our development team."',
            'author' => '- David Roberts, Tech Director'
        )
    );
}

// Get hero section data
function get_hero_data() {
    return array(
        'name' => 'AKIB',
        'tagline' => 'Full Stack Developer & Creative Technologist',
        'cta_primary' => 'View My Work',
        'cta_secondary' => 'Get In Touch'
    );
}

// Get about section data
function get_about_data() {
    return array(
        'title' => 'About Me',
        'paragraphs' => array(
            'I\'m a passionate developer with a creative mindset, combining technical expertise with artistic vision to create stunning digital experiences.',
            'With expertise in web development, design, and emerging technologies, I transform ideas into interactive, user-friendly solutions that engage and inspire.',
            'My journey in tech has been driven by curiosity and a desire to push boundaries, creating work that not only functions beautifully but also tells a story.',
            'When I\'m not coding, you\'ll find me exploring new design trends, experimenting with new technologies, or contributing to open-source projects.'
        )
    );
}

// Get contact data
function get_contact_data() {
    return array(
        'email' => PORTFOLIO_EMAIL,
        'phone' => PORTFOLIO_PHONE,
        'location' => PORTFOLIO_LOCATION
    );
}

// Get navigation items
function get_navigation_items() {
    return array(
        array('label' => 'About', 'id' => 'about'),
        array('label' => 'Education', 'id' => 'education'),
        array('label' => 'Skills', 'id' => 'skills'),
        array('label' => 'Projects', 'id' => 'projects'),
        array('label' => 'Contact', 'id' => 'contact')
    );
}

// Get social links
function get_social_links() {
    return array(
        array('icon' => 'fab fa-github', 'url' => SOCIAL_GITHUB, 'title' => 'GitHub'),
        array('icon' => 'fab fa-linkedin', 'url' => SOCIAL_LINKEDIN, 'title' => 'LinkedIn'),
        array('icon' => 'fab fa-twitter', 'url' => SOCIAL_TWITTER, 'title' => 'Twitter'),
        array('icon' => 'fab fa-codepen', 'url' => SOCIAL_CODEPEN, 'title' => 'CodePen')
    );
}
