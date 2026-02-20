<?php
/**
 * about.php — About section with bio and quick stats
 */
?>
<section class="about" id="about">
    <div class="about-content container">

        <!-- Left: bio text -->
        <div class="about-text">
            <h2 class="section-title text-left"><?php echo htmlspecialchars($about['title']); ?></h2>

            <?php foreach ($about['paragraphs'] as $para): ?>
                <p class="about-para reveal-item"><?php echo htmlspecialchars($para); ?></p>
            <?php endforeach; ?>

            <!-- Quick-stat numbers -->
            <div class="about-stats">
                <?php foreach ($about['stats'] as $stat): ?>
                    <div class="stat-item reveal-item">
                        <span class="stat-value"><?php echo htmlspecialchars($stat['value']); ?></span>
                        <span class="stat-label"><?php echo htmlspecialchars($stat['label']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Right: decorative visual block -->
        <div class="about-image reveal-item" aria-hidden="true">
            <div class="about-image-inner">
                <i class="fas fa-code about-icon"></i>
            </div>
        </div>

    </div>
</section>
