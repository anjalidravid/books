<?php
/**
 * Plugin Name: Book Manager
 * Description: A custom plugin to manage books as a custom post type.
 * Version: 1.0
 * Author: Anjali
 * Text Domain: book-manager
 */

if (!defined('ABSPATH')) {
    exit;
}

// Include all functionality files
require_once plugin_dir_path(__FILE__) . 'includes/post-type.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-fields.php';
require_once plugin_dir_path(__FILE__) . 'includes/email-notification.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';

// Activation Hook
function book_manager_activate() {
    book_manager_register_post_type();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'book_manager_activate');

// Deactivation Hook
function book_manager_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'book_manager_deactivate');
?>
