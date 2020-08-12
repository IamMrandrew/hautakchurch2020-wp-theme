<?php
/**
 * Template part for displaying news content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

?>

    <div class="glider-item">
        <a class="news-item-link" href="<?php the_permalink()?>">
        <div class="card">
            <i class="fas fa-sticky-note"></i>
            <h3><?php the_title(); ?></h3>
            <p class="card-time"><?php echo get_the_date('M d, Y'); ?></p>
            <p class="card-content"><?php  echo wp_trim_words(get_the_excerpt(), 40); ?></p>
        </div>
        </a>
    </div>


