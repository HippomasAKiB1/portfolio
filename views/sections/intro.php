<?php
/**
 * intro.php — Full-screen splash page shown after the loading screen
 */
?>
<div id="intro-page" aria-hidden="true">
    <!-- Interactive canvas particle animation (driven by JS) -->
    <canvas class="intro-canvas" id="introCanvas"></canvas>

    <div class="intro-content">
        <h1 class="intro-title"><?php echo htmlspecialchars($hero['name']); ?></h1>
        <p class="intro-subtitle"><?php echo htmlspecialchars($hero['typed_strings'][0]); ?></p>
        <button class="explore-btn" id="exploreBtn">
            Explore <i class="fas fa-arrow-right"></i>
        </button>
    </div>
</div>
