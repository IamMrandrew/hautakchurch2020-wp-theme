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
    <div class="news-item my-2">
        <h3 style="color: #202020;  text-decoration: none; font-weight: 400;font-size: 16px"><?php the_title(); ?></h3>  
        <span class="blockquote-footer" style="font-size: 13px"><?php echo get_the_date(); ?></span>
        <p style="text-decoration: none; color: #202020; font-size: 16px"><?php the_excerpt(); ?></p>
    </div>
    </a>
    <hr>
