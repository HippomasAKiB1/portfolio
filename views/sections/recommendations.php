<?php
/**
 * recommendations.php — Testimonial carousel
 * PHP passes testimonial data to JS via json_encode.
 * JS handles the prev/next logic and updates the DOM.
 */
?>
<section class="recommendations" id="recommendations">
    <div class="container">
        <h2 class="section-title">Recommendations</h2>

        <div class="testimonial-carousel">

            <!-- Active testimonial card -->
            <div class="testimonial-card" id="testimonialCard">
                <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                <p class="testimonial-text" id="testimonialText">
                    <?php echo htmlspecialchars($testimonials[0]['text']); ?>
                </p>
                <p class="testimonial-author" id="testimonialAuthor">
                    <?php echo htmlspecialchars($testimonials[0]['author']); ?>
                </p>
                <p class="testimonial-role" id="testimonialRole">
                    <?php echo htmlspecialchars($testimonials[0]['role']); ?>
                </p>
            </div>

            <!-- Dot indicators -->
            <div class="testimonial-dots" id="testimonialDots">
                <?php foreach ($testimonials as $i => $t): ?>
                    <button class="dot <?php echo $i === 0 ? 'active' : ''; ?>"
                            data-index="<?php echo $i; ?>"
                            aria-label="Testimonial <?php echo $i + 1; ?>">
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Prev / Next buttons -->
            <div class="testimonial-nav">
                <button class="carousel-btn" id="prevTestimonial" aria-label="Previous testimonial">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carousel-btn" id="nextTestimonial" aria-label="Next testimonial">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

        </div>
    </div>
</section>

<!-- Pass PHP testimonial data to JS — single source of truth -->
<script>
    var testimonials = <?php echo json_encode($testimonials); ?>;
</script>
