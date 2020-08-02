<?php
/**
 * Template Nameeeeee: Article
 * 
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

get_header();
?>


<!-- <h2 class="my-4"></h2>         -->

<!--<img class="my-2" src="#" width="100%">
    <img class="my-2" src="img/cover1.jpg" width="100%"> -->
<div class="container text-container">
    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page' );


    endwhile; // End of the loop.
    ?>
</div>


 <?php

get_footer();
