<?php
/**
 * Footer View
 */
?>
<footer>
    <div class="social-icons">
        <?php foreach ($social_links as $link): ?>
            <a href="<?php echo $link['url']; ?>" class="social-icon" title="<?php echo $link['title']; ?>">
                <i class="<?php echo $link['icon']; ?>"></i>
            </a>
        <?php endforeach; ?>
    </div>
    <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_AUTHOR; ?>. All rights reserved. | Crafted with <span style="color: #ff006e;">❤</span></p>
</footer>
