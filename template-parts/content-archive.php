<?php
/**
 * Template part for displaying archive content in archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

?>


<a class="news-item-link" href="<?php the_permalink()?>">
    <div class="news-item">
        <h3 class="news-title"><?php the_title(); ?></h3>  
        <span class="news-date"><?php echo get_the_date('M d, Y'); ?></span>
        <p><?php the_excerpt(); ?></p>
    </div>
    </a>
    <hr>
