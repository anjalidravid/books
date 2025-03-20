<?php
function book_manager_add_meta_boxes() {
    add_meta_box(
        'book_details',
        __('Book Details', 'book-manager'),
        'book_manager_meta_box_callback',
        'books',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'book_manager_add_meta_boxes');

function book_manager_meta_box_callback($post) {
    $author = get_post_meta($post->ID, 'book_author', true);
    $year = get_post_meta($post->ID, 'book_year', true);

    ?>
    <p>
        <label for="book_author"><?php _e('Author:', 'book-manager'); ?></label>
        <input type="text" id="book_author" name="book_author" value="<?php echo esc_attr($author); ?>" class="widefat">
    </p>
    <p>
        <label for="book_year"><?php _e('Publication Year:', 'book-manager'); ?></label>
        <input type="number" id="book_year" name="book_year" value="<?php echo esc_attr($year); ?>" class="widefat">
    </p>
    <?php
}

function book_manager_save_meta_fields($post_id) {
    if (array_key_exists('book_author', $_POST)) {
        update_post_meta($post_id, 'book_author', sanitize_text_field($_POST['book_author']));
    }
    if (array_key_exists('book_year', $_POST)) {
        update_post_meta($post_id, 'book_year', absint($_POST['book_year']));
    }
}
add_action('save_post', 'book_manager_save_meta_fields');
