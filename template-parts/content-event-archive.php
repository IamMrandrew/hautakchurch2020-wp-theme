<?php
/**
 * Template part for displaying archive content of events in archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

?>


<a class="events-item-link" href="<?php the_permalink()?>">
    <div class="events-item">
        <div class="col-md-6">
            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="leaflet">
        </div>
        <div class="col-md-6 events-detail">
            <div class="text-wrapper">
                <h3 class="events-title"><?php the_title(); ?></h3>  
                <p class="events-date">
                    <i class="far fa-calendar-alt"></i>
                    <?php echo get_post_meta(get_the_ID(), '_time_value_key', true) ?></p>
                <p class="events-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <?php echo get_post_meta(get_the_ID(), '_location_value_key', true) ?>
                </p>
                    <p class="events-excerpt">
                        <?php  echo wp_trim_words(get_the_excerpt(), 40); ?>
                    </p>
            </div>
        </div>

    </div>
</a>

