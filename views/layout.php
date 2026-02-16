<?php
/**
 * Main Layout View
 * Contains the HTML structure and includes all sections
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?> - <?php echo SITE_DESCRIPTION; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo asset('styles.css'); ?>">
</head>
<body class="dark-mode">

    <!-- LOADING SCREEN -->
    <?php render_view('sections/loading', $data); ?>

    <!-- SCROLL PROGRESS BAR -->
    <div class="scroll-progress" id="scrollProgress"></div>

    <!-- INTRO PAGE -->
    <?php render_view('sections/intro', $data); ?>

    <!-- MAIN WEBSITE -->
    <main>
        <!-- HEADER -->
        <?php render_view('sections/header', $data); ?>

        <!-- HERO SECTION -->
        <?php render_view('sections/hero', $data); ?>

        <!-- ABOUT SECTION -->
        <?php render_view('sections/about', $data); ?>

        <!-- EDUCATION SECTION -->
        <?php render_view('sections/education', $data); ?>

        <!-- SKILLS SECTION -->
        <?php render_view('sections/skills', $data); ?>

        <!-- PROJECTS SECTION -->
        <?php render_view('sections/projects', $data); ?>

        <!-- RECOMMENDATIONS SECTION -->
        <?php render_view('sections/recommendations', $data); ?>

        <!-- CONTACT SECTION -->
        <?php render_view('sections/contact', $data); ?>

        <!-- FOOTER -->
        <?php render_view('sections/footer', $data); ?>
    </main>

    <!-- SCROLL TO TOP BUTTON -->
    <button class="scroll-to-top" id="scrollToTop" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="<?php echo asset_js('script.js'); ?>"></script>
</body>
</html>
