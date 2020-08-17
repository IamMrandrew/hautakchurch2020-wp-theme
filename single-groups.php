<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hautakchurch
 */

get_header();
?>

<div class="container text-container">
    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page' );


    endwhile; // End of the loop.
    ?>
</div>

<?php
// get_sidebar();
get_footer();
