<?php
/**
 * About Section View
 */
?>
<section class="about" id="about">
    <div class="about-content">
        <div>
            <h2><?php echo $about['title']; ?></h2>
            <?php foreach ($about['paragraphs'] as $paragraph): ?>
                <p><?php echo $paragraph; ?></p>
            <?php endforeach; ?>
        </div>
        <div class="about-image"></div>
    </div>
</section>
