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

			get_template_part( 'template-parts/content', get_post_type() );
			
		?>
		<div class="post_links">
			<div class="col-lg-6 left">
				<?php previous_post_link( '<div class="pre_post_link">%link</div>',  '<i class="fas fa-angle-left"></i><span class="pre_post_arrow">上一篇</span><div class="pre_post_title">%title</div>', true ); ?>
			</div>
			<div class="col-lg-6 right">
			<?php next_post_link( '<div class="next_post_link">%link</div>',  '<span class="next_post_arrow">下一篇</span><i class="fas fa-angle-right"></i><div class="next_post_title">%title</div>', true ); ?>
			</div>
		</div>
			
			
		<?php
			// the_post_navigation(
			// 	array(
			// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( '上一篇:', 'hautakchurch' ) . '</span> <span class="nav-title">%title</span>',
			// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( '下一篇:', 'hautakchurch' ) . '</span> <span class="nav-title">%title</span>',
			// 	)
			// );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

	</div><!-- #main -->

<?php
// get_sidebar();
get_footer();
