<?php
/**
 * config.php
 * Global constants for the portfolio application.
 * Update these values with your real information.
 */

// ── Site identity ─────────────────────────────────────────────────────────────
define('SITE_NAME',        'AKIB');
define('SITE_DESCRIPTION', 'Full Stack Developer & Creative Technologist');
define('SITE_AUTHOR',      'AKIB');

// ── Contact details ───────────────────────────────────────────────────────────
define('PORTFOLIO_EMAIL',    'mail@akibhasan.me');
define('PORTFOLIO_PHONE',    '+880 1234-567890');
define('PORTFOLIO_LOCATION', 'Dhaka, Bangladesh');

// ── Social media URLs  (replace # with real URLs) ─────────────────────────────
define('SOCIAL_DISCORD',  'https://github.com/HippomasAKiB1');
define('SOCIAL_LINKEDIN', 'https://www.linkedin.com/in/akib-hasan-pyil/');
define('SOCIAL_FACEBOOK', 'https://www.facebook.com/HippomasAKiB');
define('SOCIAL_GITHUB',   'https://github.com/');

// ── Base URL (auto-detected, works on any host / subdirectory) ────────────────
$protocol  = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host      = $_SERVER['HTTP_HOST'];
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/') . '/';

define('BASE_URL',  $protocol . $host . $scriptDir);
define('ASSET_URL', BASE_URL . 'assets/');
