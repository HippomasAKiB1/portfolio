<?php
/**
 * recommendations.php — "FIELD REPORTS" — Mission debrief momentum carousel
 */
?>
<section class="recommendations" id="recommendations">
    <div class="container">
        <div class="section-head">
            <span class="section-tag">// SEC.05</span>
            <h2 class="section-title">FIELD REPORTS</h2>
            <p class="section-sub">Verified mission debriefs from commanding officers</p>
        </div>

        <div class="carousel-wrap">
            <div class="carousel-track" id="carousel-track">
                <?php foreach ($testimonials as $i => $t): ?>
                    <article class="debrief-card" data-index="<?php echo $i; ?>">
                        <!-- Header bar -->
                        <div class="debrief-header">
                            <span class="debrief-label">PERFORMANCE EVALUATION</span>
                            <span class="debrief-id">RPT-<?php echo str_pad($i + 1, 3, '0', STR_PAD_LEFT); ?></span>
                        </div>

                        <!-- Verified stamp -->
                        <div class="verified-stamp" aria-label="Verified">
                            <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <circle cx="40" cy="40" r="36" stroke="currentColor" stroke-width="3"/>
                                <circle cx="40" cy="40" r="28" stroke="currentColor" stroke-width="1" stroke-dasharray="4 2"/>
                                <text x="50%" y="46%" dominant-baseline="middle" text-anchor="middle" font-size="9" font-weight="700" fill="currentColor" font-family="JetBrains Mono, monospace" letter-spacing="1">VERIFIED</text>
                            </svg>
                        </div>

                        <!-- Quote -->
                        <blockquote class="debrief-quote">
                            "<?php echo htmlspecialchars($t['text']); ?>"
                        </blockquote>

                        <!-- Divider -->
                        <div class="debrief-divider" aria-hidden="true"></div>

                        <!-- Author block -->
                        <div class="debrief-author">
                            <div class="author-avatar" aria-hidden="true">
                                <?php echo strtoupper(substr($t['author'], 0, 1)); ?>
                            </div>
                            <div class="author-info">
                                <span class="author-name"><?php echo htmlspecialchars($t['author']); ?></span>
                                <span class="author-title"><?php echo htmlspecialchars($t['title']); ?></span>
                                <span class="author-company"><?php echo htmlspecialchars($t['company']); ?></span>
                            </div>
                            <div class="author-rel">
                                <span class="rel-label">RELATION</span>
                                <span class="rel-value"><?php echo htmlspecialchars($t['relationship']); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- Carousel controls -->
            <div class="carousel-controls" aria-label="Carousel controls">
                <button id="carousel-prev" aria-label="Previous report">
                    <i data-lucide="chevron-left"></i>
                </button>
                <div class="carousel-dots" id="carousel-dots">
                    <?php foreach ($testimonials as $i => $t): ?>
                        <button class="carousel-dot <?php echo $i === 0 ? 'active' : ''; ?>"
                                data-index="<?php echo $i; ?>"
                                aria-label="Report <?php echo $i + 1; ?>"></button>
                    <?php endforeach; ?>
                </div>
                <button id="carousel-next" aria-label="Next report">
                    <i data-lucide="chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
