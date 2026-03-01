<?php
/**
 * skills.php — "SKILL TREE" — RPG node-graph rendered on Canvas
 */
$skills_json = json_encode($skills);
?>
<section class="skills" id="skills">
    <div class="container">
        <div class="section-head">
            <span class="section-tag">// SEC.03</span>
            <h2 class="section-title">SKILL TREE</h2>
            <p class="section-sub">Neural network — abilities &amp; proficiency matrix</p>
        </div>

        <!-- Cluster legend -->
        <div class="cluster-legend" aria-label="Skill clusters">
            <?php
            $clusters = array_unique(array_column($skills, 'cluster'));
            foreach ($clusters as $cluster):
            ?>
                <button class="cluster-btn active" data-cluster="<?php echo htmlspecialchars($cluster); ?>">
                    <?php echo htmlspecialchars($cluster); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Canvas for the node graph (JS draws it) -->
        <div class="skill-tree-wrap" id="skill-tree-wrap">
            <canvas id="skill-tree-canvas" aria-label="Skill tree visualization"></canvas>

            <!-- Fallback nodes (also used as data source for JS) -->
            <div class="skill-nodes-data" aria-hidden="true">
                <?php foreach ($skills as $skill): ?>
                    <div class="skill-node-data"
                         data-name="<?php echo htmlspecialchars($skill['name']); ?>"
                         data-cluster="<?php echo htmlspecialchars($skill['cluster']); ?>"
                         data-proficiency="<?php echo (int)$skill['proficiency']; ?>"
                         data-level="<?php echo htmlspecialchars($skill['level']); ?>"
                         data-desc="<?php echo htmlspecialchars($skill['desc']); ?>">
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Hover tooltip for skill nodes -->
            <div id="skill-tooltip" class="skill-tooltip" role="tooltip" aria-live="polite">
                <span class="tooltip-name"></span>
                <span class="tooltip-level"></span>
                <span class="tooltip-desc"></span>
                <div class="tooltip-bar"><div class="tooltip-fill"></div></div>
            </div>
        </div>
    </div>
    <script>var SKILLS_DATA = <?php echo $skills_json; ?>;</script>
</section>
