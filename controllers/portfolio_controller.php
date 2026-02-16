<?php
/**
 * Portfolio Controller
 * Handles business logic and passes data to views
 */

// Include model
require_once __DIR__ . '/../models/portfolio_model.php';

// Get page data
function get_page_data() {
    $data = array(
        'hero' => get_hero_data(),
        'about' => get_about_data(),
        'education' => get_education_data(),
        'skills' => get_skills_data(),
        'projects' => get_projects_data(),
        'testimonials' => get_testimonials_data(),
        'contact' => get_contact_data(),
        'navigation' => get_navigation_items(),
        'social_links' => get_social_links()
    );
    
    return $data;
}

// Render a view file
function render_view($view_name, $data = array()) {
    $view_file = __DIR__ . '/../views/' . $view_name . '.php';
    
    if (file_exists($view_file)) {
        // Extract array data into variables
        extract($data);
        
        // Include the view
        include $view_file;
    } else {
        die("View file not found: " . $view_name);
    }
}

// Format skill proficiency for progress bars
function format_skill_proficiency($proficiency) {
    return min(max($proficiency, 0), 100);
}

// Get CSS asset URL
function asset($path) {
    return ASSET_URL . 'css/' . $path;
}

// Get JS asset URL
function asset_js($path) {
    return ASSET_URL . 'js/' . $path;
}

// Render entire portfolio page
function render_portfolio() {
    $page_data = get_page_data();
    render_view('layout', $page_data);
}
