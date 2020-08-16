<?php
/**
 * Template Name: 會友限定
 * 
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hautakchurch
 */

get_header();
?>

<div class="container text-container member">

    <h1 class="entry-title"><?php the_title() ?></h1>

    <section class="filter-bar">
        <div class="col-5">
            <h2 class="filter-title">最新檔案</h2>
        </div>
        <div class="col-7">
            <?php
                if($_GET['types'] && !empty($_GET['types'])) {
                    $selectedType = $_GET['types'];
                } 
            ?>
            <form class="filter-form" action="<?php echo get_bloginfo('url') ?>/會友限定/">
                <div class="selectBox-wrapper">
                    <select class="selectBox" name="types" id="types" onchange="this.form.submit()">
                        <option value="">所有檔案類型</option>
                        <option value="主日崇拜程序表" <?php echo selected($selectedType, '主日崇拜程序表') ?>>主日崇拜程序表</option>
                        <option value="主日崇拜事奉表" <?php echo selected($selectedType, '主日崇拜事奉表') ?>>主日崇拜事奉表</option>
                        <option value="週六崇拜事奉表" <?php echo selected($selectedType, '週六崇拜事奉表') ?>>週六崇拜事奉表</option>
                        <option value="其他檔案" <?php echo selected($selectedType, '其他檔案') ?>>其他檔案</option>
                    </select>
                </div>
            </form>
        </div>
    </section>

    <?php 
    $cat = '';
    
    $filesQuery= new WP_Query(array(
                'post_type'         => 'files',
                'post_status'       => 'publish',
                'orderby'           => 'date',
                'order'             => 'DESC',
                'posts_per_page'    => 10,
                'paged'             => get_query_var('paged'),
                // 'date_query'        => array (
                //                             'year'  => $dateYear,
                //                             'month' => $dateMonth,
                //                         ),
                'category_name'  => $selectedType
            ));

    while ($filesQuery->have_posts()) :
        $filesQuery->the_post();
            get_template_part('template-parts/content', 'file');
    endwhile;
    ?>

    <div class="pagination">
        <?php
            // the_posts_navigation();
            if (!get_previous_posts_link() && $filesQuery->max_num_pages > 1){
                echo '<i class="fas fa-chevron-circle-left disable"></i>';
            } else {
                previous_posts_link('<i class="fas fa-chevron-circle-left"></i>', $filesQuery->max_num_pages);
            }

            echo paginate_links(array(
                'total' => $filesQuery->max_num_pages,
                'prev_text' => '',
                'next_text' => '',
            ));

            if (!get_next_posts_link(null, $filesQuery->max_num_pages) && $filesQuery->max_num_pages > 1) {
                echo '<i class="fas fa-chevron-circle-right disable"></i>';
            } else {
                next_posts_link('<i class="fas fa-chevron-circle-right"></i>', $filesQuery->max_num_pages);
            }
        ?>
    </div>
</div>



<?php

get_footer();
