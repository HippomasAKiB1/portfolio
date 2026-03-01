<?php
/**
 * portfolio_model.php
 * Pure data functions — enriched for the sci-fi portfolio redesign.
 */

// ── Hero section ──────────────────────────────────────────────────────────────
function get_hero_data() {
    return [
        'name'   => 'AKIB',
        'roles'  => [
            'Problem Solver',
            'Full Stack Developer',
            'Data Analyst',
            'ML Engineer',
            'Esports Enthusiast',
        ],
        'cta_primary'   => 'VIEW MY WORK',
        'cta_secondary' => 'CONTACT ME',
        'stat_card' => [
            ['label' => 'ROLE',      'value' => 'ML Engineer'],
            ['label' => 'STATUS',    'value' => 'Open to Work'],
            ['label' => 'SPECIALTY', 'value' => 'Problem Solving'],
            ['label' => 'BASE',      'value' => 'Dhaka, BD'],
            ['label' => 'XP',        'value' => '3+ Years'],
        ],
    ];
}

// ── Education section ─────────────────────────────────────────────────────────
function get_education_data() {
    return [
        [
            'code'        => 'EDU-001',
            'title'       => 'Bachelor of Science in Computer Science & Engineering',
            'institution' => 'American International University Bangladesh (AIUB)',
            'year'        => '2022 – Present',
            'description' => 'Core CS curriculum with majors in Machine Learning, Data Science, Human Computer Interaction, Computer Vision & Pattern Recognition, and Natural Language Processing.',
            'tags'        => ['Core CS', 'Machine Learning', 'Data Science', 'HCI', 'Computer Vision', 'NLP'],
        ],
    ];
}

// ── Skills section ────────────────────────────────────────────────────────────
function get_skills_data() {
    return [
        // DATA cluster
        ['name' => 'Python',        'cluster' => 'DATA',    'proficiency' => 93, 'level' => 'Expert',    'desc' => 'Data pipelines, EDA, scripting & ML workflows'],
        ['name' => 'SQL',           'cluster' => 'DATA',    'proficiency' => 88, 'level' => 'Advanced',  'desc' => 'Complex queries, joins, optimization & schema design'],
        ['name' => 'Pandas',        'cluster' => 'DATA',    'proficiency' => 87, 'level' => 'Advanced',  'desc' => 'DataFrame manipulation, cleaning & analysis'],
        ['name' => 'Sheets/Excel',  'cluster' => 'DATA',    'proficiency' => 85, 'level' => 'Advanced',  'desc' => 'Pivot tables, dashboards & data reporting'],
        ['name' => 'D3.js',         'cluster' => 'DATA',    'proficiency' => 72, 'level' => 'Proficient','desc' => 'Interactive & animated data visualizations'],
        // CODE cluster
        ['name' => 'C++',           'cluster' => 'CODE',    'proficiency' => 80, 'level' => 'Advanced',  'desc' => 'Systems programming, OOP & competitive coding'],
        ['name' => 'C#',            'cluster' => 'CODE',    'proficiency' => 75, 'level' => 'Proficient','desc' => '.NET development & game scripting with Unity'],
        ['name' => 'Java',          'cluster' => 'CODE',    'proficiency' => 78, 'level' => 'Proficient','desc' => 'OOP, data structures & backend applications'],
        ['name' => 'Python',        'cluster' => 'CODE',    'proficiency' => 93, 'level' => 'Expert',    'desc' => 'Scripting, automation & full-stack ML apps'],
        ['name' => 'PHP',           'cluster' => 'CODE',    'proficiency' => 82, 'level' => 'Advanced',  'desc' => 'MVC backends, REST APIs & server scripting'],
        ['name' => 'JavaScript',    'cluster' => 'CODE',    'proficiency' => 90, 'level' => 'Expert',    'desc' => 'ES2024+, async, canvas, DOM & Web APIs'],
        // ML/AI cluster
        ['name' => 'TensorFlow',    'cluster' => 'ML/AI',   'proficiency' => 82, 'level' => 'Advanced',  'desc' => 'Deep learning model training & deployment'],
        ['name' => 'PyTorch',       'cluster' => 'ML/AI',   'proficiency' => 78, 'level' => 'Proficient','desc' => 'Research-grade neural networks & custom training loops'],
        ['name' => 'Scikit-learn',  'cluster' => 'ML/AI',   'proficiency' => 88, 'level' => 'Advanced',  'desc' => 'Classification, regression, clustering & pipelines'],
        ['name' => 'OpenCV',        'cluster' => 'ML/AI',   'proficiency' => 75, 'level' => 'Proficient','desc' => 'Computer vision & real-time image processing'],
        ['name' => 'YOLO',          'cluster' => 'ML/AI',   'proficiency' => 72, 'level' => 'Proficient','desc' => 'Real-time object detection & model fine-tuning'],
        // TOOLS cluster
        ['name' => 'Git',           'cluster' => 'TOOLS',   'proficiency' => 92, 'level' => 'Expert',    'desc' => 'Version control, branching & collaborative workflow'],
        ['name' => 'MySQL',         'cluster' => 'TOOLS',   'proficiency' => 87, 'level' => 'Advanced',  'desc' => 'Relational DB design, queries & optimization'],
        ['name' => 'Docker',        'cluster' => 'TOOLS',   'proficiency' => 74, 'level' => 'Proficient','desc' => 'Containerization, compose & deployment pipelines'],
        ['name' => 'FastAPI',       'cluster' => 'TOOLS',   'proficiency' => 80, 'level' => 'Advanced',  'desc' => 'High-performance async REST API development'],
        ['name' => 'Flask',         'cluster' => 'TOOLS',   'proficiency' => 83, 'level' => 'Advanced',  'desc' => 'Lightweight web APIs & ML model serving'],
        // ESPORTS cluster
        ['name' => 'LeagueOps',     'cluster' => 'ESPORTS', 'proficiency' => 92, 'level' => 'Expert',    'desc' => 'Tournament operations, scheduling & competitive league management'],
        ['name' => 'Broadcast',     'cluster' => 'ESPORTS', 'proficiency' => 85, 'level' => 'Advanced',  'desc' => 'Live stream production, overlays & broadcast direction'],
        ['name' => 'Management',    'cluster' => 'ESPORTS', 'proficiency' => 88, 'level' => 'Advanced',  'desc' => 'Team management, coaching coordination & performance strategy'],
    ];
}

