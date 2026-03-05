<?php
/**
 * layout.php — Main HTML shell (sci-fi portfolio redesign)
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo SITE_AUTHOR; ?> — Problem Solver, Developer, Data Analyst, ML Engineer & Esports Enthusiast">
    <title><?php echo SITE_NAME; ?> // PORTFOLIO</title>

    <!-- Google Fonts: Barlow Condensed + JetBrains Mono + Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,300;0,400;0,600;0,700;0,900;1,700&family=JetBrains+Mono:wght@300;400;500;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Preconnect to CDNs -->
    <link rel="preconnect" href="https://unpkg.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="<?php echo asset_css('styles.css'); ?>">
</head>
<body>

    <!-- ░░ CUSTOM CURSOR ░░ -->
    <div id="cursor-ring"></div>
    <div id="cursor-dot"></div>

    <!-- ░░ NOISE GRAIN OVERLAY ░░ -->
    <div id="noise-overlay" aria-hidden="true"></div>

    <!-- ░░ LOADING SCREEN ░░ -->
    <?php render_view('sections/loading', $data); ?>

    <!-- ░░ INTRO / CINEMATIC SPLASH ░░ -->
    <?php render_view('sections/intro', $data); ?>

    <!-- ░░ MAIN SITE (revealed after ENTER) ░░ -->
    <div id="main-site">

        <!-- STICKY HEADER / NAV -->
        <?php render_view('sections/header', $data); ?>

        <main>
            <!-- HERO -->
            <?php render_view('sections/hero', $data); ?>

            <!-- EDUCATION -->
            <?php render_view('sections/education', $data); ?>

            <!-- SKILLS -->
            <?php render_view('sections/skills', $data); ?>

            <!-- PROJECTS -->
            <?php render_view('sections/projects', $data); ?>

            <!-- RECOMMENDATIONS / FIELD REPORTS -->
            <?php render_view('sections/recommendations', $data); ?>

            <!-- CONTACT -->
            <?php render_view('sections/contact', $data); ?>
        </main>

        <!-- FOOTER -->
        <?php render_view('sections/footer', $data); ?>

    </div><!-- /#main-site -->

    <!-- ░░ DOSSIER OVERLAY (project detail modal) ░░ -->
    <div id="dossier-overlay" role="dialog" aria-modal="true" aria-label="Project Dossier">
        <div id="dossier-inner">
            <button id="dossier-close" aria-label="Close dossier">
                <i data-lucide="x"></i>
            </button>
            <div id="dossier-content"></div>
        </div>
    </div>

    <!-- ░░ LIBRARIES ░░ -->
    <!-- Lenis smooth scroll -->
    <script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script>
    <!-- GSAP + ScrollTrigger -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <!-- Three.js -->
    <script src="https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.min.js"></script>

    <!-- Portfolio data for JS -->
    <script>
        var PORTFOLIO = <?php echo json_encode([
            'name'     => $hero['name'],
            'roles'    => $hero['roles'],
            'projects' => $projects,
            'skills'   => $skills,
        ]); ?>;
    </script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <!-- Main JavaScript -->
    <script defer src="<?php echo asset_js('script.js'); ?>"></script>

</body>
</html>
