<?php
/**
 * projects.php — Featured project cards with 3D tilt (handled by JS)
 */
?>
<section class="projects" id="projects">
    <div class="container">
        <h2 class="section-title">Featured Projects</h2>

        <div class="projects-grid">
            <?php foreach ($projects as $project): ?>
                <div class="project-card reveal-item">

                    <!-- Project thumbnail / emoji -->
                    <div class="project-image">
                        <span class="project-emoji"><?php echo $project['emoji']; ?></span>
                    </div>

                    <div class="project-content">
                        <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                        <p><?php echo htmlspecialchars($project['description']); ?></p>

                        <!-- Tech-stack tags -->
                        <div class="project-tags">
                            <?php foreach ($project['tags'] as $tag): ?>
                                <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                            <?php endforeach; ?>
                        </div>

                        <!-- Links -->
                        <div class="project-links">
                            <a href="<?php echo htmlspecialchars($project['demo_url']); ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="project-link">
                                <i class="fas fa-external-link-alt"></i> Live Demo
                            </a>
                            <a href="<?php echo htmlspecialchars($project['code_url']); ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="project-link">
                                <i class="fab fa-github"></i> Source Code
                            </a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
