<?php
/**
 * Template part for displaying news content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

?>



    <a class="news-item-link" href="<?php the_permalink()?>">
    <div class="news-item my-2">
        <h3 style="color: #202020;  text-decoration: none; font-weight: 400;font-size: 16px"><i class="fas fa-bullhorn"></i> <?php the_title(); ?></h3>  
        <span class="blockquote-footer" style="font-size: 13px"><?php echo get_the_date(); ?></span>
        <p style="text-decoration: none; color: #202020; font-size: 16px"><?php  echo wp_trim_words(get_the_excerpt(), 20); ?></p>
    </div>
    </a>
    <hr>


