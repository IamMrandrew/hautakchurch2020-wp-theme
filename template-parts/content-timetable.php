<?php
/**
 * Template part for displaying groups content in page-timetable.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

?>

<div class="col-lg-6">
    <h3><?php the_title() ?></h3>
    <p><?php echo get_post_meta(get_the_ID(), '_time_value_key', true) ?></p>
    <p>
        <span class="location"><?php echo get_post_meta(get_the_ID(), '_location_value_key', true) ?></span> 
        <span class="person"><?php echo get_post_meta(get_the_ID(), '_target_value_key', true) ?></span>
    </p>
</div> 