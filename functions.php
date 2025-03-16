<?php
// Theme Setup
function bookcollection_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'bookcollection_theme_setup');

// Include separate files
require get_template_directory() . '/inc/enqueue-scripts.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-functions.php';
