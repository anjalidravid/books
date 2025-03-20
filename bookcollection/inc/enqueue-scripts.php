<?php

function bookcollection_enqueue_assets() {
    wp_enqueue_style('bookcollection-style', get_stylesheet_uri());
    wp_enqueue_style('bookcollection-main', get_template_directory_uri() . '/assets/css/main.css');

    wp_enqueue_script('bookcollection-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'bookcollection_enqueue_assets');
