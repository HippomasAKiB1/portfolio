<?php
/**
 * intro.php — Cinematic splash / welcome screen
 */
?>
<div id="intro-screen" aria-label="Welcome">
    <canvas id="particle-canvas" aria-hidden="true"></canvas>
    <div class="intro-content">
        <p class="intro-label">PORTFOLIO // ONLINE</p>
        <h1 class="intro-title">
            <span class="intro-name"><?php echo htmlspecialchars(SITE_NAME); ?></span>
        </h1>
        <p class="intro-subtitle">ML Engineer</p>
        <button id="enter-btn" aria-label="Enter portfolio">
            <span class="enter-bracket">[</span>
            <span class="enter-text">ENTER</span>
            <span class="enter-bracket">]</span>
        </button>
    </div>
    <div class="intro-scan" aria-hidden="true"></div>
</div>
