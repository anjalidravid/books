<?php
function bookcollection_customize_register($wp_customize) {
    // Section for Book Settings
    $wp_customize->add_section('bookcollection_settings', array(
        'title'    => __('Book Collection Settings', 'bookcollection'),
        'priority' => 30,
    ));

    // Setting for Homepage Book Count
    $wp_customize->add_setting('bookcollection_book_count', array(
        'default'   => 5,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('bookcollection_book_count', array(
        'label'    => __('Number of Books on Homepage', 'bookcollection'),
        'section'  => 'bookcollection_settings',
        'type'     => 'number',
    ));
}
add_action('customize_register', 'bookcollection_customize_register');
