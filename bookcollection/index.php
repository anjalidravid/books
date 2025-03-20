<?php get_header(); ?>

<main>
    <h1>Featured Books</h1>
    <?php 
        $book_count = get_theme_mod('bookcollection_book_count', 5);
        bookcollection_get_books($book_count);
    ?>
</main>

<?php get_footer(); ?>
