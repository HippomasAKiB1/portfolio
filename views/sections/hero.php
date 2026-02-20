<?php
/**
 * hero.php — Full-viewport hero section
 * Features a typed-text animation driven by JS using the PHP data below.
 */

// Pass typed strings to JS as a JSON array
$typed_strings_json = json_encode($hero['typed_strings']);
?>
<section class="hero" id="hero">
    <div class="hero-content">
        <!-- Main name heading -->
        <h1 class="hero-name">
            Hi, I'm <span class="highlight"><?php echo htmlspecialchars($hero['name']); ?></span>
        </h1>

        <!-- Typed text: JS cycles through the strings from PHP -->
        <p class="hero-tagline">
            <span id="typed-text"></span><span class="typed-cursor">|</span>
        </p>

        <!-- CTA buttons -->
        <div class="hero-buttons">
            <a href="#projects" class="btn btn-primary" data-scroll="projects">
                <?php echo htmlspecialchars($hero['cta_primary']); ?>
            </a>
            <a href="#contact" class="btn btn-secondary" data-scroll="contact">
                <?php echo htmlspecialchars($hero['cta_secondary']); ?>
            </a>
        </div>

        <!-- Social links row -->
        <div class="hero-social">
            <?php foreach ($social_links as $link): ?>
                <a href="<?php echo htmlspecialchars($link['url']); ?>"
                   class="hero-social-link"
                   target="_blank"
                   rel="noopener noreferrer"
                   title="<?php echo htmlspecialchars($link['title']); ?>">
                    <i class="<?php echo $link['icon']; ?>"></i>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Scroll-down indicator -->
    <div class="scroll-indicator" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 5v14M19 18l-7 7-7-7"/>
        </svg>
    </div>
</section>

<!-- Typed strings data for script.js -->
<script>
    var typedStrings = <?php echo $typed_strings_json; ?>;
</script>
