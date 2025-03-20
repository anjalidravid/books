<?php
function bookcollection_get_books($count = 5) {
    $args = array(
        'post_type'      => 'books',
        'posts_per_page' => 12, // Adjust as needed
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $query = new WP_Query($args);
    
    if ($query->have_posts()) : ?>
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
    <?php else : ?>
        <p class="text-center">No books found.</p>
    <?php endif;
    wp_reset_postdata();
}
