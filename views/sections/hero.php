<?php
/**
 * hero.php — "IDENTITY CORE" — Full-viewport hero with Three.js bg, particle name,
 * glitch typewriter roles, and RPG stat card.
 */
$roles_json = json_encode($hero['roles']);
?>
<section class="hero" id="hero">
    <!-- Three.js animated mesh background -->
    <canvas id="hero-canvas" aria-hidden="true"></canvas>

    <div class="hero-inner">

        <!-- RPG Stat Card -->
        <aside class="stat-card" aria-label="Character stats">
            <div class="stat-card-header">
                <span class="stat-card-label">// OPERATOR PROFILE</span>
            </div>
            <?php foreach ($hero['stat_card'] as $stat): ?>
                <div class="stat-row">
                    <span class="stat-key"><?php echo htmlspecialchars($stat['label']); ?></span>
                    <span class="stat-val"><?php echo htmlspecialchars($stat['value']); ?></span>
                </div>
            <?php endforeach; ?>
            <div class="stat-card-footer">
                <div class="stat-ping" aria-hidden="true">
                    <span class="ping-dot"></span>
                    <span>ONLINE</span>
                </div>
            </div>
        </aside>

        <!-- Main identity block -->
        <div class="hero-content">
            <p class="hero-eyebrow">IDENTITY CORE // INITIALIZED</p>

            <!-- Name — letters wrapped for particle assembly -->
            <h1 class="hero-name" id="hero-name" aria-label="<?php echo htmlspecialchars($hero['name']); ?>">
                <?php foreach (str_split($hero['name']) as $char): ?>
                    <span class="hero-char" data-char="<?php echo htmlspecialchars($char); ?>"><?php echo htmlspecialchars($char); ?></span>
                <?php endforeach; ?>
            </h1>

            <!-- Glitch typewriter role cycling -->
            <p class="hero-role" id="hero-role-wrap" aria-live="polite">
                <span class="role-prefix">// </span>
                <span id="hero-role-text"></span>
                <span class="role-cursor" aria-hidden="true">█</span>
            </p>

            <!-- CTA buttons -->
            <div class="hero-ctas">
                <a href="#projects" class="cta-btn cta-primary" data-scroll="projects">
                    <i data-lucide="folder-open"></i>
                    <?php echo htmlspecialchars($hero['cta_primary']); ?>
                </a>
                <a href="#contact" class="cta-btn cta-secondary" data-scroll="contact">
                    <i data-lucide="radio"></i>
                    <?php echo htmlspecialchars($hero['cta_secondary']); ?>
                </a>
            </div>

            <!-- Social links -->
            <div class="hero-social">
                <?php foreach ($social_links as $link): ?>
                    <a href="<?php echo htmlspecialchars($link['url']); ?>"
                       class="social-link"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="<?php echo htmlspecialchars($link['title']); ?>">
                        <i data-lucide="<?php echo $link['icon']; ?>"></i>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Scroll hint -->
    <div class="hero-scroll-hint" aria-hidden="true">
        <span>SCROLL</span>
        <i data-lucide="chevrons-down"></i>
    </div>

    <!-- Roles data for JS -->
    <script>var HERO_ROLES = <?php echo $roles_json; ?>;</script>
</section>
