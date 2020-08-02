<?php
/**
 * Template part for displaying recording content in page-recording.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

?>
    <div class="card shadow-sm">
        <div class="row px-3">
            <div class="col">
                <span><h4 style="font-size: 17px"><?php echo get_the_date() ?></h4></span>
            </div>
            <div class="col text-right">
                <span><h4 style="font-size: 17px"><?php echo get_post_meta(get_the_ID(), '_preacher_name_value_key', true) ?></h4></span>
            </div>
        </div>
        <h3 class="px-3" style="font-size: 19px"><?php the_title() ?></h3>
        <p class="blockquote-footer pl-3"><?php echo get_post_meta(get_the_ID(), '_bible_verse_value_key', true) ?></p>
        <?php the_content() ?>
    </div>