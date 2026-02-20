<?php
/**
 * education.php — Timeline of education & certifications
 */
?>
<section class="education" id="education">
    <div class="container">
        <h2 class="section-title">Education</h2>

        <div class="timeline">
            <?php foreach ($education as $item): ?>
                <div class="timeline-item reveal-item">
                    <div class="timeline-icon">
                        <i class="<?php echo $item['icon']; ?>"></i>
                    </div>
                    <div class="timeline-body">
                        <span class="timeline-year"><?php echo htmlspecialchars($item['year']); ?></span>
                        <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                        <p class="timeline-institution"><?php echo htmlspecialchars($item['institution']); ?></p>
                        <p><?php echo htmlspecialchars($item['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
