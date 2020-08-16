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

			<h1 class="entry-title"><?php single_term_title(); ?></h1>
			<?php
				while (have_posts()) :
					the_post();
					if (is_category(get_cat_ID('最新活動')))
						get_template_part('template-parts/content', 'event-archive');
					else
						get_template_part('template-parts/content', 'archive');
			?>
			<?php
				endwhile;
			?>
			
			<div class="pagination">
			<?php
				// the_posts_navigation();
				if (!get_previous_posts_link() && $wp_query->max_num_pages > 1){
					echo '<i class="fas fa-chevron-circle-left disable"></i>';
				} else {
					previous_posts_link('<i class="fas fa-chevron-circle-left"></i>', $wp_query->max_num_pages);
				}

				echo paginate_links(array(
					'total' => $wp_query->max_num_pages,
					'prev_text' => '',
					'next_text' => '',
				));

				if (!get_next_posts_link(null, $wp_query->max_num_pages) && $wp_query->max_num_pages > 1) {
					echo '<i class="fas fa-chevron-circle-right disable"></i>';
				} else {
					next_posts_link('<i class="fas fa-chevron-circle-right"></i>', $wp_query->max_num_pages);
					// next_posts_link('<i class="fas fa-chevron-circle-right"></i>', ceil(($recordingQuery->found_posts - $desireOffset) / $per_page));
				}
			?>
			</div>
	
		</article>
	</div>

<?php
// get_sidebar();
get_footer();
