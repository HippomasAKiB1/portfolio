<?php
/**
 * Hero Section View
 */
?>
<section class="hero" id="hero">
    <div class="hero-content">
        <h1>Hi, I'm <?php echo $hero['name']; ?></h1>
        <p><?php echo $hero['tagline']; ?></p>
        <div class="hero-buttons">
            <button class="btn btn-primary" onclick="scrollToSection('projects')"><?php echo $hero['cta_primary']; ?></button>
            <button class="btn btn-secondary" onclick="scrollToSection('contact')"><?php echo $hero['cta_secondary']; ?></button>
        </div>
    </div>
    <div class="scroll-indicator">
        <svg viewBox="0 0 24 24">
            <path d="M12 5v14M19 18l-7 7-7-7"/>
        </svg>
    </div>
</section>
