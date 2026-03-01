<?php
/**
 * header.php — Glassmorphism sticky nav with HUD labels
 */
?>
<header id="site-header" role="banner">
    <div class="header-inner">

        <!-- Logo / Name -->
        <a href="#hero" class="header-logo" id="header-logo" aria-label="<?php echo SITE_NAME; ?> home">
            <span class="logo-bracket">[</span>
            <span class="logo-name"><?php echo htmlspecialchars(SITE_NAME); ?></span>
            <span class="logo-bracket">]</span>
            <span class="logo-pulse" aria-hidden="true"></span>
        </a>

        <!-- Navigation -->
        <nav class="header-nav" id="header-nav" role="navigation" aria-label="Main navigation">
            <div class="nav-indicator" id="nav-indicator" aria-hidden="true"></div>
            <?php foreach ($navigation as $item): ?>
                <a href="#<?php echo $item['id']; ?>"
                   class="nav-link"
                   data-section="<?php echo $item['id']; ?>"
                   data-tag="<?php echo htmlspecialchars($item['tag']); ?>">
                    <span class="nav-tag" aria-hidden="true"><?php echo htmlspecialchars($item['tag']); ?></span>
                    <span class="nav-label"><?php echo htmlspecialchars($item['label']); ?></span>
                </a>
            <?php endforeach; ?>
        </nav>

        <!-- Mobile menu toggle -->
        <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

    </div>
</header>
