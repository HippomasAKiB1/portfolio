<?php
/**
 * footer.php — Footer with social icons and copyright
 */
?>
<footer>
    <div class="container footer-inner">
        <!-- Social media icons -->
        <div class="social-icons">
            <?php foreach ($social_links as $link): ?>
                <a href="<?php echo htmlspecialchars($link['url']); ?>"
                   class="social-icon"
                   target="_blank"
                   rel="noopener noreferrer"
                   title="<?php echo htmlspecialchars($link['title']); ?>"
                   aria-label="<?php echo htmlspecialchars($link['title']); ?>">
                    <i class="<?php echo $link['icon']; ?>"></i>
                </a>
            <?php endforeach; ?>
        </div>

        <p class="footer-copy">
            &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars(SITE_AUTHOR); ?>.
            Crafted with <span class="heart" aria-label="love">&#10084;</span> &amp; clean code.
        </p>
    </div>
</footer>
