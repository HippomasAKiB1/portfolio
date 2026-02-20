<?php
/**
 * portfolio_controller.php
 * Wires the model data together and renders views.
 */

require_once __DIR__ . '/../models/portfolio_model.php';

// ── Asset URL helpers ─────────────────────────────────────────────────────────
// These return the full URL to a file inside assets/css/ or assets/js/
function asset_css($filename) {
    return ASSET_URL . 'css/' . $filename;
}

function asset_js($filename) {
    return ASSET_URL . 'js/' . $filename;
}

// ── View renderer ─────────────────────────────────────────────────────────────
// $view_name is relative to the views/ directory, e.g. 'sections/hero'
function render_view($view_name, $data = []) {
    $view_file = __DIR__ . '/../views/' . $view_name . '.php';

    if (!file_exists($view_file)) {
        die('View not found: ' . htmlspecialchars($view_name));
    }

    // Make every key in $data available as a variable inside the view
    extract($data);
    include $view_file;
}

// ── Helper: clamp skill proficiency 0–100 ────────────────────────────────────
function clamp_proficiency($value) {
    return min(max((int) $value, 0), 100);
}

// ── Collect all page data from the model ─────────────────────────────────────
function get_page_data() {
    return [
        'hero'         => get_hero_data(),
        'about'        => get_about_data(),
        'education'    => get_education_data(),
        'skills'       => get_skills_data(),
        'projects'     => get_projects_data(),
        'testimonials' => get_testimonials_data(),
        'contact'      => get_contact_data(),
        'navigation'   => get_navigation_items(),
        'social_links' => get_social_links(),
    ];
}

// ── Main entry point ──────────────────────────────────────────────────────────
function render_portfolio() {
    $data = get_page_data();
    render_view('layout', $data);
}
