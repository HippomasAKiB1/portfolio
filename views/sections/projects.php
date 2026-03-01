<?php
/**
 * projects.php — "CASE FILES" — Classified folder grid with dossier overlay
 */
$projects_json = json_encode($projects);
$categories = array_unique(array_column($projects, 'category'));
?>
<section class="projects" id="projects">
    <div class="container">
        <div class="section-head">
            <span class="section-tag">// SEC.04</span>
            <h2 class="section-title">CASE FILES</h2>
            <p class="section-sub">Classified mission dossiers — select for full briefing</p>
        </div>

        <!-- Filter bar -->
        <div class="projects-filter" role="group" aria-label="Filter projects">
            <button class="filter-btn active" data-filter="ALL">ALL FILES</button>
            <?php foreach ($categories as $cat): ?>
                <button class="filter-btn" data-filter="<?php echo htmlspecialchars($cat); ?>">
                    <?php echo htmlspecialchars($cat); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Project grid -->
        <div class="projects-grid" id="projects-grid">
            <?php foreach ($projects as $project): ?>
                <article class="project-card reveal-card in-view"
                         data-id="<?php echo htmlspecialchars($project['id']); ?>"
                         data-category="<?php echo htmlspecialchars($project['category']); ?>">

                    <!-- Card top bar -->
                    <div class="card-topbar">
                        <span class="card-clearance clearance-<?php echo strtolower($project['clearance']); ?>">
                            <?php echo htmlspecialchars($project['clearance']); ?>
                        </span>
                        <span class="card-status status-<?php echo strtolower(str_replace('_', '-', $project['status'])); ?>">
                            <?php echo str_replace('_', ' ', $project['status']); ?>
                        </span>
                    </div>

                    <!-- Card emoji / icon -->
                    <div class="card-icon" aria-hidden="true"><?php echo $project['emoji']; ?></div>

                    <!-- Card body -->
                    <div class="card-body">
                        <span class="card-id"><?php echo htmlspecialchars($project['id']); ?></span>
                        <h3 class="card-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                        <p class="card-desc"><?php echo htmlspecialchars($project['description']); ?></p>

                        <div class="card-tags">
                            <?php foreach ($project['tags'] as $tag): ?>
                                <span class="card-tag"><?php echo htmlspecialchars($tag); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Open dossier prompt -->
                    <div class="card-footer">
                        <span class="card-open-prompt">
                            <i data-lucide="file-text"></i>
                            OPEN DOSSIER
                        </span>
                    </div>

                    <!-- Hover shimmer -->
                    <div class="card-shimmer" aria-hidden="true"></div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Dossier data for JS -->
    <script>var PROJECTS_DATA = <?php echo $projects_json; ?>;</script>
</section>
