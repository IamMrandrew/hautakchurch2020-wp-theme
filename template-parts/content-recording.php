<?php
/**
 * Template part for displaying recording content in page-recording.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

?>
    <div class="card-wrapper col-md-6">
        <article class="card">
            <p class="meta">
                <span class="preacher">
                    <i class="fas fa-user"></i>
                    <?php echo get_post_meta(get_the_ID(), '_preacher_name_value_key', true) ?>
                </span>
                <span class="time"><?php echo get_the_date('M d, Y')?></span>
            </p>    
            <h3 class="card-title"><?php the_title() ?></h3>
            <p class="quote"><?php echo get_post_meta(get_the_ID(), '_bible_verse_value_key', true) ?></p>
            <?php the_content() ?>
            <?php 
                $medias = get_attached_media('audio', $post->ID); 
                foreach ($medias as $media){
                    $id = $media->ID; 
                    $audioURL = wp_get_attachment_url($id);
                }
            ?>
            <figure class="plyr-sm">
                <audio src="<?php echo $audioURL ?>"></audio>
            </figure>
        </article>
    </div>