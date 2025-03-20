<?php
function book_manager_book_list_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'author' => '',
            'year'   => '',
        ),
        $atts,
        'book_list'
    );

    $args = array(
        'post_type'      => 'books',
        'posts_per_page' => -1,
        'meta_query'     => array(),
    );

    if (!empty($_GET['author']) || !empty($atts['author'])) {
        $args['meta_query'][] = array(
            'key'   => 'book_author',
            'value' => !empty($_GET['author']) ? sanitize_text_field($_GET['author']) : sanitize_text_field($atts['author']),
            'compare' => 'LIKE',
        );
    }

    if (!empty($_GET['year']) || !empty($atts['year'])) {
        $args['meta_query'][] = array(
            'key'   => 'book_year',
            'value' => !empty($_GET['year']) ? absint($_GET['year']) : absint($atts['year']),
            'compare' => '=',
        );
    }

    $query = new WP_Query($args);
    ob_start();

    if ($query->have_posts()) {
        echo '<div class="book-grid">';
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="container mt-4">
            <div class="row">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-md-3 mb-4"> <!-- 4 columns per row -->
                        <div class="card h-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                            <?php else : ?>
                                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No Image">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                                <p class="card-text"><strong>Author:</strong> <?php echo get_post_meta(get_the_ID(), 'book_author', true); ?></p>
                                <p class="card-text"><strong>Year:</strong> <?php echo get_post_meta(get_the_ID(), 'book_year', true); ?></p>
                                <p class="card-text"><?php echo wp_trim_words(get_the_content(), 15, '...'); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
            <?php
        }
        echo '</div>';
    } else {
        echo '<p>No books found.</p>';
    }

    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('book_list', 'book_manager_book_list_shortcode');