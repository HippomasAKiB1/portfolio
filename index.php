<?php
/**
 * Portfolio Application
 * Entry Point / Router
 * 
 * MVC Architecture with Procedural PHP
 * - Models: Handle data and business logic
 * - Views: Handle presentation layer
 * - Controllers: Handle request routing and logic
 */

// Enable compression if available
if (extension_loaded('zlib')) {
    ob_start('ob_gzhandler');
}

// Load configuration
require_once 'config/config.php';

// Load controller
require_once 'controllers/portfolio_controller.php';

// Render the portfolio page
render_portfolio();

if (extension_loaded('zlib')) {
    ob_end_flush();
}
?>
