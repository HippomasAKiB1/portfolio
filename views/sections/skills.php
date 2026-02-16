<?php
/**
 * Skills Section View
 */
?>
<section class="skills" id="skills">
    <h2 class="section-title">Skills</h2>
    <div class="skills-grid">
        <?php $skill_index = 0; foreach ($skills as $skill): $skill_index++; ?>
            <div class="skill-card">
                <div class="skill-icon"><i class="<?php echo $skill['icon']; ?>"></i></div>
                <h3><?php echo $skill['name']; ?></h3>
                <p><?php echo $skill['description']; ?></p>
                <div class="skill-progress">
                    <div class="skill-progress-fill" style="--skill-width: <?php echo $skill['proficiency']; ?>%; animation-delay: <?php echo ($skill_index * 0.1); ?>s; width: <?php echo $skill['proficiency']; ?>%;"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
