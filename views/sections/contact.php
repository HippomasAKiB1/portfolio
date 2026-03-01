<?php
/**
 * contact.php — Cinematic contact section with AJAX form
 */
?>
<section class="contact" id="contact">
    <div class="container">
        <div class="section-head">
            <span class="section-tag">// SEC.06</span>
            <h2 class="section-title">OPEN COMMS</h2>
            <p class="section-sub">Establish a secure channel — I respond within 24h</p>
        </div>

        <div class="contact-layout">
            <!-- Left: info panel -->
            <div class="contact-info">
                <div class="contact-info-header">
                    <span class="info-label">// TRANSMISSION COORDINATES</span>
                </div>

                <div class="contact-item">
                    <div class="contact-item-icon">
                        <i data-lucide="mail"></i>
                    </div>
                    <div class="contact-item-text">
                        <span class="ci-label">SECURE EMAIL</span>
                        <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>" class="ci-value">
                            <?php echo htmlspecialchars($contact['email']); ?>
                        </a>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-item-icon">
                        <i data-lucide="map-pin"></i>
                    </div>
                    <div class="contact-item-text">
                        <span class="ci-label">CURRENT BASE</span>
                        <span class="ci-value"><?php echo htmlspecialchars($contact['location']); ?></span>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-item-icon">
                        <i data-lucide="activity"></i>
                    </div>
                    <div class="contact-item-text">
                        <span class="ci-label">STATUS</span>
                        <span class="ci-value status-open">
                            <span class="ping-dot"></span>
                            Open to Work
                        </span>
                    </div>
                </div>

                <div class="contact-social">
                    <?php foreach ($social_links as $link): ?>
                        <a href="<?php echo htmlspecialchars($link['url']); ?>"
                           class="contact-social-link"
                           target="_blank"
                           rel="noopener noreferrer"
                           aria-label="<?php echo htmlspecialchars($link['title']); ?>">
                            <i data-lucide="<?php echo $link['icon']; ?>"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Right: form -->
            <div class="contact-form-wrap">
                <form id="contact-form" class="contact-form" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-name">// OPERATOR NAME</label>
                            <input type="text" id="contact-name" name="name" placeholder="Your name" required autocomplete="name">
                        </div>
                        <div class="form-group">
                            <label for="contact-email">// COMM FREQUENCY</label>
                            <input type="email" id="contact-email" name="email" placeholder="your@email.com" required autocomplete="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-subject">// SUBJECT LINE</label>
                        <input type="text" id="contact-subject" name="subject" placeholder="Mission objective" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-message">// MESSAGE BODY</label>
                        <textarea id="contact-message" name="message" rows="5" placeholder="Your transmission..." required></textarea>
                    </div>
                    <button type="submit" class="form-submit" id="form-submit">
                        <i data-lucide="send"></i>
                        <span>TRANSMIT MESSAGE</span>
                        <div class="submit-glow" aria-hidden="true"></div>
                    </button>
                    <div id="form-status" class="form-status" role="alert" aria-live="polite"></div>
                </form>
            </div>
        </div>
    </div>
</section>
