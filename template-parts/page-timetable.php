<?php
/**
 * Template Name: 聚會時間
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

<div class="container text-container timetable">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    
    <section class="rows row-1" id="sermon">
        <div class="row-title">
            <h2>崇拜<h2>
        </div>
        <?php 
            $groupsQuery= new WP_Query(array(
                'post_type'         => 'groups',
                'post_status'       => 'publish',
                'orderby'           => 'date',
                'order'             => 'ASC',
                'posts_per_page'    => -1,
                'category_name'  => '崇拜'
            ));

            $count = 0;
            while ($groupsQuery->have_posts()) :
                $groupsQuery->the_post();
                    $count++;
                    if ($count % 2 != 0) : ?>
                        <div class="flex-container">
                    <?php   
                        if ($count != $groupsQuery->found_posts)
                            get_template_part('template-parts/content', 'timetable');
                        else
                            get_template_part('template-parts/content', 'timetable-single');
                    else : ?>
                        <?php get_template_part('template-parts/content', 'timetable'); ?>
                        </div>
                    <?php endif ?>
            <?php endwhile ?>

            <?php echo ($count % 2 != 0) ?'</div>': ''?>
    </section>

    <section class="rows row-2" id="prayer">
        <div class="row-title">
            <h2>祈禱會<h2>
        </div>
        <?php 
            $groupsQuery= new WP_Query(array(
                'post_type'         => 'groups',
                'post_status'       => 'publish',
                'orderby'           => 'date',
                'order'             => 'ASC',
                'posts_per_page'    => -1,
                'category_name'  => '祈禱會'
            ));

            $count = 0;
            while ($groupsQuery->have_posts()) :
                $groupsQuery->the_post();
                    $count++;
                    if ($count % 2 != 0) : ?>
                        <div class="flex-container">
                    <?php   
                        if ($count != $groupsQuery->found_posts)
                            get_template_part('template-parts/content', 'timetable');
                        else
                            get_template_part('template-parts/content', 'timetable-single');
                    else : ?>
                        <?php get_template_part('template-parts/content', 'timetable'); ?>
                        </div>
                    <?php endif ?>
            <?php endwhile ?>

            <?php echo ($count % 2 != 0) ?'</div>': ''?>
    </section>

    <section class="rows row-3" id="school">
        <div class="row-title">
            <h2>主日學<h2>
        </div>
        <?php 
            $groupsQuery= new WP_Query(array(
                'post_type'         => 'groups',
                'post_status'       => 'publish',
                'orderby'           => 'date',
                'order'             => 'ASC',
                'posts_per_page'    => -1,
                'category_name'  => '主日學'
            ));

            $count = 0;
            while ($groupsQuery->have_posts()) :
                $groupsQuery->the_post();
                    $count++;
                    if ($count % 2 != 0) : ?>
                        <div class="flex-container">
                    <?php   
                        if ($count != $groupsQuery->found_posts)
                            get_template_part('template-parts/content', 'timetable');
                        else
                            get_template_part('template-parts/content', 'timetable-single');
                    else : ?>
                        <?php get_template_part('template-parts/content', 'timetable'); ?>
                        </div>
                    <?php endif ?>
            <?php endwhile ?>

            <?php echo ($count % 2 != 0) ?'</div>': ''?>
    </section>

    <section class="rows row-4" id="groups">
        <div class="row-title">
            <h2>每週團契/小組<h2>
        </div>
        <?php 
            $groupsQuery= new WP_Query(array(
                'post_type'         => 'groups',
                'post_status'       => 'publish',
                'orderby'           => 'date',
                'order'             => 'ASC',
                'posts_per_page'    => -1,
                'category_name'  => '每週團契-小組'
            ));

            $count = 0;
            while ($groupsQuery->have_posts()) :
                $groupsQuery->the_post();
                    $count++;
                    if ($count % 2 != 0) : ?>
                        <div class="flex-container">
                    <?php   
                        if ($count != $groupsQuery->found_posts)
                            get_template_part('template-parts/content', 'timetable');
                        else
                            get_template_part('template-parts/content', 'timetable-single');
                    else : ?>
                        <?php get_template_part('template-parts/content', 'timetable'); ?>
                        </div>
                    <?php endif ?>
            <?php endwhile ?>

            <?php echo ($count % 2 != 0) ?'</div>': ''?>
    </section>
    

    <section class="rows row-5">
        <div class="row-title">
            <h2>每月團契/小組<h2>
        </div>
        <?php 
            $groupsQuery= new WP_Query(array(
                'post_type'         => 'groups',
                'post_status'       => 'publish',
                'orderby'           => 'date',
                'order'             => 'ASC',
                'posts_per_page'    => -1,
                'category_name'  => '每月團契-小組'
            ));

            $count = 0;
            while ($groupsQuery->have_posts()) :
                $groupsQuery->the_post();
                    $count++;
                    if ($count % 2 != 0) : ?>
                        <div class="flex-container">
                    <?php   
                        if ($count != $groupsQuery->found_posts)
                            get_template_part('template-parts/content', 'timetable');
                        else
                            get_template_part('template-parts/content', 'timetable-single');
                    else : ?>
                        <?php get_template_part('template-parts/content', 'timetable'); ?>
                        </div>
                    <?php endif ?>
            <?php endwhile ?>

            <?php echo ($count % 2 != 0) ?'</div>': ''?>
    </section>

    <section class="rows row-6">
        <div class="row-title">
            <h2>事工小組<h2>
        </div>
        <?php 
            $groupsQuery= new WP_Query(array(
                'post_type'         => 'groups',
                'post_status'       => 'publish',
                'orderby'           => 'date',
                'order'             => 'ASC',
                'posts_per_page'    => -1,
                'category_name'  => '事工小組'
            ));

            $count = 0;
            while ($groupsQuery->have_posts()) :
                $groupsQuery->the_post();
                    $count++;
                    if ($count % 2 != 0) : ?>
                        <div class="flex-container">
                    <?php   
                        if ($count != $groupsQuery->found_posts)
                            get_template_part('template-parts/content', 'timetable');
                        else
                            get_template_part('template-parts/content', 'timetable-single');
                    else : ?>
                        <?php get_template_part('template-parts/content', 'timetable'); ?>
                        </div>
                    <?php endif ?>
            <?php endwhile ?>

            <?php echo ($count % 2 != 0) ?'</div>': ''?>
    </section>
</div>

<?php

get_footer();
