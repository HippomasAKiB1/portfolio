<?php
/**
 * Education Section View
 */
?>
<section class="education" id="education">
    <h2 class="section-title">Education</h2>
    <div class="timeline">
        <?php foreach ($education as $item): ?>
            <div class="timeline-item">
                <h3><?php echo $item['title']; ?></h3>
                <span class="year"><?php echo $item['year']; ?></span>
                <p><?php echo $item['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
