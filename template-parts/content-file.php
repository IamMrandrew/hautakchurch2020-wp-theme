<?php
/**
 * Template part for displaying file content in member.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

?>

<article class="file-rows">
    <?php 
        $medias = get_attached_media('application', $post->ID); 
        foreach ($medias as $media){
            $id = $media->ID; 
            $fileURL = wp_get_attachment_url($id);
        }
    ?>
    <div class="col-2">
        <img src="<?php echo get_template_directory_uri() ?>/img/pdf-icon.svg" alt="pdf-icon">
    </div>
    <div class="col-8">
        <a class="file-link" href="<?php echo $fileURL ?>">
        <div class="text-wrapper">
            <h3><?php the_title()?>.pdf</h3>
            <p>
                <span class="file-date"><?php echo get_the_date('M d, Y'); ?></span>
                <span class="file-type">
                    <?php $terms = get_the_terms($post->ID,'category');
                    foreach( $terms as $term) {
                        echo $term->name;
                    }
                    ?>
                </span>
            </p>
        </div>
        </a>
    </div>
    <div class="col-2 right">

        <a class="btn" href="<?php echo $fileURL ?>" download><i class="fas fa-arrow-down"></i></a>
    </div>
</article>