// ── Projects section ──────────────────────────────────────────────────────────
function get_projects_data() {
    return [
        [
            'id'          => 'proj-001',
            'emoji'       => '🤖',
            'title'       => 'AI-Powered Dashboard',
            'description' => 'Analytics dashboard with ML predictions and real-time data visualisation.',
            'details'     => 'Built an end-to-end analytics platform featuring ML-powered forecasting using TensorFlow, interactive D3.js charts, and a Flask REST API backend. Deployed on AWS EC2 with Docker.',
            'tags'        => ['Python', 'TensorFlow', 'D3.js', 'Flask'],
            'category'    => 'ML',
            'status'      => 'COMPLETED',
            'clearance'   => 'ALPHA',
            'demo_url'    => '#',
            'code_url'    => '#',
        ],
        [
            'id'          => 'proj-002',
            'emoji'       => '💼',
            'title'       => 'E-Commerce Platform',
            'description' => 'Full-featured commerce solution with real-time inventory and Stripe payments.',
            'details'     => 'Engineered a scalable e-commerce platform with React frontend, Node.js/Express backend, MongoDB database, Stripe payment integration, and a real-time inventory management system using WebSockets.',
            'tags'        => ['React', 'Node.js', 'Stripe', 'MongoDB'],
            'category'    => 'Web',
            'status'      => 'COMPLETED',
            'clearance'   => 'BETA',
            'demo_url'    => '#',
            'code_url'    => '#',
        ],
        [
            'id'          => 'proj-003',
            'emoji'       => '📊',
            'title'       => 'Esports Analytics Engine',
            'description' => 'Data pipeline for processing match statistics and generating performance reports.',
            'details'     => 'Designed a complete data pipeline that ingests match data from public APIs, processes player performance metrics with Pandas, and generates automated scouting reports with visualized stats.',
            'tags'        => ['Python', 'Pandas', 'SQL', 'Data Viz'],
            'category'    => 'Data',
            'status'      => 'COMPLETED',
            'clearance'   => 'BETA',
            'demo_url'    => '#',
            'code_url'    => '#',
        ],
        [
            'id'          => 'proj-004',
            'emoji'       => '🎮',
            'title'       => 'Player Performance Predictor',
            'description' => 'ML model predicting esports player performance from historical game data.',
            'details'     => 'Trained a gradient boosting model on thousands of match records to predict player performance ratings. Features include stat normalization, cross-validation, and a Streamlit dashboard for live predictions.',
            'tags'        => ['Scikit-learn', 'Python', 'Streamlit', 'ML'],
            'category'    => 'Esports',
            'status'      => 'IN_PROGRESS',
            'clearance'   => 'CLASSIFIED',
            'demo_url'    => '#',
            'code_url'    => '#',
        ],
        [
            'id'          => 'proj-005',
            'emoji'       => '🌐',
            'title'       => 'Creative Animation Studio',
            'description' => 'Interactive web platform with WebGL effects and 3D canvas transformations.',
            'details'     => 'Built an interactive canvas-based animation playground using Three.js and GSAP, featuring particle systems, shader programs, and real-time user-controlled visual experiences.',
            'tags'        => ['Three.js', 'WebGL', 'Canvas', 'GSAP'],
            'category'    => 'Web',
            'status'      => 'COMPLETED',
            'clearance'   => 'ALPHA',
            'demo_url'    => '#',
            'code_url'    => '#',
        ],
        [
            'id'          => 'proj-006',
            'emoji'       => '🧠',
            'title'       => 'NLP Sentiment Analyzer',
            'description' => 'Natural language processing tool for real-time social media sentiment analysis.',
            'details'     => 'Developed a BERT-based sentiment analysis tool that processes streaming social media data, classifies sentiment in real-time, and visualizes trends on an interactive dashboard with alerting capabilities.',
            'tags'        => ['Python', 'BERT', 'NLP', 'TensorFlow'],
            'category'    => 'ML',
            'status'      => 'IN_PROGRESS',
            'clearance'   => 'CLASSIFIED',
            'demo_url'    => '#',
            'code_url'    => '#',
        ],
    ];
}

