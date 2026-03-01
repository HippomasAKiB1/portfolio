<?php
/**
 * footer.php — "SIGNAL END" — Dark minimal cinematic footer
 */
?>
<footer class="site-footer" id="footer" role="contentinfo">
    <div class="footer-inner">
        <div class="footer-left">
            <span class="footer-logo"><?php echo htmlspecialchars(SITE_NAME); ?>.SYS</span>
            <span class="footer-tagline">Still in the game. Always building.</span>
        </div>

        <div class="footer-center">
            <p class="footer-copy">
                &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars(SITE_AUTHOR); ?>
                <span class="footer-sep" aria-hidden="true"> // </span>
                Built with intent.
            </p>
        </div>

        <div class="footer-right">
            <?php foreach ($social_links as $link): ?>
                <a href="<?php echo htmlspecialchars($link['url']); ?>"
                   class="footer-social"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="<?php echo htmlspecialchars($link['title']); ?>"
                   data-radar>
                    <i data-lucide="<?php echo $link['icon']; ?>"></i>
                    <canvas class="radar-canvas" aria-hidden="true"></canvas>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Scanline texture -->
    <div class="footer-scanlines" aria-hidden="true"></div>
    <!-- Signal end label -->
    <div class="signal-end" aria-hidden="true">
        <span>// SIGNAL END //</span>
    </div>
</footer>
