<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

get_header();
?>

	<div class="container text-container">
		<h1 class="my-4"></h1>
		<article>

			<h1><?php single_term_title(); ?></h1>
			<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', 'archive');
				
			?>
			<?php
				endwhile;

				the_posts_navigation();
			?>

		</article>
	</div>

<?php
// get_sidebar();
get_footer();
