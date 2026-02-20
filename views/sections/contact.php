<?php
/**
 * contact.php — Contact section with info cards and AJAX form
 */
?>
<section class="contact" id="contact">
    <div class="container">
        <h2 class="section-title">Get In Touch</h2>

        <div class="contact-layout">

            <!-- Left: contact info cards -->
            <div class="contact-info">
                <div class="contact-item reveal-item">
                    <div class="contact-item-icon"><i class="fas fa-envelope"></i></div>
                    <div>
                        <h3>Email</h3>
                        <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>">
                            <?php echo htmlspecialchars($contact['email']); ?>
                        </a>
                    </div>
                </div>

                <div class="contact-item reveal-item">
                    <div class="contact-item-icon"><i class="fas fa-phone"></i></div>
                    <div>
                        <h3>Phone</h3>
                        <a href="tel:<?php echo preg_replace('/[^+\d]/', '', $contact['phone']); ?>">
                            <?php echo htmlspecialchars($contact['phone']); ?>
                        </a>
                    </div>
                </div>

                <div class="contact-item reveal-item">
                    <div class="contact-item-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <h3>Location</h3>
                        <p><?php echo htmlspecialchars($contact['location']); ?></p>
                    </div>
                </div>
            </div>

            <!-- Right: contact form (submits via AJAX) -->
            <form class="contact-form reveal-item" id="contactForm" novalidate>
                <div class="form-group">
                    <label for="contactName">Your Name</label>
                    <input type="text"
                           id="contactName"
                           name="name"
                           placeholder="John Doe"
                           required
                           autocomplete="name">
                </div>

                <div class="form-group">
                    <label for="contactEmail">Your Email</label>
                    <input type="email"
                           id="contactEmail"
                           name="email"
                           placeholder="john@example.com"
                           required
                           autocomplete="email">
                </div>

                <div class="form-group">
                    <label for="contactMessage">Message</label>
                    <textarea id="contactMessage"
                              name="message"
                              rows="5"
                              placeholder="Tell me about your project..."
                              required></textarea>
                </div>

                <!-- Submit button with loading state -->
                <button type="submit" class="btn btn-primary" id="contactSubmit">
                    <span class="btn-text">Send Message</span>
                    <span class="btn-loader" hidden><i class="fas fa-spinner fa-spin"></i></span>
                </button>

                <!-- Success / error message shown by JS -->
                <div class="form-response" id="formResponse" hidden></div>
            </form>

        </div><!-- .contact-layout -->
    </div>
</section>

<!-- AJAX endpoint URL for JS -->
<script>
    var ajaxContactUrl = '<?php echo BASE_URL; ?>ajax_contact.php';
</script>
