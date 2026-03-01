<?php
/**
 * education.php — "TIMELINE UPLINK" — Vertical glowing mission-log timeline
 */
?>
<section class="education" id="education">
    <div class="container">
        <div class="section-head">
            <span class="section-tag">// SEC.02</span>
            <h2 class="section-title">TIMELINE UPLINK</h2>
            <p class="section-sub">Mission log — academic & professional milestones</p>
        </div>

        <div class="timeline" id="timeline">
            <!-- Glowing connector line -->
            <div class="timeline-track" aria-hidden="true">
                <div class="timeline-track-fill" id="timeline-fill"></div>
            </div>

            <?php foreach ($education as $i => $entry): ?>
                <article class="timeline-node reveal-node" data-index="<?php echo $i; ?>">
                    <!-- Node dot -->
                    <div class="node-dot" aria-hidden="true"></div>

                    <!-- Node card -->
                    <div class="node-card">
                        <div class="node-card-header">
                            <span class="node-code"><?php echo htmlspecialchars($entry['code']); ?></span>
                            <span class="node-year"><?php echo htmlspecialchars($entry['year']); ?></span>
                        </div>
                        <h3 class="node-title"><?php echo htmlspecialchars($entry['title']); ?></h3>
                        <p class="node-institution"><?php echo htmlspecialchars($entry['institution']); ?></p>

                        <!-- Expandable details -->
                        <div class="node-details">
                            <div class="scan-line" aria-hidden="true"></div>
                            <p class="node-desc"><?php echo htmlspecialchars($entry['description']); ?></p>
                            <div class="node-tags">
                                <?php foreach ($entry['tags'] as $tag): ?>
                                    <span class="node-tag"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
