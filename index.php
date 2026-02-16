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

// Load configuration
require_once 'config/config.php';

// Load controller
require_once 'controllers/portfolio_controller.php';

// Render the portfolio page
render_portfolio();
?>
