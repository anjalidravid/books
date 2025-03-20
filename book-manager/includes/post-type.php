<?php
function book_manager_register_post_type() {
    $labels = array(
        'name'          => __('Books', 'book-manager'),
        'singular_name' => __('Book', 'book-manager'),
        'add_new'       => __('Add New Book', 'book-manager'),
        'edit_item'     => __('Edit Book', 'book-manager'),
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-book',
        'supports'      => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('books', $args);
}
add_action('init', 'book_manager_register_post_type');
