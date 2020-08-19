<?php
/**
 * Template Name: 圖片庫
 * 
 * The template for displaying gallery
 *
 * This is the template that displays gallery by default.
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

<?php 
    if($_GET['albums'] && !empty($_GET['albums'])) {
        $selectedAlbums = $_GET['albums'];
    }
?>

<div class="container text-container gallery">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <header class="entry-header">

	    </header><!-- .entry-header -->

        <section class="filter-bar">
            <div class="col-4">
                <?php the_title( '<h1 class="filter-title">', '</h1>' ); ?>
            </div>

            <div class="col-8">
            <form class="filter-form" method="GET" action="<?php  echo get_bloginfo('url') ?>/圖片庫/">
                <span class="selectBox-wrapper">
                    <select class="selectBox selectBox-3" name="albums" id="albums" onchange="this.form.submit()">
                        <option value="" >所有相簿</option>
                    <?php 
                        $args = array (
                            'type'      => 'aigpl_gallery',
                            'orderby'   => 'name',
                            'order'     => 'ASC',
                            'taxonomy'  => 'aigpl_cat'
                        );
                        $categories = get_categories($args);
                        foreach ($categories as $category) :
                    ?>
                        <option value="<?php echo $category->term_id ?>" <?php echo selected($_GET['albums'], $category->term_id) ?>><?php echo $category->name;?></option>
                    <?php endforeach ?>
                    </select>
                </span>
            </form>
            </div>
        </section>
    
        <div class="entry-content">
            <?php echo do_shortcode('[aigpl-gallery-album album_grid="3" category='.$selectedAlbums .']'); ?>
	    </div><!-- .entry-content -->
    <?php
    endwhile; // End of the loop.
    ?>
</div>


 <?php

get_footer();