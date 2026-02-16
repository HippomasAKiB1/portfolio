<?php
/**
 * Contact Section View
 */
?>
<section class="contact" id="contact">
    <div class="contact-content">
        <h2 class="section-title">Get In Touch</h2>
        <div class="contact-info">
            <div class="contact-item">
                <div class="contact-item-icon"><i class="fas fa-envelope"></i></div>
                <h3>Email</h3>
                <a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a>
            </div>
            <div class="contact-item">
                <div class="contact-item-icon"><i class="fas fa-phone"></i></div>
                <h3>Phone</h3>
                <a href="tel:+12345678900"><?php echo $contact['phone']; ?></a>
            </div>
            <div class="contact-item">
                <div class="contact-item-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h3>Location</h3>
                <p><?php echo $contact['location']; ?></p>
            </div>
        </div>
    </div>
</section>
