<?php
/**
 * Template part for displaying groups content in page-timetable.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

?>

<div class="col-lg-6 single-item">
<div class="card">
<a class="card-link" href="<?php the_permalink()?>">
    <?php if (get_the_post_thumbnail()) : ?>
        <div class="img-wrapper">
            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="thumbnail">
        </div>
    <?php endif ?>
    <div class="info-wrapper">
        <div class="text-wrapper">
            <h3 class="title"><?php the_title() ?></h3>       
            <p class="time"><?php echo get_post_meta(get_the_ID(), '_time_value_key', true) ?></p>
        </div>
        <div class="text-wrapper">
            <p class="location"><?php echo get_post_meta(get_the_ID(), '_location_value_key', true) ?></p> 
            <p class="person"><?php echo get_post_meta(get_the_ID(), '_target_value_key', true) ?></p>
        </div>
    </div>
</a>
</div>
</div> 