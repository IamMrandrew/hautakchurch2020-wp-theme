<?php
/**
 * Template part for displaying archive content of events in archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

?>


<a class="news-item-link" href="<?php the_permalink()?>">
    <div class="news-item">
        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="leaflet">
        <h3 class="news-title"><?php the_title(); ?></h3>  
        <span class="news-date"><?php echo get_the_date('M d, Y'); ?></span>
        <?php the_content(); ?>
    </div>
</a>
<hr>
