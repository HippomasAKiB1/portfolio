<?php
/**
 * skills.php — Skill cards with animated progress bars
 * data-proficiency is used by JS IntersectionObserver to animate the bar width.
 */
?>
<section class="skills" id="skills">
    <div class="container">
        <h2 class="section-title">Skills</h2>

        <div class="skills-grid">
            <?php foreach ($skills as $skill): ?>
                <div class="skill-card reveal-item"
                     data-proficiency="<?php echo clamp_proficiency($skill['proficiency']); ?>">

                    <div class="skill-icon">
                        <i class="<?php echo $skill['icon']; ?>"></i>
                    </div>

                    <h3><?php echo htmlspecialchars($skill['name']); ?></h3>
                    <p><?php echo htmlspecialchars($skill['description']); ?></p>

                    <!-- Progress bar — width animated by JS on scroll-reveal -->
                    <div class="skill-progress" aria-label="<?php echo $skill['name']; ?> proficiency">
                        <div class="skill-progress-fill" style="--target-width: <?php echo clamp_proficiency($skill['proficiency']); ?>%"></div>
                    </div>
                    <span class="skill-percent"><?php echo clamp_proficiency($skill['proficiency']); ?>%</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
