<?php
/**
 * header.php — Sticky navigation bar with dark/light toggle and mobile hamburger
 */
?>
<header id="site-header">
    <!-- Logo -->
    <a class="logo" href="#hero" data-scroll="hero">
        <?php echo htmlspecialchars(SITE_NAME); ?>
    </a>

    <!-- Desktop navigation -->
    <nav class="nav-desktop" aria-label="Main navigation">
        <?php foreach ($navigation as $item): ?>
            <a href="#<?php echo $item['id']; ?>" data-scroll="<?php echo $item['id']; ?>">
                <?php echo htmlspecialchars($item['label']); ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <!-- Header controls: theme toggle + hamburger -->
    <div class="header-controls">
        <button class="theme-toggle" id="themeToggle" aria-label="Toggle colour theme">
            <i class="fas fa-moon"></i>
        </button>

        <!-- Hamburger button — shown only on mobile -->
        <button class="hamburger" id="hamburgerBtn" aria-label="Open menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>

<!-- Mobile nav overlay -->
<div class="mobile-nav" id="mobileNav" aria-hidden="true">
    <button class="mobile-nav-close" id="mobileNavClose" aria-label="Close menu">
        <i class="fas fa-times"></i>
    </button>
    <nav aria-label="Mobile navigation">
        <?php foreach ($navigation as $item): ?>
            <a href="#<?php echo $item['id']; ?>"
               class="mobile-nav-link"
               data-scroll="<?php echo $item['id']; ?>">
                <?php echo htmlspecialchars($item['label']); ?>
            </a>
        <?php endforeach; ?>
    </nav>
</div>

<!-- Mobile nav backdrop -->
<div class="mobile-nav-backdrop" id="mobileNavBackdrop"></div>
