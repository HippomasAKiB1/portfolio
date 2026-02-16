<?php
/**
 * Recommendations Section View
 */
?>
<section class="recommendations" id="recommendations">
    <h2 class="section-title">Recommendations</h2>
    <div class="testimonial-carousel">
        <div class="testimonial-card" id="testimonialCard">
            <p class="testimonial-text" id="testimonialText"><?php echo $testimonials[0]['text']; ?></p>
            <p class="testimonial-author" id="testimonialAuthor"><?php echo $testimonials[0]['author']; ?></p>
        </div>
        <div class="testimonial-nav">
            <button class="carousel-btn" onclick="prevTestimonial()"><i class="fas fa-chevron-left"></i></button>
            <button class="carousel-btn" onclick="nextTestimonial()"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
</section>

<script>
    // Store testimonials data from PHP
    const testimonials = <?php echo json_encode($testimonials); ?>;
    let currentTestimonial = 0;
</script>
