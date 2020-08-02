<?php
/**
 * Template Name: 講道錄音
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

<?php 
    if($_GET['date-year'] && !empty($_GET['date-year'])) {
        $dateYear = $_GET['date-year'];
    }

    if($_GET['date-month'] && !empty($_GET['date-month'])) {
        $dateMonth = $_GET['date-month'];
    }


    if($_GET['preachers'] && !empty($_GET['preachers'])) {
        $selectedPreacher = $_GET['preachers'];
    }
?>
<!-- <h2 class="my-4"></h2>         -->

<!--<img class="my-2" src="#" width="100%">
    <img class="my-2" src="img/cover1.jpg" width="100%"> -->
<div class="container content-wrapper">
    <h1 style="padding: 15px"><?php the_title() ?></h1>
    <form method="GET">
        <select name="orderby" id="orderby">
            <option value="date">new to old</option>
        </select>

        <select name="date-year" id="date-year">
            <option value="">year</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
        </select>

        <select name="date-month" id="date-month">
            <option value="">month</option>
            <option value="12">12</option>
            <option value="11">11</option>
            <option value="10">10</option>
            <option value="9">9</option>
            <option value="8">8</option>
            <option value="7">7</option>
            <option value="6">6</option>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
        <select name="preachers" id="preachers">
            <option value="">preacher</option>
        <?php 
            $recordings = get_posts(array(
                            'post_type' => 'recording',
                            'post_status'       => 'publish',
                            'numberposts'   => -1,

            ));

            $allPreacher = array();
            foreach ($recordings as $recordingPost) {
                $allPreacher[] = get_post_meta($recordingPost->ID, '_preacher_name_value_key', true);
            }

            $preachers = array_unique($allPreacher);
            foreach ($preachers as $preacher):
        ?>
                <option value="<?php echo $preacher ?>"><?php echo $preacher;?></option>
        <?php endforeach ?>

        </select>
    <button type="submit">filter</button>
    </form>

    <div class="row">
    <?php
    $recordingQuery = new WP_Query(array(
        'post_type'         => 'recording',
        'post_status'       => 'publish',
        'orderby'           => 'date',
        'order'             => 'DESC',
        'posts_per_page'    => 10,
        'paged'             => get_query_var('paged'),
        'date_query'        => array (
                                    'year'  => $dateYear,
                                    'month' => $dateMonth,
                                ),
        'meta_query'        => array (
                                array(
                                           
                                    'key'       => '_preacher_name_value_key',
                                    'value'     => $selectedPreacher,
                                    'compare'   => 'LIKE'
                                )
                                )

        // 'category_name' => '講道錄音'`
    ));

    while ( $recordingQuery->have_posts() ) :
        $recordingQuery->the_post();
    ?>
        <div class="col-lg-4 my-2">
        <?php
        get_template_part( 'template-parts/content', 'recording' );
        ?>
    </div>
    <?php
    endwhile; // End of the loop.

    the_posts_navigation();

    echo paginate_links(array(
        'total' => $recordingQuery->max_num_pages
    ));
    ?>

    </div>

    
</div>


 <?php

get_footer();