// ── Testimonials / Recommendations section ────────────────────────────────────
function get_testimonials_data() {
    return [
        [
            'text'         => 'AKIB is an exceptional developer with a keen eye for design. Delivered projects that were not only technically sound but visually stunning. A true professional.',
            'author'       => 'Sarah Johnson',
            'title'        => 'Senior Project Manager',
            'relationship' => 'Direct Supervisor',
            'company'      => 'TechCorp Ltd.',
        ],
        [
            'text'         => 'Working with AKIB on our analytics platform was a game-changer. The innovative ML approach transformed our data into actionable insights we never thought possible.',
            'author'       => 'Michael Chen',
            'title'        => 'Chief Executive Officer',
            'relationship' => 'Client',
            'company'      => 'DataVenture Inc.',
        ],
        [
            'text'         => 'The interactive visualizations AKIB built elevated our brand presence significantly. Deep technical knowledge combined with creative instincts — rare combination. Highly recommended.',
            'author'       => 'Emma Williams',
            'title'        => 'Head of Design',
            'relationship' => 'Collaborator',
            'company'      => 'PixelForge Studio',
        ],
        [
            'text'         => "AKIB's full-stack expertise and problem-solving under pressure made them invaluable to our dev team. Consistently delivered beyond expectations on every sprint.",
            'author'       => 'David Roberts',
            'title'        => 'Technical Director',
            'relationship' => 'Team Lead',
            'company'      => 'NextLevel Systems',
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
        ['label' => 'HERO',      'tag' => 'SEC.01', 'id' => 'hero'],
        ['label' => 'EDUCATION', 'tag' => 'SEC.02', 'id' => 'education'],
        ['label' => 'SKILLS',    'tag' => 'SEC.03', 'id' => 'skills'],
        ['label' => 'PROJECTS',  'tag' => 'SEC.04', 'id' => 'projects'],
        ['label' => 'FIELD RPT', 'tag' => 'SEC.05', 'id' => 'recommendations'],
        ['label' => 'CONTACT',   'tag' => 'SEC.06', 'id' => 'contact'],
    ];
}

// ── Social links ──────────────────────────────────────────────────────────────
function get_social_links() {
    return [
        ['icon' => 'message-circle', 'url' => SOCIAL_DISCORD,  'title' => 'Discord'],
        ['icon' => 'linkedin',       'url' => SOCIAL_LINKEDIN, 'title' => 'LinkedIn'],
        ['icon' => 'facebook',       'url' => SOCIAL_FACEBOOK, 'title' => 'Facebook'],
    ];
}
