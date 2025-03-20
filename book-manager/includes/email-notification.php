<?php
function book_manager_send_email_notification($post_id, $post, $update) {
  
    if ($post->post_type != 'books' || $update) {
        return;
    }

    $admin_email = get_option('admin_email');
    $subject = 'New Book Added: ' . get_the_title($post_id);
    $message = 'A new book has been added to your website. Check it out: ' . get_permalink($post_id);
    
    $sent = wp_mail($admin_email, $subject, $message);
    if ($sent) {
        error_log('✅ Email sent successfully to: dravidanjali46@gmail.com');
    } else {
        error_log('❌ Failed to send email.');
    }
}
add_action('save_post_books', 'book_manager_send_email_notification', 10, 3);