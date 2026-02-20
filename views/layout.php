<?php
/**
 * layout.php — Main HTML shell
 * Includes all sections in order and links assets.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo SITE_AUTHOR; ?> — <?php echo SITE_DESCRIPTION; ?>">
    <title><?php echo SITE_NAME; ?> | <?php echo SITE_DESCRIPTION; ?></title>

    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="<?php echo asset_css('styles.css'); ?>">
</head>
<body class="dark-mode">

    <!-- LOADING SCREEN -->
    <?php render_view('sections/loading', $data); ?>

    <!-- SCROLL PROGRESS BAR -->
    <div class="scroll-progress" id="scrollProgress"></div>

    <!-- INTRO / SPLASH PAGE -->
    <?php render_view('sections/intro', $data); ?>

    <!-- MAIN WEBSITE (hidden until user clicks Explore) -->
    <main id="main-content">

        <!-- HEADER & NAV -->
        <?php render_view('sections/header', $data); ?>

        <!-- HERO -->
        <?php render_view('sections/hero', $data); ?>

        <!-- ABOUT -->
        <?php render_view('sections/about', $data); ?>

        <!-- EDUCATION -->
        <?php render_view('sections/education', $data); ?>

        <!-- SKILLS -->
        <?php render_view('sections/skills', $data); ?>

        <!-- PROJECTS -->
        <?php render_view('sections/projects', $data); ?>

        <!-- TESTIMONIALS / RECOMMENDATIONS -->
        <?php render_view('sections/recommendations', $data); ?>

        <!-- CONTACT -->
        <?php render_view('sections/contact', $data); ?>

        <!-- FOOTER -->
        <?php render_view('sections/footer', $data); ?>

    </main>

    <!-- SCROLL-TO-TOP BUTTON -->
    <button class="scroll-to-top" id="scrollToTop" aria-label="Scroll to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Main JavaScript -->
    <script src="<?php echo asset_js('script.js'); ?>"></script>

</body>
</html>
