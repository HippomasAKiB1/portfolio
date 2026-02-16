<?php
/**
 * Projects Section View
 */
?>
<section class="projects" id="projects">
    <h2 class="section-title">Featured Projects</h2>
    <div class="projects-grid">
        <?php $project_index = 0; foreach ($projects as $project): $project_index++; ?>
            <div class="project-card">
                <div class="project-image"><?php echo $project['emoji']; ?></div>
                <div class="project-content">
                    <h3><?php echo $project['title']; ?></h3>
                    <p><?php echo $project['description']; ?></p>
                    <div class="project-tags">
                        <?php foreach ($project['tags'] as $tag): ?>
                            <span class="tag"><?php echo $tag; ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="project-links">
                        <a href="<?php echo $project['demo_url']; ?>" title="View Project">Demo</a>
                        <a href="<?php echo $project['code_url']; ?>" title="View Code">Code</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
